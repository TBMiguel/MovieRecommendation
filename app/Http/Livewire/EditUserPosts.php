<?php

namespace App\Http\Livewire;

use App\Models\Post; //importando model
use Illuminate\Http\Request;
use Livewire\Component;

class EditUserPosts extends Component
{

    public function render($id)
    {
        $post = Post::findOrFail($id);
        return view('livewire.edit-user-posts', ['post' => $post]);
    }

    public function update(Request $request){
        $post = Post::findOrFail($request->id)->update($request->all());

        return redirect()->route('userposts');
    }
}
