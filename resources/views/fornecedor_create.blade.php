<x-app-layout>
    @if(session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 mx-2">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="flex items-center justify-center min-h-screen px-4" x-data="{ showConfirm: false }">
        <div class="card bg-white shadow-lg rounded-lg w-100 h-80 p-4">
            <div class="card-body p-4 flex flex-col justify-between">
                <form id="form-create-fornecedor" action="{{ route('fornecedors.store') }}" method="POST">
                    @csrf

                    <div class="mb-4 relative">
                        <input type="text" name="nome_fantasia"
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('nome_fantasia') border-red-500 @enderror"
                            value="{{ old('nome_fantasia') }}"
                            placeholder="Nome da Empresa">
                        @error('nome_fantasia')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 relative">
                        <input type="text" name="email"
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}"
                            placeholder="E-mail">
                        @error('email')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 relative" x-data>
                        <input type="text" name="cnpj"
                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('cnpj') border-red-500 @enderror"
                            value="{{ old('cnpj') }}"
                            x-mask="99.999.999/9999-99"
                            placeholder="CNPJ"
                            id="cnpj">
                        @error('cnpj')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2 mt-4">
                        <button
                            type="button"
                            @click="showConfirm = true"
                            class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded-lg transition duration-300"
                        >
                            Adicionar
                        </button>
                        <a href="/fornecedors"
                            class="w-full bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-center block transition duration-300">
                            Voltar
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal de confirmação -->
        <div
            x-show="showConfirm"
            x-transition
            x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        >
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                <h2 class="text-lg font-bold mb-4 text-center text-cyan-700">Confirmar Cadastro</h2>
                <p class="text-center mb-4">Deseja realmente adicionar este fornecedor?</p>
                <div class="flex justify-center gap-4">
                    <button @click="showConfirm = false" type="button"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                        Cancelar
                    </button>
                    <button type="submit" form="form-create-fornecedor"
                        class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded">
                        Confirmar
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
