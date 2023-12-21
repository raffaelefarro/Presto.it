<form class="d-inline" method="POST" action="{{route('set_language_local', $lang)}}">
    @csrf
    <button type="submit" class="btn">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="32" height="32" alt="bandiere-nazioni">
    </button>
</form>