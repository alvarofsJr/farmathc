<x-app-layout>
    <div class="container mx-auto mt-6 px-4" x-data="{ show: false }">
        @if(session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="flex items-center justify-center min-h-[60vh]">
            <div class="w-full max-w-lg bg-white p-6 rounded shadow-lg">
                <h2 class="text-xl font-semibold mb-4 text-center">Cadastrar Remédio</h2>

                <form id="formCadastroRemedio" x-ref="formCadastroRemedio" action="{{ route('remedios.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Nome -->
                    <div>
                        <input type="text" name="nome" value="{{ old('nome') }}"
                            class="w-full px-4 py-2 border rounded @error('nome') border-red-500 @enderror"
                            placeholder="Nome do remédio">
                        @error('nome')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Categoria -->
                    <div>
                        <select name="id_categoria"
                            class="w-full px-4 py-2 border rounded @error('id_categoria') border-red-500 @enderror">
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

                    <!-- Quantidade -->
                    <div>
                        <input type="number" name="quantidade" value="{{ old('quantidade') }}"
                            class="w-full px-4 py-2 border rounded @error('quantidade') border-red-500 @enderror"
                            placeholder="Quantidade">
                        @error('quantidade')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Valor -->
                    <div>
                        <input type="number" step="0.01" name="valor" value="{{ old('valor') }}"
                            class="w-full px-4 py-2 border rounded @error('valor') border-red-500 @enderror"
                            placeholder="Valor">
                        @error('valor')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Validade -->
                    <div>
                        <input type="text" name="validade" value="{{ old('validade') }}"
                            class="w-full px-4 py-2 border rounded @error('validade') border-red-500 @enderror"
                            placeholder="Validade (dd/mm/aaaa)">
                        @error('validade')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botões -->
                    <div class="flex justify-between gap-2">
                        <button type="button" @click="show = true"
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded">
                            Cadastrar
                        </button>
                        <a href="{{ route('remedios') }}"
                            class="w-full bg-gray-500 hover:bg-gray-600 text-white text-center py-2 px-4 rounded">
                            Voltar
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal de confirmação -->
        <div x-show="show" x-transition x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow max-w-md w-full">
                <h2 class="text-lg font-bold mb-4 text-center text-green-700">Confirmar Cadastro</h2>
                <p class="text-center mb-4">Deseja realmente cadastrar este remédio?</p>
                <div class="flex justify-center gap-4">
                    <button @click="show = false"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</button>
                    <button @click="$refs.formCadastroRemedio.submit()"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
