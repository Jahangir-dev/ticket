@extends('layouts.app')
@section('content')

      <div class="conference-synopsis-area pad100" >
            <div class="container">
        <h4><?= $CustomerMessage ?></h4><br>
        <canvas id="progress"></canvas>

           <div class="title m-b-md">
                    Please wait . . .
                </div>

        </div>
      </div>

  @endsection
  @section('scripts')
@parent
  <script src="{!! asset('js/waterbubble.js') !!}"></script>

       <script>
      console.log('<?= $complete ?>' + ': STatus completion');
            var time_counter = 0;
            var final_data = 0;
               printbubble();
                var status_completion = '<?= $complete ?>';
                if(!status_completion){
                //if status_completion = false, request went well...continue processing
             
                 var CheckoutRequestID = '<?= $CheckoutRequestID ?>';
                
                var refreshIntervalId = setInterval(function getStatus() {
                    time_counter = time_counter + 2;
                 var status_update = (time_counter/240);
                  
                  if(time_counter == 240){
                   console.log("4 mins COMPLETE");
                   clearInterval(refreshIntervalId);
                   }
                  
                 final_data = round(status_update,2);
                   printbubble();
                     $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                }
                            });
                    $.ajax({
                        url: 'check/'+CheckoutRequestID,
                        method: 'GET',
                        async: true,
                        success: function(data) {
                         console.log(data[0]);
                          
                                                          
                               switch(data[0]) {
                                    case  0:
                                      status_completion = true;
                                      clearInterval(refreshIntervalId);
                                      final_data = 1;
                                      console.log('PAID');
                                      printbubble();
                                      //window.alert('payment accepted!');
                                    
                                      break;
                                    case 1:
                                      console.log('pending...seconds' + time_counter);
                                      
                                      break;
                                    case 2:
                                      status_completion = true;
                                      clearInterval(refreshIntervalId);
                                      final_data = 1;
                                      printbubble();
                                      console.log('Unfortunately payment failed');
                                      //window.alert('Rejected payment');
                                      
                                    break;
                                    default:
                                      final_data = 1;
                                      console.log('stray result..');
                                      status_completion = true;
                                      clearInterval(refreshIntervalId);
                                  }
                              } 
                            
                           
                        
                    });
                },2000);
                }
                
                if(status_completion){
                    window.alert('Initiation rejected your payment');
                    console.log('Payment failed to initiate');
                    final_data=1;
                    printbubble();
                }
                                
                function round(value, precision) {
                    var multiplier = Math.pow(10, precision || 0);
                    return Math.round(value * multiplier) / multiplier;
                }
                           
       function printbubble(){
                $('#progress').waterbubble({
               
                 // bubble size
               
                 radius: 100,
               
                
               
                 // border width
               
                 lineWidth: undefined,
               
                 // data to present
               
                 data: final_data,
               
                 // color of the water bubble
               
                 waterColor: 'rgba(25, 139, 201, 1)',
               
                
               
                 // text color
               
                 textColor: 'rgba(06, 85, 128, 0.8)',
               
                 // custom font family
               
                 font: '',
               
                 // show wave
               
                 wave: true,
               
                 // custom text displayed inside the water bubble
               
                 txt: round((final_data*100),0) + '%',
               
                
               
                 // enable water fill animation
               
                 animation: true
               
               });}
       </script>
  @endsection