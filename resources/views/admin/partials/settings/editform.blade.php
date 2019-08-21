<form id="demo-form2" action="{{ route('settings.update') }}" data-parsley-validate class="form-horizontal form-label-left" method="post">
    @csrf
    @foreach($settings as $n => $s)
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="registration">{{ __('lg.'.$n) }}
      </label>
      @if($s['type'] == 'text')
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="{{ $n }}" name="{{ $n }}" class="form-control col-md-7 col-xs-12" value="{{ setting('sitename.value') }}">
      </div>
      @elseif($s['type'] == 'select')
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="{{ $n }}" name="{{ $n }}" class="form-control col-md-7 col-xs-12">
          <option value="1">Yes</option>
          <option value="0" @if($s['value'] == false) selected @endif>No</option>
        </select>
      </div>
      @elseif($s['type'] == 'database')
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="{{ $n }}" name="{{ $n }}" class="form-control col-md-7 col-xs-12">
          <option value="0">{{ __('lg.defaultrole') }}</option>
          @foreach(Spatie\Permission\Models\Role::get() as $role)
          <option value="{{ $role->id }}" @if($s['value'] == $role->id) selected @endif>{{ $role->name }}</option>
          @endforeach
        </select>
      </div>
      @endif
    </div>
    @endforeach
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-success">{{ __('lg.updatesettings') }}</button>
      </div>
    </div>
  </form>