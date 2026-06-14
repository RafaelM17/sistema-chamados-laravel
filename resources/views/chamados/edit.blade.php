<form action="{{ route('chamados.update', $chamado->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Título</label>
    <input name="titulo" value="{{ $chamado->titulo }}">
    <br><br>

    <label>Descrição</label>
    <input name="descricao" value="{{ $chamado->descricao }}">
    <br><br>

    <label>Prioridade</label>
    <select name="prioridade">
        <option value="baixa" {{ $chamado->prioridade == 'baixa' ? 'selected' : '' }}>Baixa</option>
        <option value="media" {{ $chamado->prioridade == 'media' ? 'selected' : '' }}>Média</option>
        <option value="alta" {{ $chamado->prioridade == 'alta' ? 'selected' : '' }}>Alta</option>
    </select>
    <br><br>

    <label>Status</label>
    <select name="status">
        <option value="aberto" {{ $chamado->status == 'aberto' ? 'selected' : '' }}>Aberto</option>
        <option value="em_andamento" {{ $chamado->status == 'em_andamento' ? 'selected' : '' }}>Em andamento</option>
        <option value="resolvido" {{ $chamado->status == 'resolvido' ? 'selected' : '' }}>Resolvido</option>
        <option value="fechado" {{ $chamado->status == 'fechado' ? 'selected' : '' }}>Fechado</option>
    </select>
    <br><br>

    <label>Responsável</label>
    <select name="responsavel_id">
        @foreach($responsaveis as $responsavel)
            <option value="{{ $responsavel->id }}"
                {{ $chamado->responsavel_id == $responsavel->id ? 'selected' : '' }}>
                {{ $responsavel->nome }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Atualizar</button>
</form>