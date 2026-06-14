<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
</head>
<body>
   <form action="{{route('chamados.store')}}" method="POST">
        @csrf
    <div>
        <label>Título</label>
    <input type="text" name="titulo">
    </div>
     <div>
         <label>Descrição:</label><br>
    <textarea name="descricao" required></textarea><br><br>
    </div>
     <div>
       
         
        <label>Prioridade</label>
        <select name="prioridade">
            <option value="baixa">Baixa</option>
            <option value="media">Média</option>
            <option value="alta">Alta</option>
        </select>
    
    </div>
     <div>
        <h1>responsável</título>
        <select name="responsavel_id">

        @foreach($responsaveis as $r)

        <option value="{{ $r->id }}">
            {{ $r->nome }}
        </option>
        @endforeach
    
    </select>
    <button type="submit">Salvar Chamado</button>
    </div>
    </form>
    </body>
</html>