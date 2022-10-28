@if($edit)
<form method="POST" enctype="multipart/form-data" wire:submit.prevent="atualizar($postId)">
    <div class="container-sm card" id="formcreate">
        <div class="form-group">
            <label for="name">Titulo do Livro</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Harry Potter" wire:model="name" required> 
            <label for="year">Ano</label>
            <input type="number" class="form-control" id="year" name="year" placeholder="2000" wire:model="year" required> 
            <label for="classification">Gênero</label>
            <input type="text" class="form-control" id="classification" name="classification" placeholder="Aventura" wire:model="classification" required>
            <label for="image" class="form-label">Insira uma url da imagem do filme/livro</label>
            <input class="form-control" type="text" id="image" name="image" wire:model="image" required> 
        </div>
        <div class="button">
            <input type="submit" class="btn btn-warning" value="Atualizar"> 
        </div>
    </div>
</form>
@endif

@foreach($posts as $post)
    <div class="container-sm card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $post->image }}" class="img-fluid rounded-start" alt="filme ou serie">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Nome: {{ $post->name }}</h5>
                    <p class="card-text">Usuário: {{ $post->user->name }}</p>
                    <p class="card-text">Gênero: {{ $post->classification }}</p>
                    <p class="card-text">Ano do filme/série: {{ $post->year }}</small></p>
                    <p class="card-text">Recomendações {{ $post->allrecommendations()->count() }}</small></p>

                    <div class="button">
                        <input class="btn btn-danger" wire:click.prevent="deletar({{ $post->id }})" value="Deletar"> 
                    </div>
                    <div class="button">
                        <input class="btn btn-warning" wire:click.prevent="edit()" value="Editar"> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach