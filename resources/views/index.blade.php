{{-- @dd($users) --}}
@include('navbar')
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <table class="table table-hover table-striped mt-5">
            <tr>
                <th>user Id</th>
                <th>Username</th>
                <th>button</th>
            </tr>
            @foreach ($users['data'] as $user)
                @if ($user['username'] == 'admin')
                    <tr>
                        <td>{{ $user['id_user'] }}</td>
                        <td>{{ $user['username'] }}</td>
                        <td>
                            <button class="btn btn-primary" disabled>edit</button>
                            <button class="btn btn-danger" disabled>hapus</button>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td>{{ $user['id_user'] }}</td>
                        <td>{{ $user['username'] }}</td>
                        <td class="d-flex ">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $user['id_user'] }}">
                                Edit
                            </button>
                            <form action="{{ route('delete', ['id_user' => $user['id_user']]) }}" method="post"
                                onclick="confirm('yakiiin?')" class="ms-1">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Button trigger modal -->


        <!-- add Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('post') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <label for="user" class="form-label">Username:</label>
                            <input type="text" name="username" id="user" class="form-control">
                            <label for="pw" class="form-label">Password:</label>
                            <input type="text" name="password" id="pw" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        @foreach ($users['data'] as $user)
            <div class="modal fade" id="editModal{{ $user['id_user'] }}" tabindex="-1" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('update', ['id' => $user['id_user']]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="editUsername" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="editUsername" name="username"
                                        value="{{ $user['username'] }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
