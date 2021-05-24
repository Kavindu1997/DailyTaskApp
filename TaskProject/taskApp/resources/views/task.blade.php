<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Routine </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Tasks</h1>
            <div class="row">
                <div class="col-md-12">

                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
                @endforeach
                    <form method="post" action="/saveTask">  
                    {{csrf_field()}}
                    
                           <input type="text" class="form-control" name="task" placeholder="Enter Your Task Here..."><br>
                           <input type="submit" class="btn btn-primary" value="Save">
                           <input type="button" class="btn btn-warning" value="Clear">
                    </form>
                  <hr>
                    <table class="table table-dark">
                        <th>ID</th>
                        <th>Task</th>
                        <th>Completed</th>
                        <th>Action</th>
                        @foreach($accessTask as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->task}}</td>
                            <td>
                                @if($task->iscompleted)
                                <button class="btn btn-success">Completed</button>
                                @else
                                <button class="btn btn-danger">Not Completed</button>
                                @endif
                            </td>
                            <td>
                                @if($task->iscompleted)
                                   <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-secondary">Mark As Not Completed</a>
                                @else
                                   <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark As Completed</a>
                                @endif 
                                &nbsp;  &nbsp;  &nbsp;
                                   <a href="/updateTask/{{$task->id}}" class="btn btn-info">Update</a>
                                   <a href="/deleteTask/{{$task->id}}" class="btn btn-light">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>