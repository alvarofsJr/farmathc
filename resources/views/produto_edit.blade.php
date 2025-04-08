<x-app-layout>
    @if(session()->has('message'))
        <div class="alert alert-success my-1 mx-4 d-flex justify-content-center align-items-center">
            <ul class="mb-0">{{ session()->get('message') }}</ul>
        </div>
    @endif

    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="card bg-white shadow-lg rounded-lg w-100 h-80 p-4">
            <div class="card-body flex flex-col justify-between h-full">
                <form action="{{ route('produtos.update', ['produto' => $produto->id]) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PUT')

                    <!-- Nome -->
                    <div class="relative mb-4">
                        <input type="text" name="nome"
                               class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('nome') border-red-500 @enderror"
                               value="{{ old('nome', $produto->nome) }}" placeholder="Nome">
                        @error('nome')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Categoria -->
                    <div class="mb-4 relative">
                        <select name="categoria_id"
                                class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('categoria_id') border-red-500 @enderror">
                            <option disabled selected>Selecione a categoria</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id', $produto->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Quantidade -->
                    <div class="relative mb-4">
                        <input type="number" name="quantidade"
                               class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('quantidade') border-red-500 @enderror"
                               value="{{ old('quantidade', $produto->quantidade) }}" placeholder="Quantidade">
                        @error('quantidade')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Valor -->
                    <div class="relative mb-4">
                        <input type="number" name="valor" step="0.01"
                               class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('valor') border-red-500 @enderror"
                               value="{{ old('valor', $produto->valor) }}" placeholder="Preço">
                        @error('valor')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Validade -->
                    <div class="relative mb-4" x-data>
                        <input type="text" name="validade"
                               class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('validade') border-red-500 @enderror"
                               value="{{ old('validade', date('d/m/Y', strtotime($produto->validade))) }}"
                               placeholder="Validade" x-mask="99/99/9999">
                        @error('validade')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botões -->
                    <div class="space-y-2">
                        <button type="submit" class="w-full bg-info hover:bg-info text-white py-2 px-4 rounded-lg transition duration-300">Atualizar</button>
                        <a href="{{ route('produtos.index') }}"
                        class="w-full block bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-center transition duration-300">
                            Voltar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
