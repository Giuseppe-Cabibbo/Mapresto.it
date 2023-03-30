<x-layout>
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2">Ecco i nostri annunci</h1>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">  
      {{session('message')}}
    </div>
    @endif 
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($announcements as $announcement)
                        <div class="col-12 col-md-4 col-lg-4 my-4">
                            <div class="card-shadow" style="width: 18rem;">
                                <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/200'}}" class="card-img-top p-3 rounded" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->body}}</p>
                                    <p class="card-text">{{$announcement->price}}</p>
                                    <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn-success shadow">Visualizza</a>
                                    <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria: {{$announcement->category->name}}</a>
                                    <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                                </div>
                            </div>
                        </div>                    
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning py-3 shadow">
                            <p class="lead">Non ci sono annunci per questa ricerca</p>
                        </div>
                    </div>
                    @endforelse
                    {{$announcements->links()}}
                </div>
            </div>
        </div>
    </div>
</x-layout> 