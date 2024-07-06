<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registration</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center fw-bold"><u>Registration Form</u></h1>
        <div class="row">
            <form action="{{ url('/submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">First Name</label>
                    <input type="text" name="fname" class="form-control shadow-none">
                    @error('fname')
                        <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Middle Name</label>
                    <input type="text" name="mname" class="form-control shadow-none">
                    @error('mname')
                        <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Last Name</label>
                    <input type="text" name="lname" class="form-control shadow-none">
                    @error('lname')
                        <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control shadow-none">
                    @error('email')
                        <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control shadow-none">
                    @error('phone')
                        <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="psw" class="form-control shadow-none">
                    @error('psw')
                        <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button class="btn btn-dark shadow-none">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
