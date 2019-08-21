<div class="page-title">
  <div class="title_left">
    <h3>{{ isset($title) ? $title : '' }}</h3>
  </div>

  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="{{ __('lg.searchquery') }}.....">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </div>
  </div>
</div>