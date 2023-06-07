<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store') }}" method="post">
        @csrf
        <label for="curso">Curso: </label>
        <input type="text" name="curso" value="{{ old('curso') }}"> <!-- O "name" é importante pois no back-end é que pega a informação -->
        <br>

        <label for="carga">Carga: </label>
        <input type="text" name="carga" value="{{ old('carga') }}">
        <br>

        <button type="submit">Enviar</button>

    </form>

    
</body>
</html>