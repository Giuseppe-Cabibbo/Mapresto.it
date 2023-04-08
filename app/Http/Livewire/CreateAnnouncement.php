<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;
    public $title;
    public $body;
    public $price;
    public $category;
    public $images=[];
    public $temporary_images;
    public $announcement;

    protected $rules = [
        'title'=>'required|min:4',
        'body'=>'required|min:8',
        'category'=>'required',
        'price'=>'required|numeric',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',
    ];

    protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'il campo :attribute è troppo corto',
        'numeric'=>'Il campo :attribute deve essere un numero',
        'images.image'=>'Il file deve essere un\'immagine',
        'images.max'=>'L\'immagine deve essere massimo 1Mb',
        'temporary_images.*.image'=>'Il file deve essere un\'immagine',
        'temporary_images.*.max'=>'L\'immagine deve essere massimo 1Mb',
    ];  

    public function updatedTemporaryImages($annuncio){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }
    public function removeImage($key){
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store(){
        $this->validate();
        $this->announcement = Category::find($this->category)-> announcements()->create($this->validate());
        if(count($this->images)){
            foreach($this->images as $image) {
                // $this->announcement->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                new ResizeImage($newImage->path, 400, 300),
                new GoogleVisionSafeSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
                
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        session()->flash('message', 'Annuncio inserito con successo');
            $this->cleanForm();
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function cleanForm(){
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
        $this->images = [];
        $this->temporary_images = [];
        
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
