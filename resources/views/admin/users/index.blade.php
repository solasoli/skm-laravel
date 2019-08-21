@extends('admin.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('admin-assets/vendors/iCheck/skins/flat/green.css') }}">
@endsection

@section('content')
<div class="col-md-12">
	<h2>{{ __('lg.manageusers') }} <a href="{{ route('users.create') }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a></h2>
	@if($users->count())
	@include('admin.partials.users.index_table')
	@else
	<p>{{ __('lg.nousersfound') }}</p>
	@endif
</div>
@endsection