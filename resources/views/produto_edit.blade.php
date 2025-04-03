<x-app-layout>
    <!-- Confirmação -->
    @if(session()->has('message'))
        <div class="alert alert-success my-1 mx-4 d-flex justify-content-center align-items-center">
            <ul class="mb-0">
                {{ session()->get('message') }}
            </ul>
        </div>
    @endif

    <!-- Container centralizado -->
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="card bg-white shadow-lg rounded-lg w-100 h-80 p-4">
            <div class="card-body flex flex-col justify-between h-full">
                <form action="{{ route('produtos.update', ['produto' => $produto->id]) }}" method="POST" class="space-y-3">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    
                    <!-- Nome do Produto -->
                    <div class="relative mb-4">
                        <input type="text" name="nome" 
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('nome') border-red-500 @enderror" 
                            value="{{ old('nome', $produto->nome) }}" 
                            placeholder="Nome">
                        @error('nome')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Categoria -->
                    <div class="mb-4 relative">
                        <select name="id_categoria" 
                            class="w-full py-2 px-3 border text-gray-500 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('id_categoria') border-red-500 @enderror">
                            <option value="" disabled selected>{{ old('$produto->categoria->nome', $produto->categoria->nome) }}</option>
                            <option value="1">Higiene Pessoal</option>
                            <option value="2">Remédios</option>
                            <option value="3">Suplementos Alimentares</option>
                            <option value="4">Cosméticos</option>
                            <option value="5">Equipamentos Médicos</option>
                        </select>
                        @error('id_categoria')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Quantidade do Produto -->
                    <div class="relative mb-4">
                        <input type="number" name="quantidade" 
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('quantidade') border-red-500 @enderror" 
                            value="{{ old('quantidade', $produto->quantidade) }}" 
                            placeholder="Quantidade">
                        @error('quantidade')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Preço -->
                    <div class="relative mb-4">
                        <input type="number" name="valor" 
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('valor') border-red-500 @enderror" 
                            value="{{ old('valor', $produto->valor) }}" 
                            placeholder="Preço">
                        @error('valor')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Validade -->
                    <div class="relative mb-4" x-data>
                        <input type="text" name="validade" 
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('validade') border-red-500 @enderror" 
                            value="{{ old('validade', $produto->validade) }} "
                            x-mask="99/99/9999" placeholder="Validade" >
                        @error('validade')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botões -->
                    <div class="space-y-2">
                        <button type="submit" class="w-full bg-info hover:bg-info text-white py-2 px-4 rounded-lg transition duration-300">Atualizar</button>
                        <a href="/produtos" class="w-full block bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-center transition duration-300 text-decoration-none">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
