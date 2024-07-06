<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Show-Student-Data</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center fw-bold mb-4"><u>Students Data</u></h1>
                <div class="table table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Verified</th>
                                <th>PDF</th>
                            </tr>
                        </thead>
                        <tbody id="show-data1">
                            @foreach ($data as $item)
                                <tr>
                                    <?php $name = $item->fname . ' ' . $item->mname . ' ' . $item->lname; ?>
                                    <td>{{ $name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    @if ($item->verified == 0)
                                        <td><span class="badge rounded-pill bg-danger">Not Verified</span></td>
                                    @else
                                        <td><span class="badge rounded-pill bg-success">Verified</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ asset('storage/pdfs/' . $item->pdf) }}"><img src="images/pdf_logo.jpg" alt="Pdf Icon" width="80"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ url('/registration') }}" class="btn btn-primary shadow-none">REGISTER</a>
                {{-- <a href="{{ url('/all') }}" class="btn btn-sm btn-primary shadow-none">SHOW DATA</a> --}}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        var showData;
        $(document).ready(function() {
            showData = function() {
                $.ajax({
                    url: "{{ url('/show') }}",
                    type: "GET",
                    dataType: 'json',
                    success: (data) => {
                        //console.log(data);
                        var tbody = $('#show-data');
                        tbody.empty();
                        $.each(data, function(index, val) {
                            tbody.append(`
                            <tr>
                                <td>${val.fname} ${val.mname} ${val.lname}</td>
                                <td>${val.email}</td>
                                <td>${val.phone}</td>
                            </tr>
                            `);
                        });

                    },
                    error: (data) => {
                        console.log(data);
                    }
                });
            }

            showData();
        });
    </script>
</body>

</html>
