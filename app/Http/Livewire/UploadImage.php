<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\PostDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UploadImage extends Component
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
        
        if(!$this->isStateOpen()){

            return view('livewire.new-post');

        }else{
        
            return Redirect::to('new-post-caption')->send();

        }

    }

    public function render()
    {
        return view('livewire.upload-image');
    }

    public function save()
    {

        /**
         * Validate photos
         */

        $validatedData = $this->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);
        

        /**
         * Create new Post
         */

        $post = new Post();
        $post->user_id = Auth::id(); 
        $post->state = 'OPEN';
        $post->save();
        

        /**
         * Get photos and store to DB and Storage
         */
        foreach ($this->photos as $photo) {

            /**
             * Store on Storage
             */

            $image = $photo->store('photos', 'public');

            /**
             * Store on Database
             */

            $postDetail = new PostDetail();
            $postDetail->post()->associate($post);
            $postDetail->image = $image;
            $postDetail->save();

        }

        return redirect()->to('/new-post');
    }
}
