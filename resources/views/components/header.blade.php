<div class="container mt-3">
    <div class="d-flex justify-content-between">
        <p>Bem vindo</p>
        @auth
            <div class="d-flex gap-3 justify-content-center align-items-center bg-sucess">
                <p>Olá {{ Auth::user()->name }}</p> <a href="{{ route('logout') }}" class="btn btn-outline-danger">Logout</a>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-success">Login</a>
        @endauth
    </div>
</div>
