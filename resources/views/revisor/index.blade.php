<x-layout>
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2">{{$announcement_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare'}}</h1>
            </div>
        </div>
    </div>
    @if($announcement_to_check) 
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-12 col-md-6"> 
                    <div id="gallery" class="bg-white">
                        @if ($announcement_to_check->images)
                            @foreach ($announcement_to_check->images as $image)
                               <div class="card mb-3">
                                    <div class="row p-2">
                                        <div class="col-12 col-md-6">
                                            <img src="{{$image->getUrl(400,300)}}" class="img-fluid p-3 rounded" alt="">
                                        </div>
                                        <div class="col-md-3 border-end">
                                            <h5 class="tc-accent mt-3">Tags</h5>
                                            <div class="p-2">
                                                @if ($image->labels)
                                                    @foreach ($image->labels as $label)
                                                        <p class="d-inline">{{$label}}</p>
                                                    @endforeach
                                                @endif   
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card-body">
                                                <h5 class="tc-accent">Revisioni immagini</h5>
                                                <p>Adulti: <span class="{{$image->adult}}"></span></p>
                                                <p>Satira: <span class="{{$image->spoof}}"></span></p>
                                                <p>Medicina: <span class="{{$image->medical}}"></span></p>
                                                <p>Violenza: <span class="{{$image->violence}}"></span></p>
                                                <p>Contenuto ammiccante: <span class="{{$image->racy}}"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else 
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img src="https://picsum.photos/id/27/1200/400" class="img-fluid p-3 rounded" alt="...">
                                    
                                    </div>
                                    <div class="carousel-item">
                                    <img src="https://picsum.photos/id/28/1200/400" class="img-fluid p-3 rounded" alt="...">
                                    
                                    </div>
                                    <div class="carousel-item">
                                    <img src="https://picsum.photos/id/29/1200/400" class="img-fluid p-3 rounded" alt="...">
                                    
                                    </div>
                                </div> 
                            @endif
                            <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button> 
                            <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>                    
                        <h5 class="card-title">Titilo: {{$announcement_to_check->title}}</h5>
                        <p class="card-text">Descrizione: {{$announcement_to_check->body}}</p>
                        <p class="card-footer">Pubblicato il: {{$announcement_to_check->created_at->format('d/m/Y')}} Autore {{$announcement->user->name ?? ''}}</p>
                </div>
            </div>
        
            <div class="row">
                <div class="col-12 col-md-6 d-flex">
                    <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                            <button type="submit" class="btn btn-success shadow mx-1">Accetta</button>
                    </form>
                    <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                            <button type="submit" class="btn btn-danger shadow">Rifiuta</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</x-layout> 