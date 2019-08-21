@if(session()->has('error'))
<div class="col-md-12">
	<div class="alert alert-danger alert-dismissible fade in" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	  </button>
	  {{ session()->get('error') }}
	</div>
</div>
@endif

@if(session()->has('success'))
<div class="col-md-12">
	<div class="alert alert-success alert-dismissible fade in" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	  </button>
	  {{ session()->get('success') }}
	</div>
</div>
@endif

@if(session()->has('info'))
<div class="col-md-12">
	<div class="alert alert-info alert-dismissible fade in" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	  </button>
	  {{ session()->get('info') }}
	</div>
</div>
@endif

@if(session()->has('warning'))
<div class="col-md-12">
	<div class="alert alert-warning alert-dismissible fade in" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	  </button>
	  {{ session()->get('warning') }}
	</div>
</div>
@endif