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
    @include('navbar')
    <div class="container mt-5">
        <table class="table table-striped table-hover text-center">
            <tr>
                <th>id tools</th>
                <th>name</th>
                <th>id tipe tools</th>
                <th>Action</th>
            </tr>
            @foreach ($apiTools->data as $tool)
                <tr>
                    <td>{{ $tool->id_tool }}</td>
                    <td>{{ $tool->name }}</td>
                    <td>{{ $tool->id_type_tool }}</td>
                    <td class="d-flex justify-content-center">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit">Edit</button>
                        <form action="{{ route('destroy', ['id' => $tool->id_tool]) }}" method="post" class="ms-1">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            tambah
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('tambah') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <label for="tool">Name: </label>
                            <input type="text" name="name" id="tool" class="form-control">
                            <label for="type-tools">Pilih Tipe Tool: </label>
                            <select name="select" id="type-tools" class="form-control">
                                @foreach ($types->data as $type)
                                    <option value="{{ $type->id_type_tool }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($apiTools->data as $tool)
            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('edit', ['id' => $tool->id_tool]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <label for="tool">Name: </label>
                                <input type="text" name="name" id="tool" class="form-control"
                                    value="{{ $tool->name }}">
                                <label for="type-tools">Pilih Tipe Tool: </label>
                                <select name="select" id="type-tools" class="form-control">
                                    <option selected>Pilih Tipe Tools</option>
                                    @foreach ($types->data as $type)
                                        <option value="{{ $type->id_type_tool }}"
                                            @if ($type->id_type_tool === $tool->id_type_tool) selected @endif>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
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
    <script src="js/api.js"></script>
</body>

</html>
