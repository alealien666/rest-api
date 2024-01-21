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
        <table class="table table-striped table-hover mt-5">
            <tr>
                <th>Id tipe tool</th>
                <th>nama alat</th>
                <th>action</th>
            </tr>
            {{-- @dd($tools) --}}
            @foreach ($tools->data as $tool)
                <tr>
                    <td>{{ $tool->id_type_tool }}</td>
                    <td>{{ $tool->name }}</td>
                    <td class="d-flex">
                        <button class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $tool->id_type_tool }}">Edit</button>
                        <form action="{{ route('hapus', ['idTypeTool' => $tool->id_type_tool]) }}" method="post"
                            onclick="confirm('yakiiin?')">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger ms-1">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            tambah
        </button>

        <!-- addModal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="text" name="name" placeholder="masukkan tipe alat" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- edit --}}
        @foreach ($tools->data as $tool)
            <div class="modal fade" id="editModal{{ $tool->id_type_tool }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('update', ['id' => $tool->id_type_tool]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <input type="text" name="name" placeholder="masukkan tipe alat"
                                    class="form-control" value="{{ $tool->name }}">
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
