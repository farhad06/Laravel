<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div>
            <a href="/newUser" class="btn btn-sm btn-primary shadow-none mt-2">+ADD</a>
            <h1 class="text-center"><u>All Users Data</u></h1>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                @php
                    $i=1
                @endphp
                @foreach ($data as $id=> $user)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->city }}</td>
                    <td class="text-center">
                        <a href="{{route('view.user',$user->id)}}" class="btn btn-sm btn-info shadow-none">VIEW</a>
                        <a href="{{route('update.page',$user->id)}}" class="btn btn-sm btn-success shadow-none">UPDATE</a>
                        <a href="{{route('delete.user',$user->id)}}" class="btn btn-sm btn-danger shadow-none">DELETE</a>
                    </td>
                </tr> 
                @endforeach 
            </tbody>
        </table>
    </div>
</body>

</html>