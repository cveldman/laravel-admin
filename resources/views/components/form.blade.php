<form action="{{ $action }}" method="{{ $method == 'get' ? 'get' : 'post' }}">
    @method($method)
    @csrf

    {{ $slot }}
</form>
