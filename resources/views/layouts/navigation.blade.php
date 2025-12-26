<nav class="bg-white border-b border-gray-200 p-4 flex justify-end items-center">
    <div class="mr-4">
        <span class="font-semibold">{{ Auth::user()->name }}</span>  
        <span class="text-gray-600 ml-2">{{ Auth::user()->email }}</span>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Выйти
        </button>
    </form>
</nav>
