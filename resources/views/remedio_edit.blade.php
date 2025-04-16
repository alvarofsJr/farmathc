<x-app-layout>
    <div class="container mx-auto mt-10 max-w-sm" x-data="{ show: false }">
        @if(session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                <h2 class="text-xl font-semibold mb-4 text-center">Editar Remédio</h2>

                <form id="formEdicaoRemedio" x-ref="formEdicaoRemedio" action="{{ route('remedios.update', $remedio->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <!-- Nome -->
                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Remédio</label>
                        <input type="text" name="nome" value="{{ old('nome', $remedio->nome) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            placeholder="Nome do remédio">
                        @error('nome')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Categoria -->
                    <div class="mb-4">
                        <label for="id_categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                        <select name="id_categoria"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option disabled {{ old('id_categoria', $remedio->id_categoria) ? '' : 'selected' }}>
                                Selecione a categoria
                            </option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('id_categoria', $remedio->id_categoria) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_categoria')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Quantidade -->
                    <div class="mb-4">
                        <label for="quantidade" class="block text-sm font-medium text-gray-700">Quantidade</label>
                        <input type="number" name="quantidade" value="{{ old('quantidade', $remedio->quantidade) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            placeholder="Quantidade">
                        @error('quantidade')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Valor -->
                    <div class="mb-4">
                        <label for="valor" class="block text-sm font-medium text-gray-700">Valor</label>
                        <input type="number" step="0.01" name="valor" value="{{ old('valor', $remedio->valor) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            placeholder="Valor">
                        @error('valor')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Validade -->
                    <div class="mb-4">
                        <label for="validade" class="block text-sm font-medium text-gray-700">Validade</label>
                        <input type="text" name="validade"
                            value="{{ old('validade', \Carbon\Carbon::parse($remedio->validade)->format('d/m/Y')) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            placeholder="Validade (dd/mm/aaaa)"
                            x-data x-mask="99/99/9999">
                        @error('validade')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Botões -->
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('remedios') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white text-center py-2 px-4 rounded">
                            Voltar
                        </a>
                        <button type="button" @click="show = true"
                            class=" bg-cyan-600 hover:bg-cyan-700 text-white py-2 px-4 rounded">
                            Atualizar
                        </button>    
                    </div>
                </form>
            </div>
        <!-- Modal de confirmação -->
        <div x-show="show" x-transition x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow max-w-md w-full">
                <h2 class="text-lg font-bold mb-4 text-center text-cyan-700">Confirmar Edição</h2>
                <p class="text-center mb-4">Deseja realmente atualizar este remédio?</p>
                <div class="flex justify-center gap-4">
                    <button @click="show = false"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</button>
                    <button @click="$refs.formEdicaoRemedio.submit()"
                        class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
