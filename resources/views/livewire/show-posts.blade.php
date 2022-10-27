<div>
    Show Posts

    <p> {{ $message }} </p>

    <label for="message">Titulo do Livro</label>
    <input type="text" class="form-control" id="message" name="message" placeholder="Harry Potter" wire:model="message" required> 

    @foreach($posts as $post)
        <p> {{ $post->user->name }} - {{ $post->classification }}
    @endforeach
</div>
