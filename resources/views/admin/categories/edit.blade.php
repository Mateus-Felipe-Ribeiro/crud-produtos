@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ isset($category) ? ('Editar Categoria - ID: '.strval($category->id)) : 'Criar Categoria' }}</h3>
            <a href="{{ route('categories.index') }}" class="btn btn-primary float-right">Voltar</a>
        </div>
        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($category)) @method('PUT') @endif

            <div class="card-body">
                <div class="form-group">
                    <label for="nome">Nome*</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $category->nome ?? '') }}" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
@endsection
