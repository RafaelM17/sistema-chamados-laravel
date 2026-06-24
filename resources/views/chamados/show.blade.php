<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Chamado</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 min-h-screen text-slate-800">

<div class="max-w-3xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6 text-slate-900">
        Detalhes do Chamado
    </h1>

    <div class="bg-white shadow-md rounded-xl p-6 space-y-5 border border-slate-200">

        <div>
            <p class="text-sm text-slate-500">Título</p>
            <p class="text-lg font-semibold">{{ $chamado->titulo }}</p>
        </div>

        <div>
            <p class="text-sm text-slate-500">Descrição</p>
            <p class="text-slate-700">{{ $chamado->descricao }}</p>
        </div>

        <div class="flex gap-3 flex-wrap">

          
            <div>
                <p class="text-xs text-slate-500 mb-1">Prioridade</p>
                <span class="px-3 py-1 rounded-full text-xs font-semibold
                    {{ $chamado->prioridade == 'alta' ? 'bg-rose-100 text-rose-700' : '' }}
                    {{ $chamado->prioridade == 'media' ? 'bg-orange-100 text-orange-700' : '' }}
                    {{ $chamado->prioridade == 'baixa' ? 'bg-emerald-100 text-emerald-700' : '' }}
                ">
                    {{ ucfirst($chamado->prioridade) }}
                </span>
            </div>

            
            <div>
                <p class="text-xs text-slate-500 mb-1">Status</p>
                <span class="px-3 py-1 rounded-full text-xs font-semibold
                    {{ $chamado->status == 'aberto' ? 'bg-amber-100 text-amber-700' : '' }}
                    {{ $chamado->status == 'em andamento' ? 'bg-blue-100 text-blue-700' : '' }}
                    {{ $chamado->status == 'resolvido' ? 'bg-emerald-100 text-emerald-700' : '' }}
                    {{ $chamado->status == 'fechado' ? 'bg-slate-200 text-slate-700' : '' }}
                ">
                    {{ ucfirst($chamado->status) }}
                </span>
            </div>

        </div>

        <div class="grid grid-cols-2 gap-4">

            <div>
                <p class="text-sm text-slate-500">Setor</p>
                <p class="font-medium">{{ $chamado->setor ?? 'Não informado' }}</p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Responsável</p>
                <p class="font-medium">
                    {{ $chamado->responsavel->nome ?? 'Não atribuído' }}
                </p>
            </div>

        </div>

    </div>

    <div class="mt-5">
        <a href="{{ route('chamados.index') }}"
           class="text-blue-600 hover:text-blue-800 font-medium">
            ← Voltar
        </a>
    </div>

</div>

</body>
</html>