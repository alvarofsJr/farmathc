<x-app-layout>
    <div class="container mx-auto mt-3">
        <h1 class="text-xl font-bold mb-4">Lista de Fornecedores</h1>

        @if(session()->has('message'))
            <div class="alert alert-success my-3 mx-4 d-flex justify-content-center align-items-center">
                <ul class="mb-0">
                    {{ session()->get('message') }}
                </ul>
            </div>
        @endif

        <div class="flex justify-start mb-1">
            <form method="GET" action="{{ route('fornecedors.create') }}">
                <x-primary-button type="submit">Novo Fornecedor</x-primary-button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-center text-sm font-light text-gray-800 border border-gray-300 rounded-md shadow-lg">
                <thead class="border-b border-gray-300 bg-gray-800">
                    <tr>
                        <th class="py-3 px-2 font-medium text-white">Empresa</th>
                        <th class="py-3 px-2 font-medium text-white">CNPJ</th>
                        <th class="py-3 px-2 font-medium text-white">E-mail</th>
                        <th class="py-3 px-2 font-medium text-white"></th>
                        <th class="py-3 px-2 font-medium text-white"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fornecedors as $fornecedor)
                        <tr class="border-b border-gray-300 bg-gray-100">
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ $fornecedor->nome_fantasia }}</td>
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "$1.$2.$3/$4-$5", $fornecedor->cnpj) }}</td>
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ $fornecedor->email }}</td>
                            <td class="whitespace-nowrap px-4 py-2 border-r border-gray-300">
                                <a href="{{ route('fornecedors.edit', ['fornecedor' => $fornecedor->id]) }}">
                                    <button class="text-green-600 hover:underline">Editar</button>
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <form action="{{ route('fornecedors.destroy', $fornecedor->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este fornecedor?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
