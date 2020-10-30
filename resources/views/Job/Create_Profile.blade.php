


@extends('Job.Header')
@section('content')

  <br/>
  <br/>
  <br/>

  <body>
 @if(count($errors)>0)
   <br/>
  <br/>
  <br/>
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>

@endif

@if(\Session::has('success'))
  <br/>
  <br/>
  <br/>
<div  class="alert alert-success">
  <p>{{ \Session::get('success')}}</p>
</div>

@endif
        
     


        <!-- Page Content  -->

      <div id="content"   >
      	<br/>
     
       <h2> <center>My Profile</center></h2>

        <br/>
</div>
<div style="margin-left:100px;">
<a href="{{ url('/home') }}" class="btn btn-info">Back Home</a>



</div>

<div  style="margin-left:400px; width:864px;"  >
        <!--Start Form Modal-->
  <form  action="{{  action('CandidateController@store2') }}"  method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

          <div class="form-group">
            <label for="Name">My Name</label>
            <input  type="text" class="form-control input-sm" name="name" value="{{$data->name}}" aria-describedby="name">
           
          </div>

          <div class="form-group">
            <label for="Name">Email</label>
            <input type="text" class="form-control input-sm" name="email" aria-describedby="email" value="{{$data->email}}">
           
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Candidate Experiance Years</label>
            <input  class="form-control input-sm" name="experienceYears"  placeholder="Enter Candidate Experiance Years"> </input> 
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Candidate Password</label>
            <input type="password" class="form-control input-sm" name="password" placeholder="Enter Candidate Password" required="required"> </input> 
          </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

  </form>

</div>





 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/main.js"></script>




  </body>
</html>
       

  <br/>
  <br/>
  <br/>

@endsection
 @extends("Job.Footer") 