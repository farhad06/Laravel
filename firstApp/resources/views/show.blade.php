<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center fw-bold"><u>USERS DATA</u></h1>
        <a href="{{url('/adduser')}}" class="btn btn-sm btn-primary  shadow-none mb-2">ADD USERS</a>
        <div class="table table-responsive">
            <table class="table table-bordered">
                <thead class="text-center">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($data->all() as $user)
                        <tr>
                            <td>{{ $user->fname }}&nbsp;
                                {{ $user->mname }}&nbsp;
                                {{ $user->lname }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
