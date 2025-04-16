<x-app-layout>
    <div class="container mx-auto mt-10 max-w-sm">
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h1 class="text-xl font-bold mb-4 text-center">Novo Produto</h1>

            <form x-data="formProduto" @submit.prevent="showModal = true" method="POST" action="{{ route('produtos.store') }}" class="bg-white p-6">
                @csrf

                <div class="mb-4">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Ex: Sabonete Dove" value="{{ old('nome') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
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
                    <input type="number" name="quantidade" id="quantidade" placeholder="Ex: 30" value="{{ old('quantidade') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('quantidade')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="valor_formatado" class="block text-sm font-medium text-gray-700">Valor (R$)</label>
                    <input type="text" id="valor_formatado" placeholder="Ex: R$ 9,99" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <input type="hidden" name="valor" id="valor" value="{{ old('valor') }}">
                    @error('valor')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="validade" class="block text-sm font-medium text-gray-700">Validade</label>
                    <input type="text" name="validade" id="validade" value="{{ old('validade') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="dd/mm/aaaa">
                    @error('validade')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('produtos.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</a>
                    <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded">Salvar</button>
                </div>

                <div x-show="showModal" x-transition class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                        <h2 class="text-lg font-bold mb-4 text-cyan-700 text-center">Confirmar Cadastro</h2>
                        <p class="mb-4 text-center">Tem certeza que deseja salvar este produto?</p>
                        <div class="flex justify-center gap-4">
                            <button type="button" @click="showModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</button>
                            <button type="button" @click="confirmarEnvio($el.closest('form'))" class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded">Confirmar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.6/dist/inputmask.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputFormatado = document.getElementById('valor_formatado');
            const inputValorReal = document.getElementById('valor');

            Inputmask("currency", {
                prefix: "R$ ",
                groupSeparator: ".",
                radixPoint: ",",
                digits: 2,
                autoGroup: true,
                rightAlign: false
            }).mask(inputFormatado);

            if (inputValorReal.value) {
                const valor = parseFloat(inputValorReal.value).toFixed(2).replace('.', ',');
                inputFormatado.value = `R$ ${valor}`;
            }

            inputFormatado.addEventListener('input', () => {
                const valor = inputFormatado.value
                    .replace(/[^\d,]/g, '')
                    .replace(',', '.');
                inputValorReal.value = valor;
            });

            Inputmask("99/99/9999").mask("#validade");
        });

        document.addEventListener('alpine:init', () => {
            Alpine.data('formProduto', () => ({
                showModal: false,
                confirmarEnvio(form) {
                    form.submit();
                }
            }));
        });
    </script>
</x-app-layout>
