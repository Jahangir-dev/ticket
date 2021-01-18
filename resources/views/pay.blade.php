@extends('layouts.app')
<script>
            function validate(evt) {
                var theEvent = evt || window.event;
              
                // Handle paste
                if (theEvent.type === 'paste') {
                    key = event.clipboardData.getData('text/plain');
                } else {
                // Handle key press
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode(key);
                }
                var regex = /[0-9]/;
                if( !regex.test(key) ) {
                  theEvent.returnValue = false;
                  if(theEvent.preventDefault) theEvent.preventDefault();
                }
              }
        </script>
@section('content')

	<div class="conference-synopsis-area pad100" >
            <div class="container">
    <div class="row">
    	<div class="col-lg-12">
    		@if(session()->has('status'))
			     <p class="alert alert-success">{{session('status')}}</p>
			@endif
    	</div>
    	<div class="col-lg-2"></div>
        <div class="col-lg-6">
           <div class="title m-b-md">
                    <h1>Pay Here</h1>
                </div>
      <form action="{{ route('requestpay') }}" method="POST">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <label>Your Phone Number</label><br>
            <input type='text' onkeypress='validate(event)' name="phonenumber" placeholder="254..." maxlength="12" minlength="10" required><br><br>
        <label>Amount to request Payment</label><br>
            <input type='text' onkeypress='validate(event)' name="amount" placeholder="Ksh." maxlength="3" required><br><br>
            
        <input  class="send" type="submit" value="Send Request">
      </form>
  </div>
</div>
</div>
</div>
    
<style type="text/css">
	.header .navbar-nav li.active > a {
		color: #000000 !important;
	}

	.header .navbar-nav .nav-link {
		color: #424040 !important;
	}

</style>
@endsection
@section('scripts')
@parent

@endsection