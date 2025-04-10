<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-xl font-bold mb-4">Novo Produto</h1>

        <form x-data="{ showModal: false }" @submit.prevent="showModal = true" method="POST" action="{{ route('produtos.store') }}" class="bg-white p-6 rounded shadow-md ">
            @csrf

            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('nome')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                <select name="categoria_id" id="categoria_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="">Selecione uma categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="quantidade" class="block text-sm font-medium text-gray-700">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('quantidade')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="valor" class="block text-sm font-medium text-gray-700">Valor (R$)</label>
                <input type="text" name="valor" id="valor" value="{{ old('valor') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('valor')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="validade" class="block text-sm font-medium text-gray-700">Validade</label>
                <input type="text" name="validade" id="validade" value="{{ old('validade') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    placeholder="dd/mm/aaaa"
                    x-data x-mask="99/99/9999">
                @error('validade')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('produtos.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Salvar</button>
            </div>


            <div x-show="showModal" x-transition class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                    <h2 class="text-lg font-bold mb-4 text-cyan-700">Confirmar Cadastro</h2>
                    <p class="mb-4">Tem certeza que deseja salvar este produto?</p>
                    <div class="flex justify-end gap-4">
                        <button type="button" @click="showModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</button>
                        <button type="button" @click="$el.closest('form').submit()" class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded">Confirmar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
