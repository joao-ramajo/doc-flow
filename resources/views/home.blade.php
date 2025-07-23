<x-main-layout>
    <main class="container py-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
            <h2 class="mb-2">{{ $business->name }}</h2>
            <ul class="list-unstyled mb-0">
                <li><i class="bi bi-people-fill me-2"></i>Total de clientes: {{ count($clients) }}</li>
                <li><i class="bi bi-file-earmark-text-fill me-2"></i>Total de documentos: {{ count($documents) }}</li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            </div>
        @endif

        <div class="row g-4">
            @foreach ($clients as $client)
                @can('view', App\Models\Client::class)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title mb-0 text-truncate w-75">{{ $client->name }}</h5>
                                    <form action="#" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Excluir">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <ul class="list-unstyled small mb-3">
                                    <li><i class="bi bi-envelope-fill me-2"></i>{{ $client->email }}</li>
                                    <li><i class="bi bi-telephone-fill me-2"></i>{{ $client->phone }}</li>
                                    <li><i class="bi bi-file-text-fill me-2"></i>Total de Documentos: {{ count($client->documents) }}</li>
                                </ul>
                                <a href="#" class="btn btn-outline-success mt-auto">
                                    <i class="bi bi-folder2-open me-1"></i>Ver documentos
                                </a>
                            </div>
                        </div>
                    </div>
                @endcan
            @endforeach
        </div>
    </main>
</x-main-layout>
