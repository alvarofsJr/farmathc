<x-app-layout>
    <!-- Confirmação -->
    @if(session()->has('message'))
        <div class="alert alert-success my-3 mx-4 d-flex justify-content-center align-items-center">
            <ul class="mb-0">
                {{ session()->get('message') }}
            </ul>
        </div>
    @endif

    <!-- Container centralizado -->
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="card bg-white shadow-lg rounded-lg w-80 h-auto p-4">
            <div class="card-body flex flex-col justify-between h-full">
                <form action="{{ route('remedios.update', ['remedio' => $remedio->id]) }}" method="POST" class="space-y-3">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <!-- Nome do Remédio -->
                    <div class="relative mb-4">
                        <input type="text" name="nome" 
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('nome') border-red-500 @enderror" 
                            value="{{ old('nome', $remedio->nome) }}" 
                            placeholder="Nome">
                        @error('nome')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Categoria do Remédio -->
                    <div class="relative mb-4">
                        <select name="categoria_especial" 
                            class="w-full py-2 px-3 border text-gray-500 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('categoria_especial') border-red-500 @enderror" 
                            value="{{ old('categoria_especial', $remedio->categoria_especial) }}">
                            <option value="" disabled selected>{{ old('categoria_especial', $remedio->categoria_especial) }}</option>
                            <option value="A1">Entorpecentes (A1 e A2)</option>
                            <option value="A3">Psicotrópicos (A3, B1 e B2)</option>
                            <option value="C1">Sujeitos a controle especial (C1)</option>
                            <option value="C2">Retinóicos (C2)</option>
                            <option value="C3">Imunossupressores (C3)</option>
                            <option value="C5">Anabolizantes de uso controlado (C5)</option>
                        </select>
                        @error('categoria_especial')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Quantidade do Remédio -->
                    <div class="relative mb-4">
                        <input type="text" name="quantidade" 
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('quantidade') border-red-500 @enderror" 
                            value="{{ old('quantidade', $remedio->quantidade) }}" 
                            placeholder="Quantidade">
                        @error('quantidade')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Preço do Remédio -->
                    <div class="relative mb-4">
                        <input type="number" name="valor" 
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('valor') border-red-500 @enderror" 
                            value="{{ old('valor', $remedio->valor) }}" 
                            placeholder="Preço">
                        @error('valor')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Validade do Remédio -->
                    <div class="relative mb-4" x-data>
                        <input type="text" name="validade" 
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('validade') border-red-500 @enderror" 
                            value="{{ old('validade', $remedio->validade) }} "
                            x-mask="99/99/9999" placeholder="Validade" >
                        @error('validade')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botões -->
                    <div class="space-y-2">
                        <button type="submit" class="w-full bg-info hover:bg-info text-white py-2 px-4 rounded-lg transition duration-300">Atualizar</button>
                        <a href="/remedios" class="w-full block bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-center transition duration-300 text-decoration-none">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
