<?php

namespace App\Http\Livewire;

use App\Models\Post; //importando model
use Livewire\Component;

class ShowPosts extends Component
{ 
    public $user_id = null;
    public $name = '';
    public $year = null;
    public $classification = '';
    public $image = "https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2021/12/Harry-Potter-Cnn3.jpeg?w=680&h=453&crop=1";

    public function render()
    {
        $posts = Post::get(); //pode colocar with para listar só os do usuário

        return view('livewire.show-posts', [
            'posts' => $posts
        ]);
    }

    public function create(){
        Post::create([
            'user_id' => 1,
            'name' => $this->name,
            'year' => $this->year,
            'image' => $this->image,
            'classification' => $this->classification,
        ]);
    }
}
