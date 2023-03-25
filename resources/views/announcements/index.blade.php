<x-layout>
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2">Ecco i nostri annunci</h1>
            </div>
        </div>
    </div> 
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($announcements as $announcement)
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="card-shadow" style="width: 18rem;">
                                <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="">
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
                    </div>
                @endforeach
                {{$announcements->links()}}
            </div>
        </div>
    </div>
</x-layout> 