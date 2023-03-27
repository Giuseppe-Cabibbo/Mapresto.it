@switch(Config::get('app.locale'))
    @case('it')
        {{$category->name}}
        @break

    @case('en')
        {{$category->lang_en}}
        @break

        @case('de'
         {{$category->lang_de}})
         @break
        
@endswitch