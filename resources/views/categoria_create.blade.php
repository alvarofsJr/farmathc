<x-app-layout>
    <div class="container mx-auto mt-10 max-w-sm">
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Nova Categoria</h1>

            @if(session('message'))
                <div class="mb-4 p-4 rounded bg-green-100 text-green-800 border border-green-300">
                    {{ session('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('categorias.store') }}" id="form-criar">
                @csrf

                <div class="mb-4">
                    <label for="nome" class="block text-gray-700 font-medium mb-1">Nome da Categoria</label>
                    <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nome')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="tipo" class="block text-gray-700 font-medium mb-1">Tipo da Categoria</label>
                    <select name="tipo" id="tipo"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Selecione um tipo</option>
                        <option value="produto" {{ old('tipo') == 'produto' ? 'selected' : '' }}>Produto</option>
                        <option value="remedio" {{ old('tipo') == 'remedio' ? 'selected' : '' }}>Remédio Controlado</option>
                    </select>
                    @error('tipo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-4">
                <a href="{{ route('categorias.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                        Cancelar
                    </a>
                    <button type="button" onclick="openConfirmModalCriar()"
                        class="px-4 py-2 bg-cyan-600 text-white rounded hover:bg-cyan-700 transition">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal de confirmação --}}
    <div id="confirm-modal-criar" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow-md max-w-sm w-full">
            <h2 class="text-lg font-semibold mb-4 text-cyan-700 text-center">Confirmar criação</h2>
            <p class="mb-4 text-center">Deseja realmente salvar esta categoria?</p>
            <div class="flex justify-center gap-4">
                <button onclick="closeConfirmModalCriar()"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Cancelar</button>
                <button onclick="submitFormCriar()"
                    class="px-4 py-2 bg-cyan-600 text-white rounded hover:bg-cyan-700 transition">Confirmar</button>  
            </div>
        </div>
    </div>

    <script>
        function openConfirmModalCriar() {
            document.getElementById('confirm-modal-criar').classList.remove('hidden');
        }

        function closeConfirmModalCriar() {
            document.getElementById('confirm-modal-criar').classList.add('hidden');
        }

        function submitFormCriar() {
            document.getElementById('form-criar').submit();
        }
    </script>
</x-app-layout>
