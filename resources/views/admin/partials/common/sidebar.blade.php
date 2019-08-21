<div class="menu_section">
	<h3>{{ __('lg.dashboard') }}</h3>
	<ul class="nav side-menu">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('lg.dashboard') }} <span class="fa fa-chevron-right"></span></a></li>
	</ul>
	@if(auth()->user()->can('manage users'))
	<h3>{{ __('lg.usersaccounts') }}</h3>
	<ul class="nav side-menu">
		<li><a href="{{ route('users') }}"><i class="fa fa-user"></i> {{ __('lg.manageusers') }} <span class="fa fa-chevron-right"></span></a></li>
	</ul>
	@endif
	{{-- @if(auth()->user()->can('manage settings'))
	<h3>{{ __('lg.sitesettings') }}</h3>
	<ul class="nav side-menu">
		<li><a href="{{ route('settings') }}"><i class="fa fa-cog"></i> {{ __('lg.managesettings') }} <span class="fa fa-chevron-right"></span></a></li>
	</ul>
	@endif --}}
</div>