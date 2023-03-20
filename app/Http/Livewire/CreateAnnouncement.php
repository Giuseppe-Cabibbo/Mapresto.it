<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;


class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;

    protected $rules = [
        'title'=>'required|min:4',
        'body'=>'required|min:8',
        'price'=>'required|numeric',
    ];

    protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'il campo :attribute è troppo corto',
        'numeric'=>'Il campo :attribute deve essere un numero',
    ];  

    public function store(){
        Announcement::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);
        $this->cleanForm();
        // $this->validate();
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function cleanForm(){
        $this->title = '';
        $this->body = '';
        $this->price = '';
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}