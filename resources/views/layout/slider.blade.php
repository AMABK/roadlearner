<link rel="stylesheet" type="text/css" href="slider/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="slider/css/demo.css" />
<link rel="stylesheet" type="text/css" href="slider/css/component.css" />
<script src="slider/js/modernizr.min.js"></script>
<section id="photostack-3" class="photostack" style="width: 1286px; margin-left: -73px">
    <div>
        <figure>
            <a href="/round-about" class="photostack-img"><img src="slider/img/roundabout.gif" alt="Round About"/></a>
            <figcaption>
                <h2 class="photostack-title">Round About</h2>
                <div class="photostack-back">
                    <p>
                        Roundabout is a circular intersection that comes in a variety of sizes, sometimes with multiple exits, lanes and traffic lights. They reduce vehicle speeds through an intersection, and as a result improve safety for all road users — pedestrians, cyclists and motorists.
                    </p> 
                </div>
            </figcaption>
        </figure>
        <figure>
            <a href="/driving-videos" class="photostack-img"><img src="slider/img/video-icon.png" alt="Driving Videos"/></a>
            <figcaption>
                <h2 class="photostack-title">Driving Videos</h2>
                <div class="photostack-back">
                    <p>These Happy Days are yours and mine Happy Days. It's a beautiful day in this neighborhood a beautiful day for a neighbor. Would you be mine?</p>
                </div>
            </figcaption>
        </figure>
        <figure>
            <a href="/traffic-lights" class="photostack-img"><img src="slider/img/lights-icon.png" alt="Traffic Lights"/></a>
            <figcaption>
                <h2 class="photostack-title">Traffics Lights</h2>
                <div class="photostack-back">
                    <p>A road signal for directing vehicular traffic by means of colored lights, typically red for stop, green for go, and yellow for proceed with caution. Also called stoplight, traffic signal.</p>
                </div>
            </figcaption>
        </figure>
        <figure>
            <a href="/traffic-signs" class="photostack-img"><img src="slider/img/signs.gif" alt="Traffic Signs"/></a>
            <figcaption>
                <h2 class="photostack-title">Traffic Signs</h2>
                <div class="photostack-back">
                    <p>Traffic signs or road signs are signs erected at the side of or above roads to give instructions or provide information to road users. The earliest signs were simple wooden or stone milestones.</p>
                </div>
            </figcaption>
        </figure>
        <figure>
            <a href="/" class="photostack-img"><img src="slider/img/turning-icon.png" alt="Turning"/></a>
            <figcaption>
                <h2 class="photostack-title">Box Junction</h2>
                <div class="photostack-back">
                    <p>
                        You MUST NOT enter the box until your exit road or lane is clear. 
                        Because there is a line of traffic already in the road on the right, there is no room for you to join this queue without blocking the flow of traffic 
                    </p>
                </div>
            </figcaption>
        </figure>
        <figure>
            <a href="/highway-code" class="photostack-img"><img src="slider/img/highway-icon.png" alt="Highway Code"/></a>
            <figcaption>
                <h2 class="photostack-title">Highway Code</h2>
                <div class="photostack-back">
                    <p>The Highway Code is essential reading for everyone. The most vulnerable road users are pedestrians, particularly children, older or disabled people, cyclists, motorcyclists and horse riders.</p>
                </div>
            </figcaption>
        </figure>
        <figure data-dummy>
            <a href="#" class="photostack-img"><img src="slider/img/highway-icon.png" alt="img07"/></a>
            <figcaption>
                <h2 class="photostack-title">Highway Code</h2>
            </figcaption>
        </figure>
        <figure data-dummy>
            <a href="#" class="photostack-img"><img src="slider/img/signs.gif" alt="img08"/></a>
            <figcaption>
                <h2 class="photostack-title">Traffic Signs</h2>
            </figcaption>
        </figure>
        <figure data-dummy>
            <a href="#" class="photostack-img"><img src="slider/img/stop-icon.png" alt="img09"/></a>
            <figcaption>
                <h2 class="photostack-title">Stop Sign</h2>
            </figcaption>
        </figure>
        <figure data-dummy>
            <a href="#" class="photostack-img"><img src="slider/img/no-u-turn-icon.png" alt="img10"/></a>
            <figcaption>
                <h2 class="photostack-title">No U-Turn Sign</h2>
            </figcaption>
        </figure>
        <figure data-dummy>
            <a href="#" class="photostack-img"><img src="slider/img/lights.gif" alt="img11"/></a>
            <figcaption>
                <h2 class="photostack-title">Traffic Lights</h2>
            </figcaption>
        </figure>
        <figure data-dummy>
            <a href="#" class="photostack-img"><img src="slider/img/no-u-turn-icon.png" alt="img12"/></a>
            <figcaption>
                <h2 class="photostack-title">No U-Turn</h2>
            </figcaption>
        </figure>
        <figure data-dummy>
            <a href="#" class="photostack-img"><img src="slider/img/highway-icon.png" alt="img13"/></a>
            <figcaption>
                <h2 class="photostack-title">Highway Code</h2>
            </figcaption>
        </figure>
        <figure data-dummy>
            <a href="#" class="photostack-img"><img src="slider/img/road-signs.png" alt="img14"/></a>
            <figcaption>
                <h2 class="photostack-title">Road Signs</h2>
            </figcaption>
        </figure>
        <figure data-dummy>
            <a href="#" class="photostack-img"><img src="slider/img/lights.gif" alt="img15"/></a>
            <figcaption>
                <h2 class="photostack-title">Traffic Lights</h2>
            </figcaption>
        </figure>
        <figure data-dummy>
            <a href="#" class="photostack-img"><img src="slider/img/video-icon.png" alt="img16"/></a>
            <figcaption>
                <h2 class="photostack-title">Video Turorial</h2>
            </figcaption>
        </figure>
    </div>
</section>
<script src="slider/js/classie.js"></script>
<script src="slider/js/photostack.js"></script>
<script>
    new Photostack(document.getElementById('photostack-3'), {
        // any other options here,
        showNavigation: true,
        afterShowPhoto: function (ps) {
            setTimeout(function () {
                ps._rotateItem();
                setTimeout(function () {
                    ps._rotateItem();
                    setTimeout(function () {
                        ps._navigate('next');
                    }, 3000);
                }, 6000);//Set Description/text delay
            }, 3000);
        }
    });
//        new Photostack( document.getElementById( 'photostack-3' ), {
//  // any other options here,
//	afterInit: function(ps) {
//		setTimeout(function() {
//			ps._open(true);
//		}, 3000);
//	},
//	afterShowPhoto: function(ps) {
//		setTimeout(function() {
//			ps._navigate('next');
//		}, 3000);
//	}
//});


</script>
