<!-- header.blade.php -->
<nav class="navbar header bg-dark navbar-dark w-100 px-0">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a class="navbar-brand" >
            <img src="https://i.pinimg.com/originals/74/0f/5a/740f5a66187b37efe4c3a28199c3a20e.png"
                 class="img-fluid" alt="IronThron" width="70">
        </a>

        <!-- Пользователь -->
        <div class="d-flex align-items-center gap-3">
            @auth
                <div class="text-light text-end">
                    <div>{{ Auth::user()->name }}</div>
                    <div style="font-size: 0.85rem;">{{ Auth::user()->email }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Выйти</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
