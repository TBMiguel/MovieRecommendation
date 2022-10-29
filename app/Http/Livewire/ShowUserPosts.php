<?php

namespace App\Http\Livewire;

use App\Models\Post; //importando model
use Livewire\Component;

class ShowUserPosts extends Component
{
    public $name, $year, $classification, $image;

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

        if($post->allrecommendations()->count() == 0){

            $post = Post::find($postId);
            $post->delete();

            return redirect()->route('posts')->with('msg', 'Post apagado com sucesso!');
        } else if(!$post->allrecommendations()->count() == 0) {
            return redirect()->route('userposts')->with('msg', 'Não é possivel deletar pois esse post tem interações!');
        }
    }

    public function editar($id){

        $post = Post::findOrFail($id);

        return redirect()->route('edit', ['id' => $post]);
    }
}
