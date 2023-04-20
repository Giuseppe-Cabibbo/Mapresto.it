<x-layout>
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">  
        {{session('message')}}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 justify-content-center d-flex flex-column align-items-center">
                <h1 class="text-center mb-5">MaPresto</h1>
                <img class="matrix" src="/storage/images/matrix.png" alt="">
            </div>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <p class="h2 fw-bold text-center">{{__('messages.ultimiannunci')}}</p>
                @foreach ($announcements as $announcement)
                <div class="col-12 col-md-8 col-lg-6 d-flex flex-column justify-content-center align-items-center my-5">
                        <div class="card-shadow" style="width: 18rem">
                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200'}}" class="card-img-top p-3 rounded" alt="">
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
</x-layout> 