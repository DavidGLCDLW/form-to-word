<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Tipo de Formulario</title>
</head>
<body>
    <h1>Selecciona el tipo de formulario:</h1>
    <form action="{{ route('formulario.show') }}" method="GET">
        <select name="tipo_formulario">
            @foreach($formularios as $formulario)
                <option value="{{ $formulario->title }}">{{ $formulario->title }}</option>
            @endforeach
        </select>
        <button type="submit">Seleccionar</button>
    </form>
</body>
</html>