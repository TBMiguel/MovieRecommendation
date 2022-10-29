@if($posts->count() > 0)
    @foreach($posts as $post)
        <div class="container-sm card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $post->image }}" class="img-fluid rounded-start" alt="filme ou serie">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5> Post #{{ $post->id }}</h5>
                        <h5 class="card-title">Nome: {{ $post->name }}</h5>
                        <p class="card-text">Usuário: {{ $post->user->name }}</p>
                        <p class="card-text">Gênero: {{ $post->classification }}</p>
                        <p class="card-text">Ano do filme/série: {{ $post->year }}</small></p>
                        <p class="card-text">Recomendações {{ $post->allrecommendations()->count() }}</small></p>
                        @if($post->status == "Aberto")
                            <button class="btn btn-warning">
                                <p class="card-text">{{ $post->status }}</small></p>
                            </button>
                        @else
                            <button class="btn btn-success">
                                <p class="card-text">{{ $post->status }}</small></p>
                            </button>
                        @endif

                        <div class="button">
                            <input class="btn btn-danger" wire:click.prevent="deletar({{$post->id}})" value="Deletar"> 
                        </div>
                        <div class="button">
                            <input class="btn btn-warning" wire:click="editar({{$post->id}})" value="Editar"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="container-sm card mb-4" style="padding: 10px; text-align: center;">
        <p>Nenhum post encontrado</p>
    </div>
@endif