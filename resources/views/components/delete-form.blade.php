<form method="POST" action="{{ $destroyRoute }}">
  @csrf
  @method('DELETE')
  <button type="submit">{{ $deleteMessage }}</button>
</form>
