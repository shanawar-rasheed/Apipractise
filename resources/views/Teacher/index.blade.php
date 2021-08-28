<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  </head>
<body>
   <section style="padding-top: 30px; " class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Teacher Record using ajax</h3>
                            <a href="{{ route('teacher.create') }}" class="btn btn-success"  data-toggle="modal" data-target="#addteacherModal">Add Teacher</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped " id="teacher_table">
                                <thead>
                                    <tr>
                                        <th>FirstName</th>
                                        <th>LastName</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $record)
                                        
                                    <tr id="tid{{ $record->id }}">
                                        <td>{{ $record->firstname }}</td>
                                        <td>{{ $record->lastname }}</td>
                                        <td>{{ $record->email }}</td>
                                        <td>{{ $record->phone }}</td>
                                        <td>
                                          <a href="javascript:void(0)" onclick="editTeacher({{  $record->id }})" class="btn btn-info">Edit</a>
                                          <a href="javascript:void(0)" onclick="deleteTeacher({{  $record->id }})" class="btn btn-danger">Delete</a>
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

   <!-- Button trigger modal -->
<
  <!-- Add Modal -->
  <div class="modal fade" id="addteacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('teacher.insert') }}" method="post" id="add_form_id">
            @csrf
            <div class="form-group">
              <label for="firstname">FirstName</label>
              <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Please Enter First Name" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="firstname">LastName</label>
              <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Please Enter Last Name" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Please Enter Email" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Please Enter Phone" aria-describedby="helpId">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!-- End Add Modal -->


<!-- Edit Modal -->
<div class="modal fade" id="editteacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
        <button type="button"   class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  id="edit_form_id">
          @csrf
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="firstname">FirstName</label>
            <input type="text" name="firstname" id="edit_firstname" class="form-control" placeholder="Please Enter First Name" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="firstname">LastName</label>
            <input type="text" name="lastname" id="edit_lastname" class="form-control" placeholder="Please Enter Last Name" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="edit_email" class="form-control" placeholder="Please Enter Email" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="edit_phone" class="form-control" placeholder="Please Enter Phone" aria-describedby="helpId">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- End Edit Modal -->




  <script>
    $("#add_form_id").submit(function(e){
      e.preventDefault();
      let firstname=$("#firstname").val();
      let lastname=$("#lastname").val();
      let email=$("#email").val();
      let phone=$("#phone").val();
      let _token=$("input[name=_token]").val();
  
      $.ajax({
        url:"{{ route('teacher.insert') }}",
        type:"POST",
        data:{
          firstname:firstname,
          lastname:lastname,
          email:email,
          phone:phone,
          _token:_token
        },
        success:function(response)
        {
            if(response)
          {
            $("#teacher_table tbody").prepend('<tr><td>'+response.firstname+'</td><td>'+response.lastname+'</td><td>'+response.email+'</td><td>'+response.phone+'</td></tr>');
            $("#add_form_id")[0].reset();
            $("#addteacherModal").modal('hide');
          }
        }
      });
    });
  </script>


  <script>
    function editTeacher(id)
    {
      $.get('teacher/'+id,function(teacher){
        $("#id").val(teacher.id);
        $("#edit_firstname").val(teacher.firstname);
        $("#edit_lastname").val(teacher.lastname);
        $("#edit_email").val(teacher.email);
        $("#edit_phone").val(teacher.phone);
        $("#editteacherModal").modal('toggle');
      });
    }


    $("#edit_form_id").submit(function(e){
      e.preventDefault();
      let id=$("#id").val();
      let firstname=$("#edit_firstname").val();
      let lastname=$("#edit_lastname").val();
      let email=$("#edit_email").val();
      let phone=$("#edit_phone").val();
      let _token=$("input[name=_token]").val();

      $.ajax({
        url:"{{ route('teacher.update') }}",
        type:"PUT",
        data:
        {
          id:id,
          firstname:firstname,
          lastname:lastname,
          email:email,
          phone:phone,
          _token:_token
        },
        success:function(response)
        {
          $("#tid"+response.id+"td:nth-child(1)").text(response.firstname);
          $("#tid"+response.id+"td:nth-child(2)").text(response.lastname);
          $("#tid"+response.id+"td:nth-child(3)").text(response.email);
          $("#tid"+response.id+"td:nth-child(4)").text(response.phone);
          $("#editteacherModal").modal("toggle");
          $("#edit_form_id")[0].reset();
        }
      });
    });
  </script>
  
  <script>
    function deleteTeacher(id)
    {
      if(confirm('Do You Really Want To Delete'))
      {
        $.ajax({
          url:"teacher/"+id,
          type:"DELETE",
          data:
            {
              _token:$("input[name=_token]").val()
            },
            success:function(response)
            {
              $("#tid"+id).remove();
            }
        });
      }
    }
  </script>
</body>





</html>