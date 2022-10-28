<?php

namespace App\Http\Livewire;

use App\Models\Post; //importando model
use Livewire\Component;
use Illuminate\Http\Request;

class ShowUserPosts extends Component
{

    public function render()
    {
        $posts = Post::get()->where('user_id', auth()->user()->id);
        return view('livewire.show-user-posts', [
            'posts' => $posts,
        ]);
    }

    public function deletar($postId){

        $post = Post::find($postId);
        $post->delete();

        return redirect()->route('posts');
    }
}
