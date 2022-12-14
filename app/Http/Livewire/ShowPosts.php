<?php

namespace App\Http\Livewire;

use App\Models\Post; //importando model
use App\Models\Recommendation; //importando model
use Livewire\Component;

class ShowPosts extends Component
{ 

    public $name, $year, $classification, $image;
    public $status = "Aberto";

    public function render()
    {
        $posts = Post::get();

        return view('livewire.show-posts', [
            'posts' => $posts,
        ]);
    }

    public function criar()
    {

        auth()->user()->posts()->create([
            'name' => $this->name,
            'year' => $this->year,
            'classification' => $this->classification,
            'image' => $this->image,
            'status' => $this->status,
        ]);

        return redirect()->route('posts')->with('msg', 'Post criado com sucesso!');
    }

    public function recomendar($postId)
    {
        $post = Post::find($postId);

        $post->recommendations()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function desrecomendar(Post $post)
    {
        $post->recommendations()->delete([
            'user_id' => auth()->user()->id
        ]);
    }

    public function naorecomendar($postId)
    {
        $post = Post::find($postId);

        $post->norecommendations()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function retirarnaorecomendacao(Post $post)
    {
        $post->norecommendations()->delete([
            'user_id' => auth()->user()->id
        ]);
    }

    public function follow($postId)
    {
        $post = Post::find($postId);

        $post->follow()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unfollow(Post $post)
    {
        $post->unfollow()->delete([
            'user_id' => auth()->user()->id
        ]);
    }
}
