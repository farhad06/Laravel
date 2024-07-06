<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Salary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center fw-bold mb-4"><u>Add Salary</u></h1>
        <div class="row">
            <form action="{{ url('/submit_sal') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <label class="form-label">Employee Name:</label>
                        <input type="text" name="name" class="form-control shadow-none">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Salary:</label>
                        <input type="number" name="salary" class="form-control shadow-none">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark shadow-none" style="margin-top: 32px;">ADD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
