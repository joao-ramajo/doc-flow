<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <p class="mb-2 fs-5">
            <strong>{{ Auth::user()->business->name }}</strong> | {{ Auth::user()->name }}
        </p>

        @auth
            <div class="d-flex gap-2 align-items-center">
                @can('create', App\Models\Client::class)
                    <a href="{{ route('client.register') }}" class="btn btn-outline-primary">
                        <i class="bi bi-person-plus-fill me-1"></i>Cadastrar Cliente
                    </a>
                @endcan

                <a href="{{ route('logout') }}" class="btn btn-outline-danger">
                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                </a>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-success">
                <i class="bi bi-box-arrow-in-right me-1"></i>Login
            </a>
        @endauth
    </div>
    <hr class="mt-3">
</div>
