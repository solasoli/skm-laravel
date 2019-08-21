<div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
      <thead>
        <tr class="headings">
          <th>
            <input type="checkbox" id="check-all" class="flat">
          </th>
          <th class="column-title">{{ __('lg.email') }}</th>
          <th class="column-title">{{ __('lg.name') }}</th>
          <th class="column-title">{{ __('lg.role') }}</th>
          <th class="column-title no-link last"><span class="nobr"></span>
          </th>
          <th class="bulk-actions" colspan="7">
            <a data-itemtext='users' data-url="{{ route('users.bulkdelete') }}" href="javascript:void" class="antoo deleteall" style="color:#fff; font-weight:500;">{{ __('lg.delete') }} <span class="action-cnt"> </span></a>
          </th>
        </tr>
      </thead>

      <tbody>
      	@foreach($users as $user)
        <tr class="even pointer">
          <td class="a-center ">
          	@if($user->isNotMe())
            <input data-id="{{ $user->id }}" type="checkbox" class="flat records" name="table_records">
            @endif
          </td>
          <td class="">{{ $user->email }}</td>
          <td class="">{{ $user->name }}</td>
          <td class="">@if($user->roles->count()) {{ $user->roles()->first()->name }} @endif</td>
          <td class="last">
          	<a class="text-info" href="{{ route('users.show', $user->id) }}"><i class="fa fa-eye"></i></a>
          	@if($user->editable()) &nbsp;
            @if($user->isNotMe())
				    <a data-itemtext="user" data-url="{{ route('users.destroy', $user->id) }}" href="javascript:void" class="text-danger delete"><i class="fa fa-trash"></i></a>@endif &nbsp; <a href="{{ $user->editUrl() }}"><i class="fa fa-pencil"></i></a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $users->links() }}
   </div>