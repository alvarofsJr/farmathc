<x-app-layout>
    <div class="container mx-auto mt-10 max-w-sm" x-data="{ showConfirm: false }">
        @if(session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 mx-2">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h2 class="text-xl font-semibold mb-4 text-center">Novo Fornecedor</h2>
                <form id="form-create-fornecedor" action="{{ route('fornecedors.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="mb-4">
                    <label for="nome_fantasia" class="block text-sm font-medium text-gray-700">Nome do Fornecedor</label>
                        <input type="text" name="nome_fantasia"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            value="{{ old('nome_fantasia') }}"
                            placeholder="Nome da Empresa">
                        @error('nome_fantasia')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email do Fornecedor</label>
                        <input type="text" name="email"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            value="{{ old('email') }}"
                            placeholder="E-mail">
                        @error('email')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4" x-data>
                        <label for="cnpj" class="block text-sm font-medium text-gray-700">CNPJ do Fornecedor</label>
                        <input type="text" name="cnpj"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            value="{{ old('cnpj') }}"
                            x-mask="99.999.999/9999-99"
                            placeholder="CNPJ"
                            id="cnpj">
                        @error('cnpj')
                            <p class="text-red-500 text-sm absolute mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end gap-4">
                        <a href="/fornecedors"
                            class="bg-gray-500 hover:bg-gray-600 text-white text-center py-2 px-4 rounded">
                            Voltar
                        </a>
                        <button
                            type="button"
                            @click="showConfirm = true"
                            class="bg-cyan-600 hover:bg-cyan-700 text-white py-2 px-4 rounded">
                            Cadastrar
                        </button>
                    </div>
                </form>
        </div>
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
