<form method="POST" action="{{ $destroyRoute }}">
  @csrf
  @method('DELETE')
  <button type="submit"
  class="py-2 px-4 bg-purple-500 text-white font-semibold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-opacity-75"
  >
    {{ $deleteMessage }}
  </button>
</form>
