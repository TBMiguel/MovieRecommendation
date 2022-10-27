<?php

namespace App\Http\Livewire;

use App\Models\Post; //importando model
use Livewire\Component;

class ShowPosts extends Component
{ 
    public $message = 'Apenas um teste';

    public function render()
    {
        $posts = Post::get(); //pode colocar with para listar só os do usuário

        return view('livewire.show-posts', [
            'posts' => $posts
        ]);
    }
}
