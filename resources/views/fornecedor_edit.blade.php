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
        <div class="card bg-white shadow-lg rounded-lg w-100 h-80 p-4">
            <div class="card-body flex flex-col justify-between h-full">
                <form action="{{ route('fornecedors.update', ['fornecedor' => $fornecedor->id]) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PUT')

                    <!-- Nome da Empresa -->
                    <div class="relative  mb-4">
                        <input type="text" name="nome_fantasia" 
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('nome_fantasia') border-red-500 @enderror" 
                            value="{{ old('nome_fantasia', $fornecedor->nome_fantasia) }}" 
                            placeholder="Nome da Empresa">
                        @error('nome_fantasia')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="relative mb-4">
                        <input type="text" name="email" 
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('email') border-red-500 @enderror" 
                            value="{{ old('email', $fornecedor->email) }}" 
                            placeholder="E-mail">
                        @error('email')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- CNPJ -->
                    <div class="relative mb-4" x-data>
                        <input type="text" name="cnpj" 
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('cnpj') border-red-500 @enderror" 
                            value="{{ old('cnpj', $fornecedor->cnpj) }}" 
                            x-mask="99.999.999/9999-99" 
                            placeholder="CNPJ" 
                            id="cnpj">
                        @error('cnpj')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botões -->
                    <div class="space-y-2">
                        <button type="submit" class="w-full bg-info hover:bg-info text-white py-2 px-4 rounded-lg transition duration-300">Atualizar</button>
                        <a href="/fornecedors" class="w-full block bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-center transition duration-300 text-decoration-none">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
