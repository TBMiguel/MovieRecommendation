@if($posts->count() > 0)
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
                            <input class="btn btn-warning" wire:click="editar({{$post->id}})" value="Editar"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal -->
    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="formEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="formEditLabel">Editar Postagem</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        {{$post->id}}
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
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container-sm card mb-4" style="padding: 10px; text-align: center;">
        <p>Nenhum post encontrado</p>
    </div>
@endif