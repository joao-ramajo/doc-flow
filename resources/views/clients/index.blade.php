<x-main-layout>
    <main class="container py-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
            <p class="fs-5 mb-2">
                <i class="bi bi-person-circle me-2"></i>Nome: <strong>{{ $client->name }}</strong>
            </p>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left-circle me-1"></i>Voltar
            </a>
        </div>

        <div class="row g-4">
            @if ($client->documents->count())
                @foreach ($client->documents as $document)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title mb-1">
                                    <i class="bi bi-type me-1"></i>Título:
                                </h6>
                                <p class="mb-2 text-truncate">{{ $document->title }}</p>

                                <h6 class="card-title mb-1">
                                    <i class="bi bi-chat-left-text me-1"></i>Observações:
                                </h6>
                                <p class="mb-2">{{ $document->observations }}</p>

                                <h6 class="card-title mb-1">
                                    <i class="bi bi-filetype-{{ strtolower($document->doc_type) }} me-1"></i>Tipo:
                                </h6>
                                <p class="mb-2 text-capitalize">{{ $document->doc_type }}</p>

                                <h6 class="card-title mb-1">
                                    <i class="bi bi-link-45deg me-1"></i>Caminho:
                                </h6>
                                <p class="mb-2 text-break small">{{ $document->path }}</p>

                                <div class="mt-auto">
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-outline-primary" download>
                                            <i class="bi bi-download me-1"></i>Baixar documento
                                        </a>
                                        <a href="#" target="_blank" class="btn btn-outline-success">
                                            <i class="bi bi-eye me-1"></i>Ver conteúdo
                                        </a>
                                        <form action="#" method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja excluir este documento?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger w-100">
                                                <i class="bi bi-trash me-1"></i>Apagar documento
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-secondary text-center">
                        <i class="bi bi-folder-x me-2"></i>
                        Sem documentos anexados a este cliente.
                    </div>
                </div>
            @endif
        </div>
    </main>
</x-main-layout>
