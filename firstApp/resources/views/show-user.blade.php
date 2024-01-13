{{-- @if (!Auth::user()->id)
    <script>
        window.location.href = "{{ url('/') }}";
    </script>
@endif --}}
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
                @if (Auth::user()->role == 1)
                    <div style="float: left;margin-top:20px;">
                        <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal"
                            data-bs-target="#managerole">
                            MANAGE ROLE
                        </button>
                    </div>
                @endif
                {{-- <h1 class="text-center fw-bold mb-4"><u>Students Data</u></h1> --}}
                @if (Auth::user()->id)
                    {{-- <h1 class="text-center fw-bold mb-4">Welcome {{ session('u_name') }}</h1>
                    <a href="" class="btn btn-sm btn-danger shadow-none">Log Out</a> --}}
                    <div class="mt-3 mb-4 d-flex justify-content-between" style="float:right">
                        <h5 class="fw-bold me-2">Welcome {{ Auth::user()->fname }}</h5>
                        <a href="{{ url('logout') }}" class="btn btn-sm btn-danger shadow-none">Log Out</a>
                    </div>
                @endif
                <div id="resMsg">
                    @if (Session::has('success'))
                        <h4 class="alert alert-success mb-2">{{ Session::get('success') }}</h4>
                    @elseif(Session::has('err_msg'))
                        <h4 class="alert alert-success mb-2">{{ Session::get('err_msg') }}</h4>
                    @endif
                </div>
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
                                        @if (empty($item->image))
                                            <h5>No Image Found</h5>
                                        @else
                                            <img src="{{ asset('storage/imageABC/' . $item->image) }}" alt="User Image"
                                                height="80px" width="80px">
                                        @endif
                                    </td>
                                    <td>
                                        @if ((Auth::user()->role == 1 && $item->edit == 1) || Auth::user()->role == 0)
                                            <a href="{{ url('/edit') . '/' . $item->id }}"
                                                class="btn btn-sm btn-info shadow-none" id="edit_btn">EDIT</a>
                                        @endif
                                        @if (Auth::user()->role == 1 && $item->delete_data == 1)
                                            <a href="{{ url('/delete') . '/' . $item->id }}"
                                                class="btn btn-sm btn-danger shadow-none" id="delete_btn">DELETE</a>
                                        @endif
                                        {{-- <button class="btn btn-sm btn-info shadow-none" id="edit_btn"
                                            onclick="edit_data({{ $item->id }})">EDIT</button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ((Auth::user()->role == 1 && $item->register == 1) || Auth::user()->role == 0)
                    <a href="{{ url('/reg') }}" class="btn btn-primary shadow-none">REGISTER</a>
                @endif
            </div>
        </div>
        <!--Manage Role Modal Start-->
        <!-- Modal -->
        <div class="modal fade" id="managerole" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Manage Role</h5>
                        {{-- <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('submit_modal_data') }}" method="POST">
                            @csrf
                            <label for="" class="form-label fw-bold">Editor</label>
                            <div class="form-check">
                                <input class="form-check-input shadow-none" type="checkbox" value="true"
                                    name="show" id="show" checked>
                                <label class="form-check-label" for="show">
                                    Show
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input shadow-none" type="checkbox" value="true"
                                    id="register" name="register" @if ($item->register == 1) checked @endif>
                                <label class="form-check-label" for="register">
                                    Register
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input shadow-none" type="checkbox" value="true"
                                    id="edit" name="edit" @if ($item->edit == 1) checked @endif>
                                <label class="form-check-label" for="edit">
                                    Edit
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input shadow-none" type="checkbox" value="true"
                                    id="delete" name="delete" @if ($item->delete_data == 1) checked @endif>
                                <label class="form-check-label" for="delete">
                                    Delete
                                </label>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger shadow-none"
                            data-bs-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-sm btn-info shadow-none">SAVE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Manage Role Modal End-->

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        setTimeout(() => {
            $('#resMsg').remove();
        }, 3000);
    </script>
</body>

</html>
