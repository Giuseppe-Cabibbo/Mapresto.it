<form class="d-inline" action="{{route('setLocale', $lang)}}" method="post">
    @csrf
    <button type="submit" class="btn" style="background-color: transparent; border:none;">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="32" height="32">
    </button>
</form>