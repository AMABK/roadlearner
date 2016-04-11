@extends('layout.main')
@section('title')
City Driving Tips
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
        background: url(images/page_load/Preloader_6.gif) center no-repeat #fff;

    }
</style>
@endsection
@section('content')
<hr>
<div class="row">
    <div class="col-md-10">
        <div class="box" style="margin-left: 10%;">
            <div class="box-header with-border col-sm-8">
                <center><h3 class="box-title">Important Tips for City Driving</h3></center>
            </div>
            <div class="box-header with-border col-sm-4">
                <center><h3 class="box-title">Important Tips for City Driving</h3></center>
            </div>
            <div class="box-body col-sm-8 border-left border-right">
                <p>
                    Driving in the city is a sport unto itself. Clogged expressways, impossible parking, countless red lights, never-ending construction, and the constant threat of car theft can make a trip downtown more than frustrating — it can turn the most mild-mannered Dr. Jekyll into a shouting, swearing Mr. Hyde. (And you know what I'm talking about.)
                </p>
                <p>
                    There's a lot you can do, though, to make urban driving easier, both when choosing a car and while out on the road. Here are some tips that will make nasty drives into the city less stressful and more enjoyable.
                </p>
                <p>
                <ol type="1">
                    <li>
                        <h4> Get a car that fits</h4>
                        <p>
                            Whether you find street parking (when you're running late, of course) is often a direct function of your car's size. Even the paid parking lots seem to have spaces only for "compact" cars. If you do a lot of city driving, having a smaller car — in width as well as length — will not only make parking easier but will help prevent dings, dents and scrapes. You can research a car's exterior dimensions on the "Reviews and Specs" tab in our New Cars section. For instance, the Mini Cooper is 143.1 inches long and 66.5 inches wide.
                        </p>
                    </li>
                    <li>
                        <h4>Think carefully about manual vs. automatics</h4>
                        <p>
                            Manual-transmission cars are fun, less expensive and often more fuel-efficient, but driving them in stop-and-go traffic can make driving stressful and tiring, particularly in hilly cities like San Francisco. So weigh the trade-offs between the two transmissions if you know you'll be in town frequently.
                        </p>
                    </li>
                    <li>
                        <h4>Do the mpg math.</h4>
                        <p>
                            City drivers inevitably get worse fuel mileage, hence the distinction between "city" and "highway" mpg estimates on the window sticker. When you think about buying a car, combine the sky-high cost of fuel with the manufacturer's lowest mpg numbers, and you'll have some idea what to expect at the filling station. Check our "Top 10 Most Fuel-Efficient Cars for 2005" and "Top 10 Most Fuel-Efficient SUVs and Pickups for 2005". Note that hybrids such as the Toyota Prius, Toyota Highlander Hybrid, Lexus RX 400h and Ford Escape Hybrid can run solely on electric power at low speeds, so they get top marks in stop-and-go traffic.
                        </p>
                    </li>
                    <li>
                        <h4>Look for parking assist technology.</h4>
                        <p>
                            No one likes the sound of a truck in reverse ("beep, beep, beep"), but the electronic chime of parking assist will help you squeeze into small spaces with less trouble. (It may also prevent you from running into a person or object behind you.) Rear parking sensors are fairly common, and some luxury cars offer them in the front as well, among them the manageably sized 2005 BMW X3 SUV. High-end models of some cars, like the Toyota Sienna, Lexus RX 330/RX 400h have an optional rear-mounted camera instead. The camera projects an exact image of what's behind you on the navigation screen, which can be easier than relying on your ears alone. New technologies could make parking even easier. In 2004, Volvo showcased Parallel Parking Assistance (PPA) for its Volvo YCC ("Your Concept Car"). At the touch of a button, PPA confirms that your car will fit into your chosen space, then an Autopark feature actually helps the car steer itself into perfect position. This type of technology is already available on the Toyota Prius as Intelligent Parking Assist — but only in Japan.
                        </p>
                    </li>
                    <li>
                        <h4>Drive with mileage in mind.</h4>
                        <p>
                            Don't speed up just to slow down. If you lean on the accelerator when the light turns green, then again on the brake one street down, you're hurting both your car and your gas mileage. Instead, go lightly on the accelerator and coast where possible. If you're bumper-to-bumper, improve your fuel economy by slipping the car into neutral instead of constantly riding the brake. (This doesn't apply to hybrids which typically shut off the gas engine when stopped in traffic.) And don't try to get around the city on less than a quarter tank. Not only are city gas stations expensive, they're hard to find.
                        </p>
                    </li>
                    <li>
                        <h4>Pick a lane and stick to it.</h4>
                        <p>
                            Believe it or not, changing lanes frequently will get you there only a few seconds earlier, while greatly increasing your chance of a collision.
                        </p>
                    </li>
                    <li>
                        <h4>Remember to replace your cabin's air filter.</h4>
                        <p>
                            City driving means smog and soot. Your air filter protects you and your occupants from breathing the worst of the fumes and the particulates they carry. By the time some stranger has written "Wash Me" on your rear windshield, it's already too late for your lungs.
                        </p>
                    </li>
                    <li>
                        <h4> Make your car crime-resistant.</h4>
                        <p>
                            Take it from an ex-Manhattanite: You can't be too careful. Try to park in an area that's well lit and has a lot of pedestrians nearby. Don't leave valuables — including gym or shopping bags — visible in the car. (This writer once had a car broken into for the mere 35 cents left in the open change holder.) If possible, put any valuables in the trunk before you park, so that no one is watching you stow your stuff curbside. And more importantly, be proactive in securing your car by layering it with anti-theft protection like a starter disable switch, a wheel lock and a car alarm. If you want to know what the thieves know, an absolute "must read" is our "Top 10 Ways to Steal a Car (And How to Defend Against Them)".
                        </p>
                    </li>
                    <li>
                        <h4> Approach with caution.</h4>
                        <p>
                            Driving is made exponentially more difficult if you're new to a city. Locals know which roads to avoid, but strangers do not. It pays to check ahead of time to see if construction has turned your chosen path into a virtual parking lot. If a two-lane interstate becomes an eight-lane expressway as you approach the city, get into one of the right-hand lanes. This allows you to slow down enough to read unfamiliar signs. If your exit sneaks up on you and you're not in the correct lane, don't try to cross several lanes of highway traffic to make it. Let it go. Then get off at the next exit and work your way back if necessary. If the next exit is a ways off, check a map: Triangulating to your destination might be faster than doubling back on the highway
                        </p>
                    </li>
                    <li>
                        <h4>Use navigational aids</h4>
                        <p>
                            Good navigational aids are useful at any time, but particularly if you're traveling to a new city (or an unfamiliar part of it).
                        </p>
                    </li>
                </ol>
                </p>
                <p>
                    If you do get lost, take a deep breath. Allow yourself to be late. If your car doesn't have a built-in compass, can you reorient yourself the old-fashioned way, using the angle of the sun? (Or if you're really good, the position of the stars?) If that doesn't work and you have <a href="https://maps.google.com" target="_blank">Google Maps</a>, then take some time to locate your way
                </p>
                <p>
                    Finally, the best advice one can give about city driving is not to sweat the small stuff. Cabbies may cut you off, pedestrians may jaywalk, drivers may rubberneck, but you'll get there — eventually. The real trick is to keep your blood pressure down and your spirits up.
                </p>
            </div>
            <div class="box-body col-sm-4 border-left border-right">

            </div>
            <div class="box-body no-padding">
            </div>
        </div>
    </div>

</div>
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