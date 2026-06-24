<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Chamado</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center">

<div class="w-full max-w-2xl bg-white shadow-lg rounded-xl p-8">

    <h1 class="text-2xl font-bold text-slate-800 mb-6">
        Editar Chamado
    </h1>

    <form action="{{ route('chamados.update', $chamado->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Título</label>
            <input name="titulo" value="{{ $chamado->titulo }}"
                   class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Descrição</label>
            <textarea name="descricao" rows="6"
                      class="w-full border border-slate-300 rounded-lg px-3 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $chamado->descricao }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Prioridade</label>
            <select name="prioridade"
                    class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="baixa" {{ $chamado->prioridade == 'baixa' ? 'selected' : '' }}>Baixa</option>
                <option value="media" {{ $chamado->prioridade == 'media' ? 'selected' : '' }}>Média</option>
                <option value="alta" {{ $chamado->prioridade == 'alta' ? 'selected' : '' }}>Alta</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Status</label>
            <select name="status"
                    class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <option value="aberto" {{ $chamado->status == 'aberto' ? 'selected' : '' }}>Aberto</option>
                <option value="em_andamento" {{ $chamado->status == 'em_andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="resolvido" {{ $chamado->status == 'resolvido' ? 'selected' : '' }}>Resolvido</option>
                <option value="fechado" {{ $chamado->status == 'fechado' ? 'selected' : '' }}>Fechado</option>

            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Setor</label>
            <select name="setor"
                    class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <option value="TI" {{ $chamado->setor == 'TI' ? 'selected' : '' }}>TI</option>
                <option value="RH" {{ $chamado->setor == 'RH' ? 'selected' : '' }}>RH</option>
                <option value="Financeiro" {{ $chamado->setor == 'Financeiro' ? 'selected' : '' }}>Financeiro</option>
                <option value="Suporte" {{ $chamado->setor == 'Suporte' ? 'selected' : '' }}>Suporte</option>

            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Responsável</label>
            <select name="responsavel_id"
                    class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                @foreach($responsaveis as $responsavel)
                    <option value="{{ $responsavel->id }}"
                        {{ $chamado->responsavel_id == $responsavel->id ? 'selected' : '' }}>
                        {{ $responsavel->nome }}
                    </option>
                @endforeach

            </select>
        </div>

        <div>
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Atualizar Chamado
            </button>
        </div>

    </form>

</div>

</body>
</html>