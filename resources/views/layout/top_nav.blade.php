<style>
    .dropdown{
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .dropdown a{
        color: #92969A;
        text-decoration: none;
        cursor: pointer !important;
    }
    .dropdown a:hover{
        color: #fff;
        text-decoration: none;
        cursor: pointer !important;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;

    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #9FA3A7}

    .dropdown:hover .dropdown-content {
        z-index: 1;
        display: block !important;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
    .has-child > a:after {
        color: #f9f9f9;
        content: ' ▾';
    }
</style>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Road Learner</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <div class="dropdown has-child">
                        <a>Driving Basics</a>
                        <div class="dropdown-content">
                            <a href="{{URL('/car-basics')}}">Car Basics</a>
                            <a href="{{URL('/general-tips')}}">General Tips</a>
                            <a href="{{URL('/city-tips')}}">City Driving Tips</a>
                            <!--                            <a href="#">Round About</a>
                                                        <a href="#">Traffic Lights</a>-->
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{URL('/traffic-signs')}}">Traffic Signs</a>
                </li>
                <li>
                    <a href="{{URL('/driving-videos')}}">Driving Videos</a>
                </li>
<!--                <li>
                    <div class="dropdown has-child">
                        <a>&nbsp;&nbsp;&nbsp;Driving Exercises</a>
                        <div class="dropdown-content">
                            <a href="{{URL('/select-test')}}">Driving Test</a>
                            <a href="{{URL('/faqs')}}">FAQs</a>
                        </div>
                    </div>
                </li>-->
                <li>
                    <a href="{{URL('/select-test')}}">Driving Exercises</a>
                </li>
<!--                <li>
                    <a href="{{URL('/road-statistics')}}">Road Statistics</a>
                </li>-->
                <li>
                    <a href="{{URL('/calculator')}}">Import Tax Calculator</a>
                </li>
                <li>
                    <a href="{{URL('/view-downloads')}}">Downloads</a>
                </li>
                <li>
                    <a href="http://blog.roadlearner.com" target="_blank">Blog</a>
                </li>
                <li>
                    <a href="{{URL('/contact')}}">Contact Us</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>