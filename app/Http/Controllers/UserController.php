<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserAddRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize(User::class, 'index');
        $users = User::paginate(15);
        $title = 'Manage Users';
        return view('admin.users.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize(User::class, 'create');
        return view('admin.users.create', ['title' => __('lg.adduser')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddRequest $request)
    {
        $this->authorize(User::class, 'create');
        $user = User::create($request->all());
        $user->password = Hash::make($request->password);
        $role = Role::find($request->role);
        if($role)
        {
            $user->roles()->attach($role);
        }
        return redirect(route('users'))->withSuccess(__('lg.useraddeddsuccessfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize($user, 'show');
        $title = __('lg.viewuser');
        return view('admin.users.show', compact('user', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize($user, 'edit');
        $title = __('lg.edituser');
        return view('admin.users.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $this->authorize($user, 'edit');
        $user->update($request->except('password'));
        if($user->isNotMe() && auth()->user()->can('manage users'))
        {
            $user->roles()->detach($user->roles()->first());
            $role = Role::find($request->role);
            if($role)
            {
                $user->roles()->attach($role);
            }
        }

        if($request->password)
        {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        return redirect(route('users.edit', $user->id))->withSuccess(__('lg.userupdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        $request->session()->flash('warning', __('lg.userhasbeendeleted'));
    }

    public function bulkdel(Request $request)
    {
        $this->authorize(User::class, 'bulkdel');
        $i = 0;
        foreach($request->ids as $id)
        {
            $user = User::find($id);
            if($user && $user->isNotMe())
            {
                $user->delete();
                $i++;
            }
        }

        if($i == 0)
        {
            $request->session()->flash('warning', __('lg.nousersfoundfordeletion'));
        } else
        {
            if($i == 1)
            {
                $request->session()->flash('warning', __('lg.oneuserhasbeendeleted'));
            } else
            {
                $request->session()->flash('warning', __('lg.usershavebeendeleted', ['count' => $i]));
            }
        }
    }
}