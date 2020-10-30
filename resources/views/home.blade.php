<html >
<head>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- nice select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/jquery.dataTables.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/side/style.css">

    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- owl carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- contact js -->
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>

    <script src="js/js/jquery.min.js"></script>
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/main.js"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/side/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="css/jquery.dataTables.min.css" />

</head>

<body>
     <section id="Home">

        
               <div class="row">

                 
 <nav id="sidebar">

         <div class="img bg-wrap text-center py-4" style="background-image: url(images/contact-1-600x400.jpg);">

                <div class="user-logo">
                    <div class="img" style="background-image: url(images/Ejob_LOGO.png);"></div>
                    <h3>Control Panel</h3>
                </div>
            </div>

        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="{{url('index')}}"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
            @if (Auth::user()->name=="admin")
          <li>
            <a href="{{url('manageJobs')}}"><span class="fas fa-tag mr-3"></span>Manage Jobs</a>
          </li>
          <li>
            <a href="{{url('manageCandidates')}}"><span class="fas fa-address-card  mr-3"></span> Candidates</a>
          </li>
         <li>
            <a href="{{url('manageCompanies')}}"><span class="fas fa-building  mr-3"></span> Manage Companies</a>
         </li>
          @endif
         @if (Auth::user()->name!="admin")
         <li>
            <a href="{{url('myProfile')}}"><span class="fas fa-address-book  mr-3"></span>My Profile </a>
         </li>

        <li>
            <a href="{{url('manageDiploma')}}"><span class="fas fa-building  mr-3"></span> Add Diploma</a>
        </li>

           <li>
            <a href="{{url('suitableJobs')}}"><span class="fas fa-address-card  mr-3"></span>My Suitable Jobs</a>
          </li>
        
          <li>
            <a href="{{url('about')}}"><span class="fa fa-info-circle mr-3"></span> About</a>
          </li>
          <li>
            <a href="{{url('contact')}}"><span class="fa fa-envelope mr-3"></span> Contact</a>
          </li>
            @endif
                   <li >
                        
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   <span class="fas fa-ban mr-3"></span>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                               
                     </li>
        </ul>

        </nav>
        <div style="text-align:center; padding-left:500px; padding-top:40px; ">
    
      <br/>
          <a href="#"><img src="images/Ejob_LOGO.png" alt=""></a>
      <br/>
      <br/>

          </div>


     </section>  









@yield("content")



















             <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Head</h2>
                              </div>
                              <address>
                                   <p>2020</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>

                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2020 Company Name</p>
                                   <p>Template by: <a href="https://www.phpjabbers.com/">Asma Nahhas
                                   </a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+1 333 4040 5566</p>
                                   <p><a href="mailto:contact@company.com">contact@company.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="terms.html">Terms & Conditions</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="footer-info newsletter-form">
                              <div class="section-title">
                                   <h2>Newsletter Signup</h2>
                              </div>
                              <div>
                                   <div class="form-group">
                                        <form action="#" method="get">
                                             <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required>
                                             <input type="submit" class="form-control" name="submit" id="form-submit" value="Send me">
                                        </form>
                                        <span><sup>*</sup> Please note - we do not spam your email.</span>
                                   </div>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>
     </section>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
     <script type="text/javascript">
         
       $(document).ready(function(){
        $('#articleTable').DataTable({});
   });
     </script>
</body>
</html>

 
