@extends('layout.main')
@section('title')
General Driving Tips
@endsection
@section('preloader')
<style>
    /* Paste this css to your style sheet file or under head tag */
    /* This only works with JavaScript, 
    if it's not present, don't show loader */
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(images/page_load/Preloader_41.gif) center no-repeat #fff;
    }
</style>
@endsection
@section('content')
<hr>
<div class="row">
    <div class="col-md-10">
        <div class="box" style="margin-left: 10%;">
            <div class="box-header with-border">
                <center> <h3 class="box-title">Car Driving Basics</h3></center>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/1belt.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/1belt.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            1. Put your seat belt on once you get in. While learning, it's better to roll down the windows. This helps to better hear the engine sound and adjust the gear changes accordingly. The one on the far left is the clutch, the middle one is the brake, and then the gas/accelerator is on the far right (CBA). This layout is the same for both left hand drive and right hand drive vehicles.
                        </basics>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/2clutch.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/2clutch.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            2. The clutch disengages the spinning engine from the spinning wheels and allows you to switch gears without grinding the teeth of each separate gear.
                            Before you switch gears (moving up or down), the clutch must be depressed.
                        </basics>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/3seat.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/3seat.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            3. Adjust the seat position forward enough to allow you to press the clutch pedal (the left pedal, next to the brake pedal) fully to the floor with your left foot.
                        </basics>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/4clutch.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/4clutch.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            4. Press the clutch pedal and hold it to the floor. This would also be a good time to take note of how the travel of the clutch pedal differs from that of the brake and gas, and it is a good idea to get used to slowly and steadily releasing the clutch pedal.
                        </basics>
                    </div>
                </div>           
                <div class="uk-grid">
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/5gears.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/5gears.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            5. Move the gear shift knob to neutral. This is the middle position that feels free when moved from side to side. The vehicle is considered out of gear when:
                            the gear shift is in the neutral position, or
                            the clutch pedal is fully depressed. 
                        </basics>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/6start-key.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/6start-key.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            6. Start the engine with the key, making sure to keep the clutch pedal held to the floor.    
                        </basics>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/7clutch.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/7clutch.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            7. Once the engine is started, you can remove your foot from the clutch pedal (as long as it is in neutral).                        
                        </basics>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/8gear.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/8gear.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            8. Press the clutch to the floor again and move the gear shift knob to first gear. It should be the upper left position, and there should be some kind of visual layout of the gear pattern on top of the gear shift knob.
                        </basics>
                    </div>
                </div>           
                <div class="uk-grid">
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/9gear.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/9gear.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            9. Slowly lift your foot up from the clutch pedal until you hear the engine speed begin to drop, then push it back in. Repeat this several times until you can instantly recognize the sound. This is the friction point. 
                        </basics>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/10fuel.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/10fuel.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            10. In order to get moving, lift your foot up from the clutch pedal until the RPMs (revs) drop slightly and apply light pressure to the accelerator (GAS). Balance the light downward pressure on the accelerator with slowly releasing pressure on the clutch pedal. You will probably have to do this several times to find the right combination of pressure up and down. Another way of doing it is to release the clutch until the moment during which the engine revs down a little and then applying pressure on the accelerator as the clutch engages. At this point the car will start to move. It is best to have the engine rev just enough to prevent stalling as the clutch pedal is let up. This process may be a little difficult at first because you are new to the 3 pedals in manual. Always be ready to pull the hand brake to stop in emergency till you have learned.
                            If you release the clutch too quickly the car will stall. If the engine sounds like it is going to stall, then hold the clutch where it is or even push it further in slightly. Excessive engine speed while the clutch is between fully up and fully depressed will wear out the clutch parts prematurely resulting in slippage or smoking of the clutch parts at the transmission.   
                        </basics>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/11speed.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/11speed.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            11. When driving, when your RPM reaches about 2500 to 3000, it is time to shift into second gear. Remember though that it depends fully on the car you are driving what RPM the tachometer will reach before you must change gear. Your engine will begin to race and speed up, and you must learn to recognize this noise. Apply pressure downward on the clutch pedal and guide the gear shift knob straight down from 1st gear into the bottom left position.
                            Some cars have a "Shift Light" or indications on the speedometer that will tell you when you need to shift so you don't rev the engine too fast.                    
                        </basics>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/12balance.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/12balance.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            12. Push down on the gas very slightly and slowly release the clutch pedal.  
                        </basics>
                    </div>
                </div>           
                <div class="uk-grid">
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/13clutch.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/13clutch.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            13. Once in gear and on the gas you should completely remove your foot from the clutch pedal. Resting your foot on the clutch pedal is a bad habit, and applies pressure to the clutch mechanism — the increased pressure could allow the clutch to wear prematurely.   -
                        </basics>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/14brake.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/14brake.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            14. When you have to stop, release right foot off accelerator to the brake pedal and press down as much as required and as you slow to about 10 mph (16 km/h) you will feel the car about to start shaking and vibrating. Press the clutch pedal fully down and move the gear shift to neutral to prevent stalling.
                        </basics>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/images/basic/15road.jpg" data-uk-lightbox="{group:'my-group'}"><img src="/images/basic/15road.jpg" width="400" height="400" alt=""></a>
                        </div>
                        <basics>
                            15. Once you have mastered it, driving a manual is fun. You now can rev the engine in any gear for a sportier feel or for a greener pace choose to shift gears at lower rpms.
                        </basics>
                    </div>
                </div>           
            </div>
            <div class="box-body no-padding">
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-8">
        <h2>What We Do</h2>
        <p>Introduce the visitor to the business using clear, informative text. Use well-targeted keywords within your sentences to make sure search engines can find the business.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et molestiae similique eligendi reiciendis sunt distinctio odit? Quia, neque, ipsa, adipisci quisquam ullam deserunt accusantium illo iste exercitationem nemo voluptates asperiores.</p>
        <p>
            <a class="btn btn-default btn-lg" href="#">Call to Action &raquo;</a>
        </p>
    </div>
    <div class="col-sm-4">
        <h2>Contact Us</h2>
        <address>
            <strong>Start Bootstrap</strong>
            <br>3481 Melrose Place
            <br>Beverly Hills, CA 90210
            <br>
        </address>
        <address>
            <abbr title="Phone">P:</abbr>(123) 456-7890
            <br>
            <abbr title="Email">E:</abbr> <a href="mailto:#">name@example.com</a>
        </address>
    </div>
</div>
<!-- /.row -->

<!--<hr>

<div class="row">
    <div class="col-sm-4">
        <img class="img-circle img-responsive img-center" src="http://placehold.it/300x300" alt="">
        <h2>Marketing Box #1</h2>
        <p>These marketing boxes are a great place to put some information. These can contain summaries of what the company does, promotional information, or anything else that is relevant to the company. These will usually be below-the-fold.</p>
    </div>
    <div class="col-sm-4">
        <img class="img-circle img-responsive img-center" src="http://placehold.it/300x300" alt="">
        <h2>Marketing Box #2</h2>
        <p>The images are set to be circular and responsive. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
    </div>
    <div class="col-sm-4">
        <img class="img-circle img-responsive img-center" src="http://placehold.it/300x300" alt="">
        <h2>Marketing Box #3</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
    </div>
</div>-->
<!-- /.row -->

<hr>
@stop
@section('scripts')
@parent
@if($app->environment('local'))
<!--Need locally only-->
<script src="uikit-2.24.3/js/components/lightbox.min.js"></script>
<script src="js/readmore.min.js"></script>
@else
<!--Need in production-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/lightbox.min.js"></script>
@endif
<!-- Needed both locally and i  production-->
<script src="js/readmore.min.js"></script>

<script>
    $('basics').readmore({
        speed: 1500,
        collapsedHeight: 120,
        heightMargin: 16,
        lessLink: '<a href="#">Read less</a>'
    });

    $(document).ready(function () {
        //   $('#myTable').DataTable();
    });
</script>   
@stop