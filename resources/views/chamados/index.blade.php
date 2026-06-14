<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Chamados</title>
</head>
<body>
    <h1>Lista de Chamados</h1>

    <a href="{{ route('chamados.create') }}">+ Novo Chamado</a><br><br>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @foreach($chamados as $chamado)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <p><strong>Título:</strong> {{ $chamado->titulo }}</p>
            <p><strong>Status:</strong> {{ ucfirst($chamado->status) }}</p>
            <p><strong>Prioridade:</strong> {{ ucfirst($chamado->prioridade) }}</p>
            <p><strong>Responsável:</strong> {{ $chamado->responsavel->nome ?? 'Não atribuído' }}</p>
            <a href="{{ route('chamados.show', $chamado->id) }}">Ver</a> |
            <a href="{{ route('chamados.edit', $chamado->id) }}">Editar</a>
        </div>
    @endforeach
</body>
</html>