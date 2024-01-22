<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar">
        <h1>Negara Api</h1>
        <div class="navbar-nav">
            <ul>
                <li><a class="link active" href="/index">User</a></li>
                <li><a class="link" href="/pitik">Type Tools</a></li>
                <li><a class="link" href="/tools">Tools</a></li>
                <li><a class="link" href="#">History</a></li>
            </ul>
        </div>
        <div class="wrap">
            <p id="dark" style="cursor: pointer">Dark</p>
            <p id="hamburger">Hamburger</p>
        </div>
    </nav>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
