@extends('admin.master')

@section('content')
<div class="col-md-12">
	<h2>{{ __('lg.viewuser') }}</h2>
</div>
@include('admin.partials.users.profile')
@endsection