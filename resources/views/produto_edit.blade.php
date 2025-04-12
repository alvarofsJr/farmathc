<x-app-layout>
    @if(session()->has('message'))
        <div class="alert alert-success my-1 mx-4 d-flex justify-content-center align-items-center">
            <ul class="mb-0">{{ session()->get('message') }}</ul>
        </div>
    @endif

    <div class="container mx-auto mt-10 max-w-sm">
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Editar Produto</h1>

            <form x-data="{ showModal: false }" @submit.prevent="showModal = true" method="POST" action="{{ route('produtos.update', ['produto' => $produto->id]) }}">
                @csrf
                @method('PUT')
                <!--Nome-->
                <div class="mb-4">
                    <label for="nome" class="block text-gray-700 font-medium mb-1">Nome do Produto</label>
                    <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('nome')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Categoria -->
                <div class="mb-4">
                    <label for="categoria" class="block text-gray-700 font-medium mb-1">Categoria do Produto</label>
                    <select name="categoria_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option disabled {{ old('categoria_id') ? '' : 'selected' }}></option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id', $produto->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Quantidade -->
                <div class="mb-4">
                    <label for="quantidade" class="block text-gray-700 font-medium mb-1">Quantidade do Produto</label>
                    <input type="number" name="quantidade"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                        value="{{ old('quantidade', $produto->quantidade) }}" >
                    @error('quantidade')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Valor -->
                <div class="mb-4">
                    <label for="valor" class="block text-gray-700 font-medium mb-1">Valor do Produto</label>
                    <input type="number" name="valor"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                        value="{{ old('valor', $produto->valor) }}" >
                    @error('valor')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Validade -->
                <div class="mb-4" x-data>
                    <label for="validade" class="block text-gray-700 font-medium mb-1">Validade do Produto</label>
                    <input type="text" name="validade" placeholder="dd/mm/aaaa"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                        value="{{ old('validade', date('d/m/Y', strtotime($produto->validade))) }}" x-mask="99/99/9999">
                    @error('validade')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!--Botões-->
                <div class="flex justify-end gap-4">
                <a href="{{ route('produtos.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded">Editar</button>
                </div>
                <!-- Modal -->
                <div x-show="showModal" x-transition class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white p-6 rounded-lg shadow-md max-w-sm w-full">
                        <h2 class="text-lg font-semibold mb-4 text-center text-cyan-700 text-center">Confirmar Edição</h2>
                        <p class="text-center">Deseja realmente salvar as alterações?</p>
                        <div class="mt-4 flex justify-center gap-4">
                            <button type="button" @click="showModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded">Cancelar</button>
                            <button type="button" @click="$el.closest('form').submit()" class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded">Confirmar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
