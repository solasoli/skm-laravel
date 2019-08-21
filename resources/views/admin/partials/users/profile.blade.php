<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{ $user->name }} <small>{{ __('lg.membersince') }} {{ $user->created_at->format('M d, Y') }}</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img style="border-radius:10px;" class="img-responsive avatar-view" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                        </div>
                      </div>
                      @if($user->editable())
                      <br>
                      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">{{ __('lg.edituser') }}</a>
                      @endif
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <div id="myTabContent" class="tab-content">
                          <div class="table-responsive">
                            <table class="table table-striped">
                              <tr>
                                <td>{{ __('lg.name') }}</td>
                                <td>{{ $user->name }}</td>
                              </tr>
                              <tr>
                                <td>{{ __('lg.email') }}</td>
                                <td>{{ $user->email }}</td>
                              </tr>
                              <tr>
                                <td>{{ __('lg.role') }}</td>
                                @if($user->roles()->count())
                                <td>{{ $user->roles()->first()->name }}</td>
                                @else
                                <td>No role assigned</td>
                                @endif
                              </tr>
                              <tr>
                                <td>{{ __('lg.membersince') }}</td>
                                <td>{{ $user->created_at->format('M d, Y h:i:s A') }}</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>