<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
	public function show()
	{
		$title = __('lg.managesettings');
		$settings = setting()->all();
		return view('admin.settings.settings', compact('title', 'settings'));
	}

	public function save(Request $request)
	{
		$settings = $request->except('_token');
		foreach($settings as $field => $value)
		{
			$s = setting($field);
			$s['value'] = $value;
			setting([$field => $s])->save();
		}
		return back()->withSuccess(__('lg.settingshavebeensaved'));
	}
}
