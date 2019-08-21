<nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="{{ auth()->user()->editUrl() }}"><i class="fa fa-cog pull-right"></i> {{ __('lg.settings') }}</a>
                    </li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> {{ __('lg.logout') }}</a></li>
                  </ul>
                </li>
					@if(Auth::user()->notifications->count())
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    @if(Auth::user()->unreadNotifications->count())
                    <span class="badge bg-green">{{ Auth::user()->notifications->count() }}</span>
                    @endif
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  	@foreach(Auth::user()->notifications()->limit(5)->get() as $notif)
                    <li>
                      <a>
                        <span>
                          <span>{{ $notif->data['title'] }}</span>
                          <span class="time">{{ $notif->created_at->diffForHumans() }}</span>
                        </span>
                        <span class="message">
                          {{ $notif->data['message'] }}
                        </span>
                      </a>
                    </li>
                    @endforeach
                    <li class="text-center"><a href="">{{ __('lg.viewall') }}</a></li>
                  </ul>
                </li>
                @endif
              </ul>
            </nav>