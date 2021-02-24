<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <section style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                       <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Supervisors
                            </div>
                            <div class="col-md-6">
                                <!-- Button trigger modal -->
                                <a href="javascript:void(0)" class="pull-right" data-toggle="modal" data-target="#supervisorModal"><i class="fa fa-plus-circle fa-2x test-warning" aria-hidden="true"></i></a>
                                <a href="javascript:void(0)" id="deleteAllSelectedRecord" class="pull-right"><i class="fa fa-trash fa-2x text-danger mr-3" aria-hidden="true"></i></a>
                            </div>
                        </div>
                       </div>
                        <div class="card-body">
                            <table id="supervisortable" class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="chkCheckAll" /></th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supervisors as $supervisor)
                                        <tr id="sid{{$supervisor->id}}">
                                            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$supervisor->id}}" /></td>
                                            <td>{{ $supervisor->firstname }}</td>
                                            <td>{{ $supervisor->lastname }}</td>
                                            <td>{{ $supervisor->email }}</td>
                                            <td>{{ $supervisor->phone }}</td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="editSupervisor({{$supervisor->id}})"><i class="fa fa-pencil-square-o fa-2x text-success" aria-hidden="true"></i></a>
                                                <a href="javascript:void(0)" onclick="deleteSupervisor({{$supervisor->id}})"><i class="fa fa-trash fa-2x text-danger ml-2" aria-hidden="true"></i></a>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/a7ed024a81.js"></script>
    <!-- Add Supervisor Modal -->
    <div class="modal fade" id="supervisorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Supervisor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="supervisorForm">
                        @csrf
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Supervisor Modal -->
    <div class="modal fade" id="supervisorEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Supervisor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="supervisorEditForm">
                        @csrf
                        <input type="hidden" id="id" name="id" />
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname2" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname2" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email2" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone2" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts section -->
    <script>
        $('#supervisorForm').submit(function(e) {
            e.preventDefault();

            let firstname = $('#firstname').val();
            let lastname = $('#lastname').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let _token = $('input[name=_token]').val();

            $.ajax({
                url: "{{ route('supervisor.add') }}",
                type: "POST",
                data: {
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
                        $("#supervisortable tbody").prepend('<tr><td>'+ response.firstname +'</td><td>'+ response.lastname +'</td><td>'+ response.email +'</td><td>'+ response.phone +'</td></tr>');
                        $("#supervisorForm")[0].reset();
                        $("#supervisorModal").modal('hide');
                    }
                }
            });
        });
    </script>
    <script>
        function editSupervisor(id)
        {
            $.get('/supervisors/'+id,function(supervisor){
                $('#id').val(supervisor.id);
                $('#firstname2').val(supervisor.firstname);
                $('#lastname2').val(supervisor.lastname);
                $('#email2').val(supervisor.email);
                $('#phone2').val(supervisor.phone);
                $('#supervisorEditModal').modal('toggle');
            });
        }

        $('#supervisorEditForm').submit(function(e) {
            e.preventDefault();

            let id = $("#id").val();
            let firstname = $('#firstname2').val();
            let lastname = $('#lastname2').val();
            let email = $('#email2').val();
            let phone = $('#phone2').val();
            let _token = $('input[name=_token]').val();

            $.ajax({
                url: "{{ route('supervisor.update') }}",
                type: "PUT",
                data: {
                    id:id,
                    firstname:firstname,
                    lastname:lastname,
                    email:email,
                    phone:phone,
                    _token:_token
                },
                success:function(response){
                    $('#sid' + response.id + ' td:nth-child(1)').text(response.firstname);
                    $('#sid' + response.id + ' td:nth-child(2)').text(response.lastname);
                    $('#sid' + response.id + ' td:nth-child(3)').text(response.email);
                    $('#sid' + response.id + ' td:nth-child(4)').text(response.phone);
                    $("#supervisorEditModal").modal('toggle');
                    $("#supervisorEditForm")[0].reset();
                }
            });
        });
    </script>
    <script>
        function deleteSupervisor(id)
        {
            if(confirm("Do you realy want to delete this record?"))
            {
                $.ajax({
                    url:'/supervisors/'+id,
                    type:'DELETE',
                    data:{
                        _token : $("input[name=_token]").val()
                    },
                    success:function(response)
                    {
                        $("#sid"+id).remove();
                    }
                });
            }
        }
    </script>

    <script>
        $(function(e){
            $("#chkCheckAll").click(function(){
                $(".checkBoxClass").prop('checked', $(this).prop('checked'));
            });

            $("#deleteAllSelectedRecord").click(function(e) {
                e.preventDefault();
                var allids = [];

                $("input:checkbox[name=ids]:checked").each(function(){
                    allids.push($(this).val());
                });

                $.ajax({
                    url:"{{route('supervisors.deletedSelected')}}",
                    type:"DELETE",
                    data:{
                        _token:$("input[name=_token]").val(),
                        ids:allids
                    },
                    success:function(response){
                        $.each(allids,function(key,val){
                            $("#sid"+val).remove();
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
