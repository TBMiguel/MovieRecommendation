<?php

namespace App\Http\Livewire;

use App\Models\Post; //importando model
use App\Models\Recommendation; //importando model
use Livewire\Component;

class ShowPosts extends Component
{ 

    public $name, $year, $classification, $image;

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
        ]);
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
}
