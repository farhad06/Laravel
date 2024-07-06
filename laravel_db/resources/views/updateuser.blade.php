<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div>
            <h2 class="text-center fw-bold"><u><i>Update User</i></u></h2>
        </div>
        {{-- <div class="d-flex justify-content-center"> --}}
        <form action="{{route('update.user',$data->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" value="{{$data->name}}" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" value="{{$data->email}}" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Age</label>
                <input type="number" name="age" value="{{$data->age}}" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">City</label>
                <input type="text" name="city" value="{{$data->city}}" class="form-control shadow-none">
                {{-- <select name="city" class="form-select shadow-none">
                    <option value="">Select</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Pune">Pune</option>
                    <option value="Noida">Noida</option>
                </select> --}}
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success shadow-none">UPDATE</button>
            </div>
        </form>
        {{-- </div> --}}
    </div>
</body>

</html>