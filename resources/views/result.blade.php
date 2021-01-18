@extends('layouts.app')
@section('content')
        
         <div class="conference-synopsis-area pad100" >
            <div class="container">
           <div class="title m-b-md">
                    Results:
                </div>
       @if(!empty($receipt))
           <p>Payment received with receipt <?= $receipt ?> amount: <?= $amount ?><p>
       @elseif(!empty($reason))
           <p>Payment failed with <?= $reason ?></p>
        @endif
        </div>
    </div>

    @endsection
@section('scripts')
@parent

@endsection