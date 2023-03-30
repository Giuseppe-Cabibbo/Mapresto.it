<div>
    @if (session()->has('message'))
        <div class="flex flex-row justify-content-center my-2 alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <div class="container border-form my-3">
        <h1 class="text-center pt-4">{{__('messages.Crea il tuo annuncio')}}</h1>
        <hr class="linea-form">
    
        <form class="row row-form w-100" wire:submit.prevent="store">
            @csrf
            <div class="mb-3">
                <label for="title">{{__('messages.Titolo Annuncio')}}</label>
                <input wire:model='title' type="text" class="form-control">
                @error('title')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="body">{{__('messages.Descrizione annuncio')}}</label>
                <textarea wire:model="body" type="text" class="form-control"></textarea>
                @error('body')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="price">{{__('messages.Prezzo')}}</label>
                <input wire:model='price' type="number" class="form-control">
                @error('price')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="category"{{__('messages.Seleziona la categoria')}}></label>
                <select wire:model.defer="category" id="category" class="form-control">
                    <option value="">Scegli la categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{__('messages.Inserisci le immagini dell annuncio')}}</label>
                <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror">
                @error('temporary_images.*')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
            </div>
            
                @if (!empty($images))
                    <div class="row">
                        <div class="col">
                            <p>{{__('messages.Photo Preview')}}</p>
                            <div class="row border border-4 border-info">
                                @foreach($images as $key=>$image)
                                    <div class="col">
                                        <div class="image-preview mx-auto" style="background-image:url({{$image->temporaryUrl()}});">
                                            <button type="button" wire:click="removeImage({{$key}})" class="btn d-flex justify-content-end" ><i class="fa-solid fa-xmark text-danger fa-2x"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-success shadow px-4 py-2">{{__('messages.Pubblica annuncio')}}</button>
            </div>

        </form>
    </div>
</div>
