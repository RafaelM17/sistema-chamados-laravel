<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Chamados</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 min-h-screen text-slate-800 antialiased">

<div class="max-w-6xl mx-auto p-12">

    
    <div class="grid grid-cols-2 gap-6 mb-10">

        <div class="bg-white p-5 rounded-xl border border-slate-300 shadow-sm">
            <p class="text-sm text-slate-400 font-medium mb-1">Total de chamados</p>
            <p class="text-3xl font-bold text-slate-800">{{ $chamados->count() }}</p>
        </div>

        <div class="bg-white p-5 rounded-xl border border-slate-300 shadow-sm">
            <p class="text-sm text-slate-400 font-medium mb-1">Setor</p>
            <p class="text-3xl font-bold text-slate-800">TI / Suporte</p>
        </div>

    </div>

    
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Sistema de Chamados</h1>

        <a href="{{ route('chamados.create') }}"
           class="bg-blue-600 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-700 shadow-sm transition-colors">
            + Novo Chamado
        </a>
    </div>

    
    @if(session('success'))
        <div class="bg-emerald-50 text-emerald-800 border border-emerald-200 p-4 rounded-xl mb-6 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

  
    <div class="bg-white border border-slate-300 rounded-xl shadow-sm overflow-hidden">

        <table class="w-full text-left border-collapse">

            <thead class="bg-slate-50 text-sm font-semibold text-slate-700 border-b border-slate-200">
                <tr>
                    <th class="p-4 w-[35%]">Título</th>
                    <th class="p-4 w-[12%]">Status</th>
                    <th class="p-4 w-[12%]">Prioridade</th>
                    <th class="p-4 w-[12%]">Responsável</th>
                    <th class="p-4 w-[12%]">Setor</th>
                    <th class="p-4 w-[17%] text-center">Ações</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100 text-sm">

            @forelse($chamados as $chamado)

                <tr class="hover:bg-slate-50/80 transition-colors">

                  
                    <td class="p-4 font-normal text-slate-900 line-clamp-2">
                        {{ $chamado->titulo }}
                    </td>

                    
                    <td class="p-4 whitespace-nowrap">
                        @if(trim(strtolower($chamado->status)) == 'aberto')
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700 border border-amber-200/60">Aberto</span>
                        @elseif(in_array(trim(strtolower($chamado->status)), ['em_andamento', 'em andamento']))
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700 border border-blue-200/60">Em andamento</span>
                        @elseif(trim(strtolower($chamado->status)) == 'resolvido')
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700 border border-emerald-200/60">Resolvido</span>
                        @else
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 border border-slate-200/60">Fechado</span>
                        @endif
                    </td>

                 
                    <td class="p-4 whitespace-nowrap">
                        @if(trim(strtolower($chamado->prioridade)) == 'alta')
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-600 border border-rose-200/60">Alta</span>
                        @elseif(trim(strtolower($chamado->prioridade)) == 'media' || trim(strtolower($chamado->prioridade)) == 'média')
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-orange-100 text-orange-600 border border-orange-200/60">Média</span>
                        @else
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-600 border border-emerald-200/60">Baixa</span>
                        @endif
                    </td>

                    
                    <td class="p-4 text-slate-500 whitespace-nowrap">
                        {{ $chamado->responsavel->nome ?? 'Não atribuído' }}
                    </td>

                   
                    <td class="p-4 text-slate-500 whitespace-nowrap">
                        {{ $chamado->setor ?? 'Não informado' }}
                    </td>

                   
                    <td class="p-4">
                        <div class="flex justify-center items-center gap-1">

                            <a href="{{ route('chamados.show', $chamado->id) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded text-xs font-medium transition-colors text-center w-14">
                                Ver
                            </a>

                            <a href="{{ route('chamados.edit', $chamado->id) }}"
                               class="bg-slate-600 hover:bg-slate-700 text-white px-3 py-1.5 rounded text-xs font-medium transition-colors text-center w-14">
                                Editar
                            </a>

                            <form action="{{ route('chamados.destroy', $chamado->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este chamado?')"
                                  class="inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded text-xs font-medium transition-colors text-center w-16">
                                    Apagar
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="p-12 text-center text-slate-400 font-medium">
                        Nenhum chamado encontrado no sistema.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
