
<!DOCTYPE html>
<html lang="en">
<head>

     <title>E_WeJob</title>
      <link rel="icon" href="images/Ejob_LOGO.png">
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">

          <div class="container">
   

               <div class="navbar-header">
                      <img src="images/Ejob_LOGO.png"  align="left" width="75" height="75" alt="">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
             

               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="active"><a href="{{ url('index') }}">Home</a></li>
                         <li><a href="{{ url('jobsList') }}">Jobs</a></li>
                         <li><a href="{{ url('about') }}">About</a></li>
                         <li><a href="{{ url('blogPosts') }}">Companies</a></li>
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                              
                              <ul class="dropdown-menu">
                                   <li><a href="{{ url('team') }}">Team</a></li>
                                   <li><a href="{{ url('testiMonials') }}">Candidates</a></li>
                                   <li><a href="{{ url('terms') }}">Terms</a></li>
                              </ul>
                         </li>
                         <li><a href="{{ url('contact') }}">Contact Us</a></li>
                    </ul>
               </div>

          </div>
     </section>