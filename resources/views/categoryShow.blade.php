<x-layout>
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2">Esplora la categoria {{$category->name}}</h1>
            </div>
        </div>
    </div> 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 d-flex my-5">   
                @forelse ($category->announcements as $announcement)
                        <div class="card-shadow" style="width: 18rem;">
                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : Storage::url("img/default.png")}}"/> 
                            <div class="card-body">
                                <h5 class="card-title">{{$announcement->title}}</h5>
                                <p class="card-text">{{$announcement->body}}</p>
                                <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn-success shadow">Visualizza</a>
                                <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}} -Autore: {{$announcement->user->name ?? ''}}</p>
                            </div>
                        </div>                   
                @empty
                <div class="col-12">
                    <p class="h1">Non sono presenti annunci per questa categoria</p>
                    <p class="h2">Publicane uno: <a href="{{route('announcements.create')}}" class="btn btn-success shadow">Nuovo Annuncio</a></p>
                </div>
                @endforelse
               
            </div>
        </div>
    </div>
</x-layout> 