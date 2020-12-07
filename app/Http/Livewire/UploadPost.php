<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\PostDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UploadPost extends Component
{

    use WithFileUploads;

    public $photos = [];

    private function isStateOpen(){
        $post = Post::where([
            ['user_id', Auth::id()],
            ['state', 'OPEN'],
        ])->get()->count();
        
        return ($post > 0) ? true : false;
    }

    public function index(){

        if($this->isStateOpen()){

            return view('livewire.new-post-caption');

        }else{
        
            return Redirect::to('new-post')->send();

        }

    }

    public function render()
    {
        return view('livewire.upload-post');
    }


}
