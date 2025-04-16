<x-app-layout>
    <div class="container mx-auto mt-10 max-w-sm" x-data="{ show: false }">
        @if(session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                <h2 class="text-xl font-semibold mb-4 text-center">Novo Remédio Controlado</h2>

                <form id="formCadastroRemedio" x-ref="formCadastroRemedio" action="{{ route('remedios.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Remédio</label>
                        <input type="text" name="nome" placeholder="Ex: Diazepam" value="{{ old('nome') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            placeholder="Nome do remédio">
                        @error('nome')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="id_categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                        <select name="id_categoria"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option disabled selected>Selecione a categoria</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('id_categoria') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_categoria')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="quantidade" class="block text-sm font-medium text-gray-700">Quantidade</label>
                        <input type="number" name="quantidade" value="{{ old('quantidade') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            placeholder="Quantidade">
                        @error('quantidade')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                  <!-- Valor -->
                    <div class="mb-4">
                        <label for="valor_formatado" class="block text-sm font-medium text-gray-700">Valor</label>
                        <input type="text" id="valor_formatado" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Valor">
                        <input type="hidden" name="valor" id="valor" value="{{ old('valor') }}">
                        @error('valor')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="mb-4">
                        <label for="validade" class="block text-sm font-medium text-gray-700">Validade</label>
                        <input type="text" name="validade"
                            value="{{ old('validade') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            placeholder="Validade (dd/mm/aaaa)"
                            x-mask="99/99/9999"
                            pattern="\d{2}/\d{2}/\d{4}"
                            inputmode="numeric"
                        >
                        @error('validade')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('remedios') }}"
                            class=" bg-gray-500 hover:bg-gray-600 text-white text-center py-2 px-4 rounded">
                            Voltar
                        </a>
                        <button type="button" @click="show = true"
                            class="bg-cyan-600 hover:bg-cyan-700 text-white py-2 px-4 rounded">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        <div x-show="show" x-transition x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow max-w-md w-full">
                <h2 class="text-lg font-bold mb-4 text-center text-cyan-700">Confirmar Cadastro</h2>
                <p class="text-center mb-4">Deseja realmente cadastrar este remédio?</p>
                <div class="flex justify-center gap-4">
                    <button @click="show = false"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</button>
                    <button @click="$refs.formCadastroRemedio.submit()"
                        class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded">Confirmar</button>
                </div>
            </div>
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
            Alpine.data('formRemedio', () => ({
                showModal: false,
                confirmarEnvio(form) {
                    form.submit();
                }
            }));
        });
    </script>





</x-app-layout>
