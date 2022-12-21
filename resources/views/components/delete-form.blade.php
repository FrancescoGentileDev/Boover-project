<form method="POST" action="{{ $destroyRoute }}">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="py-2 px-4 bg-info text-white font-semibold rounded-lg shadow-md hover:bg-info-content focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-opacity-75">
        {{ $deleteMessage }}
    </button>
</form>
