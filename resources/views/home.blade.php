<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO -->
    <meta name="author" content="Surjith S M">
    <meta name="description" content="MentalPress is a Responsive Medical and Health HTML5 Template ">
    <meta name="keywords" content="health, medical, psychotherapy, website, template">

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Page Title -->
    <title>HLIVE</title>

    <!-- Main CSS -->
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- RTL : Enable RTL Style -->
    <!-- <link href="assets/css/rtl.css" rel="stylesheet"> -->

    <!-- Theme CSS -->
    <!-- <link href="assets/css/themes/purple.css" rel="stylesheet"> -->

    <!-- Modernizr -->
    <script src="{{URL::asset('assets/js/modernizr.js')}}"></script>
    <script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>

    <style type="text/css" media="screen">
    .over {
    white-space: nowrap; 
    overflow: hidden;
    text-overflow: ellipsis; 
   
}
.overlay {
  position: fixed;
  z-index: 3;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;

 
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.widad{
    width: 50%;
    margin-left: 25%;
}

</style>

</head>

<body>

    <!-- ============================
      TOP BAR
     ============================ -->

    <div class="top">
        <div class="top__background"></div>
        <div class="container">
           <br>
        </div>
    </div>

    <!-- ========  // END TOP BAR ======== -->

    <!-- ============================
      HEADER
     ============================ -->

    <div class="container">
        <header class="header">
            <div class="logo">
                <a href="{{URL::to('/')}}"> <img src="{{URL::asset('assets/images/logo.png')}}" alt="" width="160px"> </a>
            </div>
            <a href="#main-navigation" class="navbar-toggle"> <span class="navbar-toggle__text">MENU</span> <span class="navbar-toggle__icon-bar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </span>
            </a>
            <div class="header-widgets">
              

                <div class="widget  header-widgets__widget  widget-social-icons">
                    <a class="social-icons__link" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a class="social-icons__link" href="#" target="_blank"><i class="fa  fa-twitter"></i></a>
                    <a class="social-icons__link" href="#y" target="_blank"><i class="fa  fa-youtube"></i></a>
                </div>

              

            </div>
        </header>
    </div>

    <!-- ========  // END HEADER ======== -->

    <!-- ============================
      CONTAINER
     ============================ -->

    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-md-9 col-md-push-3" role="main">

                <!-- ============================
                      SLIDER
                     ============================ -->

              

                <!-- ========  // SLIDER ======== -->

                <!-- ============================
                  CONTENT
                 ============================ -->
                @section('stream')
                @show
            
                <!-- // end .content-container -->

                <!-- ========  // END CONTENT ======== -->

                <!-- ============================
                  LATEST POSTS
                 ============================ -->

                @section('container')
                @show
            </div>

            <!-- // end div[role=main] -->

            <div class="col-xs-12  col-md-3  col-md-pull-9">

                <!-- ============================
                  SIDEBAR 13.71.120.155
                 ============================ -->

                <div class="sidebar">
                    <nav id="main-navigation" class="main-navigation__container">
                        <div class="main-navigation__title"> NAVIGATION</div>
                        <ul id="menu-main-menu" class="main-navigation">

                        <li class="menu-item current-menu-item current_page_item"><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="menu-item current-menu-item current_page_item"><a href="{{URL::to('sports')}}">Sports</a></li>
                        <li class="menu-item current-menu-item current_page_item"><a href="{{URL::to('politics')}}">Politics</a></li>
                        <li class="menu-item current-menu-item current_page_item"><a href="{{URL::to('entertainment')}}">Entertainment</a></li>
                           
                    </nav>
                    
                </div>

                <!-- ========  // END SIDEBAR ======== -->

            </div>
        </div>
        <!-- // end .row -->
    </div>
    <!-- // end .container -->

    <div class="footer-gradient"></div>
    <footer class="footer">
        <div class="footer-top">
            <div class="container  footer-top__divider">
                <div class="row">
                    <div class="col-xs-12  col-md-4">
                        <div class="widget  widget_text">
                            <h6 class="footer-top__headings">H NEWS URDU</h6>
                            <div class="textwidget">
                                <p>Stay update with the latest news</p> </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
       
    </footer>

    <!-- ========== Javascripts ========= -->

    <!-- Jquery -->
    <script type="text/javascript" src="{{URL::asset('assets/js/jquery.min.js')}}"></script>

    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Picture Fill -->
    <script type="text/javascript" src="{{URL::asset('assets/js/picturefill.min.js')}}"></script>

    <!-- Main JS -->
    <script type="text/javascript" src="{{URL::asset('assets/js/main.js')}}"></script>
<script type="text/javascript">
WowzaPlayer.create('playerElement',
    {
    "license":"PLAY1-9rQZ6-Mfe6u-eXc66-Af6jb-wWwtQ",
    "title":"HNEWS",
    "description":"",
    "sourceURL":"http%3A%2F%2F192.168.0.42%3A1935%2FHnews%2FHnews%2Fplaylist.m3u8",
    "autoPlay":false,
    "volume":"75",
    "mute":false,
    "loop":false,
    "audioOnly":false,
    "uiShowQuickRewind":true,
    "uiQuickRewindSeconds":"30"
    }
);
</script>
</body>

</html>
