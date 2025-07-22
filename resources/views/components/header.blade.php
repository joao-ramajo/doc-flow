<div class="container mt-3">
    <div class="d-flex justify-content-between">
        <p>Bem vindo</p>
        @auth
            <div class="d-flex gap-3 justify-content-center align-items-center bg-sucess">
                @can('create', App\Models\Client::class)
                    <a href="#" class="btn btn-outline-primary">Cadastrar Cliente</a>
                @endcan
                @can('create', App\Models\Document::class)
                    <a href="#" class="btn btn-outline-primary">Subir documento</a>
                @endcan
                <a href="{{ route('logout') }}" class="btn btn-outline-danger">Logout</a>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-success">Login</a>
        @endauth
    </div>
    <hr>
</div>
