<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>All Teachers</title>
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
                                        All Teachers
                                    </div>
                                    <div class="col-md-6">
                                        <a href="/add-teacher" class="pull-right"><i class="fa fa-plus-circle fa-2x test-warning" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('teacher_deleted'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('teacher_deleted') }}
                                    </div>
                                @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Profile Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{ $teacher->name }}</td>
                                                <td><img src="{{asset('images')}}/{{ $teacher->profileimage }}" style="max-width:60px;"></td>
                                                <td>
                                                    <a href="/edit-teacher/{{ $teacher->id }}"><i class="fa fa-pencil-square-o fa-2x text-success" aria-hidden="true"></i></a>
                                                    <a href="/delete-teacher/{{ $teacher->id }}"><i class="fa fa-trash fa-2x text-danger ml-2" aria-hidden="true"></i></a>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/a7ed024a81.js"></script>
    </body>
</html>
