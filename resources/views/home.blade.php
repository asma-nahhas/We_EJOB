<!DOCTYPE html>
<html>
<head>
 
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>

<div class="sidebar">


             <div class="img bg-wrap text-center py-4" style="background-color:#29ca8e;">

                    <div class="user-logo">
                   
                         <h3>Control Panel</h3>
                   </div>
             </div>

 
                  <a href="{{url('index')}}"><span class="fa fa-home mr-3"></span> Home</a>
            

            @if (Auth::user()->name=="admin")

                  
                      <a href="{{url('manageJobs')}}"><span class="fas fa-tag mr-3"></span>Manage Jobs</a>
                 
                      <a href="{{url('manageCandidates')}}"><span class="fas fa-address-card  mr-3"></span> Candidates</a>
                
                      <a href="{{url('manageCompanies')}}"><span class="fas fa-building  mr-3"></span> All Companies</a>
                   
          @endif
         @if (Auth::user()->type=="Company")
      
            <a href="{{url('manageJobs')}}"><span class="fas fa-tag mr-3"></span>Manage Jobs</a>


            <a href="{{url('manageCompanies')}}"><span class="fas fa-building  mr-3"></span>Company Profile</a>
         
            <a href="{{url('manageCandidates')}}"><span class="fas fa-address-card  mr-3"></span> Candidates</a>
       
          @endif

         @if (Auth::user()->name!="admin" && Auth::user()->type!="Company" )
        
            <a href="{{url('myProfile')}}"><span class="fas fa-address-book  mr-3"></span>My Profile </a>
      
            <a href="{{url('manageDiploma')}}"><span class="fas fa-building  mr-3"></span> Add Diploma</a>
      
         @if ($hasCandidate==1)

          
            <a href="{{url('suitableJobs')}}"><span class="fas fa-address-card  mr-3"></span>My Suitable Jobs</a>
       
        @endif
      
            <a href="{{url('about')}}"><span class="fa fa-info-circle mr-3"></span> About</a>
      
            <a href="{{url('contact')}}"><span class="fa fa-envelope mr-3"></span> Contact</a>
      
            @endif
                
                        
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   <span class="fas fa-ban mr-3"></span>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                               
                 
       
</div>
<br/>
<br/>
<div class="content" align="center">

    <a href="#"><img src="images/Ejob_LOGO.png" alt=""></a>
          
</div>



</body>
</html>