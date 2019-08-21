<form id="demo-form2" action="{{ route('users.store') }}" data-parsley-validate class="form-horizontal form-label-left" method="post">
    @csrf
    <div class="form-group @if($errors->has('name')) has-error @endif">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{ __('lg.name') }} <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="name" placeholder="{{ __('lg.fullname') }}" name="name" class="form-control col-md-7 col-xs-12" value="{{ old('name') }}">
        @if($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif
      </div>
    </div>
    <div class="form-group @if($errors->has('email')) has-error @endif">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">{{ __('lg.email') }} <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input placeholder="{{ __('lg.useremailaddress') }}" type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" value="{{ old('email') }}">
        @if($errors->has('email'))
        <p class="text-danger">{{ $errors->first('email') }}</p>
        @endif
      </div>
    </div>
    <div class="form-group @if($errors->has('role')) has-error @endif">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">{{ __('lg.role') }} <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="role" name="role" class="form-control col-md-7 col-xs-12">
          <option value="">{{ __('lg.selectrole') }}</option>
          @foreach(Spatie\Permission\Models\Role::get() as $role)
          <option value="{{ $role->id }}" @if($role->id == old('role')) selected @endif>{{ $role->name }}</option>
          @endforeach
        </select>
        @if($errors->has('role'))
        <p class="text-danger">{{ $errors->first('role') }}</p>
        @endif
      </div>
    </div>
    <div class="form-group @if($errors->has('password')) has-error @endif">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">{{ __('lg.password') }} <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12" placeholder="{{ __('lg.accountpassword') }}">
        @if($errors->has('password'))
        <p class="text-danger">{{ $errors->first('password') }}</p>
        @endif
      </div>
    </div>
    <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">{{ __('lg.confirmpassword') }} <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control col-md-7 col-xs-12" placeholder="{{ __('lg.accountpasswordconfirm') }}">
        @if($errors->has('password_confirmation'))
        <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
        @endif
      </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-success">{{ __('lg.adduser') }}</button>
      </div>
    </div>
  </form>