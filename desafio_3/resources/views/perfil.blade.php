<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Perfil del Usuario</h1>
    <p>Nombre: {{ $usuarios->name }} {{ $usuarios->lastname }}</p>
    <p>Email: {{ $usuarios->email }}</p>
    <p>Cargo: {{ $usuarios->cargo }}</p>
    <p>Salario: {{ $usuarios->salario }}</p>
</div>
</body>
</html>