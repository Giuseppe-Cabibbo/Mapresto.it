<x-layout>

    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">  
      {{session('message')}}
    </div>
    @endif
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <livewire:create-announcement />
            </div>
        </div>
    </div>
</x-layout>