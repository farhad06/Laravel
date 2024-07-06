<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Student-Registration</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center fw-bold mb-3"><u>Registration Form</u></h1>
                @if (session('message'))
                    <h4 class="alert alert-success mb-2">{{ session('message') }}</h4>
                @elseif(session('err_message'))
                    <h4 class="alert alert-danger mb-2">{{ session('err_message') }}</h4>
                @endif
                <form id="reg_form" method="POST" action="{{ url('submit_data') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="all-error-show"></div> --}}
                    <div class="mb-3">
                        <label for="" class="form-label">First Name</label>
                        <input type="text" id="fname" name="fname" class="form-control shadow-none">
                        @error('fname')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Middle Name</label>
                        <input type="text" id="mname" name="mname" class="form-control shadow-none">
                        @error('mname')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Last Name</label>
                        <input type="text" id="lname" name="lname" class="form-control shadow-none">
                        @error('lname')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control shadow-none">
                        @error('email')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control shadow-none"
                            minlength="10" maxlength="10">
                        @error('phone')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" id="image" name="image" class="form-control shadow-none"
                            accept=".jpg,.jpeg,.png,.gif,.webp,.tiff">
                        @error('image')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        {{-- @if (session('img_err'))
                            <div class="text-danger mt-1 mb-1">{{ session('img_err') }}</div>
                        @endif --}}
                    </div>
                    {{-- <div class="mb-3">
                        <label for="" class="form-label">PDF</label>
                        <input type="file" id="pdf" name="pdf" class="form-control shadow-none" 
                            accept=".pdf">
                        @error('pdf')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control shadow-none">
                        @error('password')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-dark shadow-none">SUBMIT</button>
                        <a href="{{ url('/show') }}" class="btn btn-primary shadow-none">SHOW DATA</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
