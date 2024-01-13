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
                @if (session('success_message'))
                    <h4 class="alert alert-success mb-2">{{ session('success_message') }}</h4>
                @elseif(session('err_message'))
                    <h4 class="alert alert-danger mb-2">{{ session('err_message') }}</h4>
                @endif
                <form id="reg_form" method="POST" action="{{ url('/submit') }}">
                    @csrf
                    {{-- <div class="all-error-show"></div> --}}
                    <div class="mb-3">
                        <label for="" class="form-label">First Name</label>
                        <input type="text" id="fname" name="fname" class="form-control shadow-none" required>
                        <div class="text-danger mt-1 mb-1" id="fnameerr"></div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Middle Name</label>
                        <input type="text" id="mname" name="mname" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Last Name</label>
                        <input type="text" id="lname" name="lname" class="form-control shadow-none" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control shadow-none" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control shadow-none" required
                            minlength="10" maxlength="10">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control shadow-none" required>
                    </div>
                    <div>
                        <button class="btn btn-dark shadow-none" id="submit_btn">SUBMIT</button>
                        <a href="{{ url('/all') }}" class="btn btn-primary shadow-none">SHOW DATA</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function displayError(errors) {
            //console.log(errors, 'main response');
            var erroMsg = '';
            $.each(errors, function(index, value) {
                //console.log(index, key);
                //all
                erroMsg += value + "<br>";

                //indivudial
                $("#" + index).parent('div').append('<span class="text-danger"> ' + value + '</span>');

                $("#fname").show();
            });

            $(".all-error-show").html(erroMsg);
        }
    </script>
</body>

</html>
