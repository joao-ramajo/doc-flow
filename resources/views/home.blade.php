<x-main-layout>
    <main class="container">
        <div class="d-flex justify-content-between">
            <h2>{{ $business->name }}</h2>
            <ul>
                <li>Total de clients: {{ count($clients) }}</li>
                <li>Total de documentos: {{ count($documents) }}</li>
            </ul>
        </div>

        <div class="row">
            @foreach ($clients as $client)
                @can('view', App\Models\Client::class)
                    <div class="col col-md-4 py-2 card">
                        <h3>{{ $client->name }}</h3>
                        <ul>
                            <li>Email : {{ $client->email }}</li>
                            <li>Telefone : {{ $client->phone }}</li>
                            <li>Total de Documentos : {{ count($client->documents) }}</li>
                        </ul>

                        <a href="#" class="btn btn-outline-success">Ver documentos</a>
                    </div>
                @endcan
            @endforeach
        </div>
    </main>
</x-main-layout>
