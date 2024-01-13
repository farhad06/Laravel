<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #log-in-form {
            margin-top: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="float:right;" id="resMsg" class="mt-5">
            @if (session('err_msg'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('err_msg') }}!</strong>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @elseif(session('succ_msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('succ_msg') }}!</strong>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <div id="log-in-form" class="shadow rounded px-5 py-5">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">User Name</label>
                                <input type="email" name="email" class="form-control shadow-none"
                                    placeholder="Enter Your Email">
                                @error('email')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" name="password" class="form-control shadow-none"
                                    placeholder="Enter Your Password">
                                @error('password')
                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <span>New User ? Register <a href="{{ url('reg') }}"
                                    class="text-decoration-none">Here</a></span>
                            <div class="mt-1">
                                <button class="btn btn-primary shadow-none">LOG IN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        setTimeout(() => {
            $('#resMsg').remove();
        }, 3000);
    </script>
</body>

</html>
