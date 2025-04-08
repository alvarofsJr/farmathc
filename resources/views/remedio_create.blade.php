<x-app-layout>
    @if(session()->has('message'))
        <div class="alert alert-success my-1 mx-4 d-flex justify-content-center align-items-center">
            <ul class="mb-0">
                {{ session()->get('message') }}
            </ul>
        </div>
    @endif

    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="card bg-white shadow-lg rounded-lg w-100 h-80 p-4">
            <div class="card-body">
                <form action="{{ route('remedios.store') }}" method="POST" class="space-y-3">
                    @csrf

                    <!-- Nome -->
                    <input type="text" name="nome" value="{{ old('nome') }}"
                        class="w-full py-2 px-3 border rounded-lg @error('nome') border-red-500 @enderror"
                        placeholder="Nome">
                    @error('nome')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <!-- Categoria -->
                    <select name="id_categoria"
                        class="w-full py-2 px-3 border rounded-lg @error('categoria_especial') border-red-500 @enderror">
                        <option disabled selected>Selecione a categoria</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ old('categoria_especial', $remedio->categoria_especial ?? '') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
@error('categoria_especial')
    <p class="text-red-500 text-sm">{{ $message }}</p>
@enderror

                    @error('id_categoria')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <!-- Quantidade -->
                    <input type="number" name="quantidade" value="{{ old('quantidade') }}"
                        class="w-full py-2 px-3 border rounded-lg @error('quantidade') border-red-500 @enderror"
                        placeholder="Quantidade">
                    @error('quantidade')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <!-- Valor -->
                    <input type="number" step="0.01" name="valor" value="{{ old('valor') }}"
                        class="w-full py-2 px-3 border rounded-lg @error('valor') border-red-500 @enderror"
                        placeholder="Valor">
                    @error('valor')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <!-- Validade -->
                    <input type="text" name="validade" value="{{ old('validade') }}"
                        class="w-full py-2 px-3 border rounded-lg @error('validade') border-red-500 @enderror"
                        placeholder="Validade (dd/mm/aaaa)">
                    @error('validade')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="w-full bg-info text-white py-2 px-4 rounded-lg">Cadastrar</button>
                    <a href="/remedios" class="block text-center bg-gray-500 text-white py-2 px-4 rounded-lg">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
