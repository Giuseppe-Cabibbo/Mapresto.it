<x-layout>
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">  
      {{session('message')}}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">MaPresto</h1>
                <p class="h2 my-2 fw-bold">{{__('messages.ultimiannunci')}}</p>
                <div class="row">
                    @foreach ($announcements as $announcement)
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="card-shadow" style="width: 18rem;">
                                <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->body}}</p>
                                    <p class="card-text">{{$announcement->price}}</p>
                                    <a href="{{route('announcements.show',compact('announcement'))}}" class="btn btn-success shadow">Visualizza</a>
                                    <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria: {{$announcement->category->name}}</a>
                                    <p class="card-footer">{{__('messages.Pubblicato il')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                                </div>
                            </div>
                        </div>                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout> 