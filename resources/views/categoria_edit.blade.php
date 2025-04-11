<x-app-layout>
    <div class="container mx-auto mt-10 max-w-sm">
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Editar Categoria</h1>

            <form method="POST" action="{{ route('categorias.update', $categoria->id) }}" id="form-editar">
                @csrf
                @method('PUT')

                <!-- Nome da Categoria -->
                <div class="mb-4">
                    <label for="nome" class="block text-gray-700 font-medium mb-1">Nome da Categoria</label>
                    <input type="text" id="nome" name="nome" value="{{ old('nome', $categoria->nome) }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nome')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tipo da Categoria -->
                <div class="mb-6">
                    <label for="tipo" class="block text-gray-700 font-medium mb-1">Tipo da Categoria</label>
                    <select id="tipo" name="tipo"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="produto" {{ old('tipo', $categoria->tipo) == 'produto' ? 'selected' : '' }}>Produto</option>
                        <option value="remedio" {{ old('tipo', $categoria->tipo) == 'remedio' ? 'selected' : '' }}>Remédio</option>
                    </select>
                    @error('tipo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botões -->
                <div class="flex justify-end gap-4">
                <a href="{{ route('categorias.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                        Cancelar
                    </a>
                    <button type="button" onclick="openConfirmModalEdit()"
                        class="px-4 py-2 bg-cyan-600 text-white rounded hover:bg-cyan-700 transition">
                        Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal de Confirmação --}}
    <div id="confirm-modal-edit" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow-md max-w-sm w-full">
            <h2 class="text-lg font-semibold mb-4 text-cyan-700 text-center">Confirmar atualização</h2>
            <p class="mb-4 text-center">Deseja realmente atualizar esta categoria?</p>
            <div class="flex justify-center space-x-2">
                <button onclick="closeConfirmModalEdit()"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Cancelar</button>
                <button onclick="submitFormEdit()"
                    class="px-4 py-2 bg-cyan-600 text-white rounded hover:bg-cyan-700 transition">Confirmar</button>
                
            </div>
        </div>
    </div>

    <script>
        function openConfirmModalEdit() {
            document.getElementById('confirm-modal-edit').classList.remove('hidden');
        }

        function closeConfirmModalEdit() {
            document.getElementById('confirm-modal-edit').classList.add('hidden');
        }

        function submitFormEdit() {
            document.getElementById('form-editar').submit();
        }
    </script>
</x-app-layout>
