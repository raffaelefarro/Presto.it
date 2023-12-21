<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $category;
    public $name;
    public $description;
    public $price;
    public $images = [];
    public $temporary_images;

    
    protected $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'category' => 'required',
            'price' => 'required',
            'images.*' => 'image',
            'temporary_images.*' => 'image',
    ]; 

    protected $messages = [
        'name.required' => 'Il titolo è obbligatorio',
        'name.min' => 'Il titolo deve contenere almeno 3 caratteri',
        'description.required' => "La descrizione dell'annuncio è obbligatoria",
        'category.required' => "La categoria dell'annuncio è obbligatoria",
        'description.min' => "La descrizione deve contenere almeno 10 caratteri",
        'price.required' => "Il prezzo è obbligatorio",
        'images.image' => "Il file deve essere un'immagine",
]; 

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image',
        ])){
            foreach($this->temporary_images as $image){
                unset($this->images[$key]);
            }
        }
    }

    public function updated($property){
        $this->validateOnly($property);
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function store(){

        $this->validate();

        // $category = Category::find($this->category)->announcements()->create($this->validate());

        $category = Category::find($this->category);
        // $this->announcement->user()->associate(Auth::user());
        // $this->announcement->save();
        

        $announcement = $category->announcements()->create([
            'user_id' => Auth::user()->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        // if(count($announcement->images)){
        //     foreach($announcement->images as $image){
        //         $announcement->images()->create(['path'=>$image->store('images', 'public')]);
        //     }
        // }

        if(count($this->images)){
            foreach ($this->images as $image) {
                $path = $image->store('images', 'public');
                // $announcement->images()->create(['path' => $path]);
                $newFileName = "announcements/{$announcement->id}";
                $newImage = $announcement->images()->create(['path'=>$image->store($newFileName , 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 500, 400),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);

                
            }
            File::deleteDirectory(storage_path("/app/livewire-tmp"));
        }

        $this->reset();

        session()->flash('message', 'Annuncio caricato con successo, sarà pubblicato dopo la revisione');
    }
    
    public function render()
    {
        return view('livewire.create-announcement');
    }

}
