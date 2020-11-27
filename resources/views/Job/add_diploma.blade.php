
@extends('Job.Header')

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


 
          



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
        
        <div class="wrapper d-flex align-items-stretch">


        <!-- Page Content  -->

      <div id="content" width="100" >
      	<br/>
     
       <h2> <center>Manage Diploma </center></h2>

        <br/>
    

<!-- Button trigger modal -->
<div style="margin-left:100px;">
<a href="{{ url('/home') }}" class="btn btn-info">Back Home</a>
<button   type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
Add Diploma
</button>


</div>

<br/>
<br/>
 <div class="container">
       <table class="table">
     <thead>
                    <tr>
                        <th>Candidate Id</th>
                        <th>Diploma Type</th>
                        <th>Diploma Title</th>
                        <th>Update</th>
                        <th>Delete</th>
                  
                    </tr>
                </thead>
                <tbody>

                  @foreach($data as $element)
                  <tr>
                      <td>{{$element->candidate_id}}</td>
                      <td>{{$element->diplomaType}}</td>
                      <td>{{$element->diplomaTitle}}</td>
                  

             
             

                  <td><button class="btn btn-success" data-toggle="modal" data-target="#editModalCenter"  onclick="updatefunc({{$element}})"><i class="fa fa-edit"></i></button></td> 
                  <td>
                  
                  <form action="{{url('Diploma',$element->id)}}" method="post">
                    {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>

              </td>
             
                  </tr>   
                  @endforeach
                </tbody>
  </table>
</div>



</div>

<!--Start Add Modal-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Candidate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Start Form Modal-->
  <form  action="{{  action('DiploamaController@store') }}"  method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

          <div class="form-group">
            <label for="Name">Candidate ID</label>
            <input type="text" class="form-control" name="candidate_id" value="{{ Auth::user()->id }}" aria-describedby="candidate_id" >
           
          </div>

          <div class="form-group">
            <label for="Name">Diploma Type</label>
            <select type="text" class="form-control" name="diplomaType" aria-describedby="diplomaType" placeholder="Enter Diploma Type">
              <option value="Master" >Master</option>
              <option value="PhD" >PhD</option>
              <option value="Diploma" >Diploma</option>
              <option value="Bachelor" >Bachelor</option>

            </select>
           
          </div>

          <div class="form-group">
            <label for="Name">Diploma Title</label>
            <input type="text" class="form-control" name="diplomaTitle" aria-describedby="diplomaTitle" placeholder="Enter Diploma Title">
           
          </div>
 

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

  </form>
                <!--End Form Modal-->

      </div>
    </div>
  </div>
</div>
<!--Finish Add Modal-->


<!--Start Edit Modal -->
<div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalCenterTitle">Edit Candidate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Start Form Modal-->
  <form   id="editForm" method="post" enctype="multipart/form-data">
     {{ method_field('PUT') }}
       {{ csrf_field() }}
      <input type="hidden" class="form-control" name="editId" id="editId" >


          <div class="form-group">
            <label for="exampleInputPassword1">Diploma Type</label>
            <select  class="form-control" name="editDiplomaType" id="editDiplomaType" placeholder="Enter Diploma Type">
              <option value="Master" >Master</option>
              <option value="PhD" >PhD</option>
              <option value="Diploma" >Diploma</option>
              <option value="Bachelor" >Bachelor</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Diploma Title</label>
            <input  class="form-control" name="editDiplomaTitle" id="editDiplomaTitle" placeholder="Enter Diploma Title">
          </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

  </form>
                <!--End Form Modal-->

      </div>
    </div>
  </div>
</div>

<!--Finish Edit Modal-->



      </div>


      <!-- Page content end-->
        </div>
  </div>
</div>



 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/main.js"></script>




  </body>
</html>
       
  

    

    <script type="text/javascript">

      function updatefunc($element){


        $("#editId").val($element["id"]);
        $("#editDiplomaType").val($element["diplomaType"]);
        $("#editDiplomaTitle").val($element["diplomaTitle"]);

    

       $("#editForm").attr('action', '{{url("Diploma",'+$element["id"]+')}}');

        
       


      }

     function deletefunc($id){
      

              $("#deleteModalCenter").attr('action', '{{  url("Diploma.destroy",'+$id+') }}');

       


      }


 
    </script>
  <br/>
  <br/>
  <br/>

@endsection
 @extends("Job.Footer") 