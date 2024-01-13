<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Student-Registration</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center fw-bold mb-3"><u>Registration Form</u></h1>
                <form id="reg_form">
                    @csrf
                    {{-- <div class="all-error-show"></div> --}}
                    <div class="mb-3">
                        <label for="" class="form-label">First Name</label>
                        <input type="text" id="fname" name="fname" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Middle Name</label>
                        <input type="text" id="mname" name="mname" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Last Name</label>
                        <input type="text" id="lname" name="lname" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control shadow-none"
                            minlength="10" maxlength="10">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" id="image" name="image" class="form-control shadow-none"
                            accept=".jpg,.jpeg,.png,.gif,.webp,.tiff">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-dark shadow-none" id="submit_reg_data">SUBMIT</button>
                        <a href="{{ url('/show') }}" class="btn btn-primary shadow-none">SHOW DATA</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $('#reg_form').on('submit', function(e) {
            e.preventDefault();
            //alert("Submit Button clicked");
            let data = new FormData(this);
            //console.log(data);
            $.ajax({
                url: "{{ url('/submit_data') }}",
                type: "POST",
                data: data,
                dataType: false,
                contentType: false,
                processData: false,
                beforeSend: () => {
                    $('.err_msg').remove();
                    $('#submit_reg_data').text('Loading.....');
                },
                success: (data) => {
                    //console.log(data);
                    $('#submit_reg_data').text('SUBMIT');
                    if (data.success) {
                        Swal.fire(
                            'Added!',
                            'Student Added Successfully!',
                            'success'
                        )
                        $('#reg_form').trigger('reset');
                    } else {
                        displayError(data.error);
                    }
                },
                error: (data) => {
                    console.log(data);
                },
                complete: () => {
                    $('#submit_reg_data').text('SUBMIT');
                }
            });
        });

        function displayError(errors) {
            var erroMsg = '';
            $.each(errors, function(index, value) {
                //all
                erroMsg += value + "<br>";
                //indivudial
                $("#" + index).parent('div').append('<span class="err_msg text-danger"> ' + value + '</span>');
                $("#fname").show();
            });

            $(".all-error-show").html(erroMsg);
        }
    </script>
</body>

</html>
