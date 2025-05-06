@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ isset($product) ? ('Editar Produto - ID: '.strval($product->id)) : 'Criar Produto' }}</h3>
            <a href="{{ route('products.index') }}" class="btn btn-primary float-right">Voltar</a>
        </div>
        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product)) @method('PUT') @endif

            <div class="card-body">
                <div class="form-group">
                    <label for="nome">Nome*</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $product->nome ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao', $product->descricao ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="category_id">Categoria*</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="">Selecione...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="valor">Valor*</label>
                            <input type="number" step="0.01" class="form-control" id="valor" name="valor" value="{{ old('valor', $product->valor ?? '') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="quantidade">Quantidade*</label>
                            <input type="number" step="0.1" class="form-control" id="quantidade" name="quantidade" value="{{ old('quantidade', $product->quantidade ?? '') }}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <div class="custom-file">
                        <label for="foto" class="custom-file-label">Foto</label>
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        @if(isset($product) && $product->foto)
                            <img src="{{ asset('storage/' . $product->foto) }}" width="100" class="mt-2">
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
@endsection
