<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoW</title>
</head>
<body>
    <h1>Detalhes do Chamado</h1>

    <p><strong>Título:</strong> {{ $chamado->titulo }}</p>
    <p><strong>Descrição:</strong> {{ $chamado->descricao }}</p>
    <p><strong>Prioridade:</strong> {{ $chamado->prioridade }}</p>
    <p><strong>Status:</strong> {{ $chamado->status }}</p>
    
</body>
</html>