<div>
    <h1>Crea il tuo annuncio</h1>

    <form wire:submit.prevent="store">
        @csrf

        <div class="mb-3">
            <label for="title">Titolo annuncio</label>
            <input wire:model='title' type="text" class="form-control">
            @error('title')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="body">Descrizione</label>
            <textarea wire:model="body" type="text" class="form-control"></textarea>
            @error('body')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="price">Prezzo</label>
            <input wire:model='price' type="number" class="form-control">
        </div>
        <button type="submit" class="btn btn-success shadow px-4 py-2">Crea</button>
        @error('price')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
    </form>
</div>
