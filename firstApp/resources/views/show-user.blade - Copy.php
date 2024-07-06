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
                @if (session('message'))
                    <h4 class="alert alert-success mb-2">{{ session('message') }}</h4>
                @endif
                <div class="table table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <?php $name = $item->fname . ' ' . $item->mname . ' ' . $item->lname; ?>
                                    <td>{{ $name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <img src="{{ asset('storage/imageABC/' . $item->image) }}" alt="User Image"
                                            height="80px" width="80px">
                                    </td>
                                    <td>
                                        <a href="{{ url('/edit') . '/' . $item->id }}"
                                            class="btn btn-sm btn-info shadow-none" id="edit_btn">EDIT</a>
                                            {{-- <a href="{{ url('/edit') . '/' . $item->id }}"
                                            class="btn btn-sm btn-info shadow-none" id="edit_btn">EDIT</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ url('/reg') }}" class="btn btn-primary shadow-none">REGISTER</a>
                {{-- <a href="{{ url('/all') }}" class="btn btn-sm btn-primary shadow-none">SHOW DATA</a> --}}
            </div>
        </div>
    </div>
</body>

</html>
