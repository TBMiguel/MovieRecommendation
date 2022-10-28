<?php

namespace App\Http\Livewire;

use App\Models\Post; //importando model
use Livewire\Component;

class ShowUserPosts extends Component
{
    public $post_id, $name, $year, $classification, $image;

    public function render()
    {
        $posts = Post::get()->where('user_id', auth()->user()->id);
        return view('livewire.show-user-posts', [
            'posts' => $posts,
        ]);
    }

    public function deletar($postId)
    {

        $post = Post::find($postId);
        $post->delete();

        return redirect()->route('posts');
    }

    public function editar($postId){
        $post = Post::find($postId);

        $this->dispatchBrowserEvent('show-form');
    }

    public function save(){
        auth()->user()->posts()->merge([
            'name' => $this->name,
            'year' => $this->year,
            'classification' => $this->classification,
            'image' => $this->image,
        ]);
    }
}
