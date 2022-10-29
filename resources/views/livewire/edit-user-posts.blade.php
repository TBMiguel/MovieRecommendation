@extends('layouts.main')
@section('title', 'Editar Livros')

@section('content')
<div>
    <div class="container-sm card mb-4">
        <form action="/posts/update/{{ $post->id }}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Titulo do Livro</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Harry Potter" wire:model="name" required> 
                <label for="year">Ano</label>
                <input type="number" class="form-control" id="year" name="year" placeholder="2000" wire:model="year" required> 
                <label for="classification">Gênero</label>
                <input type="text" class="form-control" id="classification" name="classification" placeholder="Aventura" wire:model="classification" required>
                <label for="image" class="form-label">Insira uma url da imagem do filme/livro</label>
                <input class="form-control" type="text" id="image" name="image" wire:model="image" required> 
                <label for="select" class="form-label">Status</label>
                <select class="form-control form-control-sm" name="status" id="select" required>
                    <option>Aberto</option>
                    <option>Fechado</option>
                </select>
            </div>
            <div class="button">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
