@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Produtos</h3>
            <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Novo Produto</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                        <th>Categoria</th>
                        <th>Foto</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                {{ $product->id }}
                            </td>
                            <td>{{ $product->nome }}</td>
                            <td>R$ {{ number_format($product->valor, 2, ',', '.') }}</td>
                            <td>{{ number_format($product->quantidade, 1, ',', '.') }}</td>
                            <td>{{ $product->category->nome }}</td>
                            <td>
                                @if($product->foto)
                                    <img src="{{ asset('storage/' . $product->foto) }}" width="50">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $products->links() }} <!-- Paginação -->
            </div>
        </div>
    </div>
@endsection
