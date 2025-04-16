<x-app-layout>
    <div class="container mx-auto mt-10 max-w-sm" x-data="formRemedio">
        @if(session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h2 class="text-xl font-semibold mb-4 text-center">Editar Remédio</h2>

            <form id="formEdicaoRemedio" x-ref="formEdicaoRemedio" action="{{ route('remedios.update', $remedio->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Remédio</label>
                    <input type="text" name="nome" value="{{ old('nome', $remedio->nome) }}"
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
                        <option disabled {{ old('id_categoria', $remedio->id_categoria) ? '' : 'selected' }}>
                            Selecione a categoria
                        </option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('id_categoria', $remedio->id_categoria) == $categoria->id ? 'selected' : '' }}>
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
                    <input type="number" name="quantidade" value="{{ old('quantidade', $remedio->quantidade) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                        placeholder="Quantidade">
                    @error('quantidade')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="valor" class="block text-sm font-medium text-gray-700">Valor</label>
                    <input type="text" id="valor_formatado" x-model="valorFormatado" @input="formatarValor"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                        placeholder="Valor">
                    @error('valor')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="valor" x-ref="valor" value="{{ old('valor', $remedio->valor) }}">

               <div class="mb-4">
                <label for="validade" class="block text-gray-700 font-medium mb-1">Validade do Remédio</label>
                <input type="text" name="validade" placeholder="dd/mm/aaaa"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    value="{{ old('validade', \Carbon\Carbon::parse($remedio->validade)->format('d/m/Y')) }}"
                    x-mask="99/99/9999" pattern="\d{2}/\d{2}/\d{4}" inputmode="numeric">
                @error('validade')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


                <div class="flex justify-end gap-4">
                    <a href="{{ route('remedios') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white text-center py-2 px-4 rounded">
                        Voltar
                    </a>
                    <button type="button" @click="showModal = true"
                        class="bg-cyan-600 hover:bg-cyan-700 text-white py-2 px-4 rounded">
                        Atualizar
                    </button>
                </div>
            </form>
        </div>

        <div x-show="showModal" x-transition x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow max-w-md w-full">
                <h2 class="text-lg font-bold mb-4 text-center text-cyan-700">Confirmar Edição</h2>
                <p class="text-center mb-4">Deseja realmente atualizar este remédio?</p>
                <div class="flex justify-center gap-4">
                    <button @click="showModal = false"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</button>
                    <button @click="confirmarEnvio($refs.formEdicaoRemedio)"
                        class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded">Confirmar</button>


                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/alpinejs-masks@1.0.0" defer></script>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('formRemedio', () => ({
            showModal: false,
            valorFormatado: '{{ old("valor", number_format($remedio->valor, 2, ',', '.')) }}',

            formatarValor(e) {
                let numero = this.valorFormatado.replace(/[^\d]/g, '');

                if (numero.length === 0) {
                    this.valorFormatado = '';
                    return;
                }

                let valorNumerico = (parseInt(numero) / 100).toFixed(2);
                this.valorFormatado = new Intl.NumberFormat('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }).format(valorNumerico);
            },

            confirmarEnvio(form) {
                const valorInput = this.$refs.valor;
                const apenasNumero = this.valorFormatado.replace(/[^\d]/g, '');
                const valorFinal = (parseInt(apenasNumero) / 100).toFixed(2);
                valorInput.value = valorFinal;
                form.submit();
            }
        }));
    });
</script>

</x-app-layout>
