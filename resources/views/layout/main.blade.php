<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Road learner is a website that caters for all matters driving. Online driving classes include, video, pictures, traffic rules, highway code and emerging trends on the road">
        <meta name="author" content="">
        <link rel='shortcut icon' href='favicon.png' type='image/x-icon'/ >

              <title>@yield("title","Home") | Road Learner</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/AdminLTE.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/business-frontpage.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        @if($app->environment('local'))
        <link rel="stylesheet" href="uikit-2.24.3/css/uikit.min.css" />
        @else
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/uikit.min.css" />
        @endif
        <!-- Font Awesome CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Archive - 3 (mobile, www.alicewanjiru.com) -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-6475722357974643"
         data-ad-slot="1869632415"
         data-ad-format="auto"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <body>
        @yield('preloader')
        <div class="se-pre-con"></div>
        <!-- Navigation -->
        @include('layout.top_nav')

        <!-- Image Background Page Header -->
        <!-- Note: The background image is set within the business-casual.css file. -->
        @yield('slider')

        <!-- Page Content -->
        <div class="container">
            @yield('content')
            @include('layout.footer')

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/2.2.0.jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        @if($app->environment('local'))
        <script src="uikit-2.24.3/js/uikit.min.js"></script>
        <script src="uikit-2.24.3/js/core/scrollspy.min.js"></script>
        <script src="uikit-2.24.3/js/core/smooth-scroll.min.js"></script>
        <script src="uikit-2.24.3/js/core/grid.min.js"></script>
        @else
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/core/scrollspy.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/core/smooth-scroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/grid.min.js"></script>
        @endif

        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script>
        //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
            ;
        });
        </script>
        @yield('scripts')

    </body>

</html>