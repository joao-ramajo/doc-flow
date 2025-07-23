<x-main-layout>
    <main class="container py-4">
        <h2 class="mb-4">Enviar Documento</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="client_id" value="{{ Crypt::encrypt($client->id) }}">
            <input type="hidden" name="business_id" value="{{ Crypt::encrypt(Auth::user()->business->id) }}">

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" maxlength="50"
                    value="{{ old('title') }}" required>
            </div>

            {{-- Path (arquivo) --}}
            <div class="mb-3">
                <label for="path" class="form-label">Arquivo do documento</label>
                <input type="file" name="path" id="path" class="form-control"
                    accept=".pdf,.doc,.docx,.jpg,.png,.txt" required>
                <div class="form-text">Aceito: PDF, DOC, DOCX, JPG, PNG, TXT</div>
            </div>

            {{-- Observations --}}
            <div class="mb-3">
                <label for="observations" class="form-label">Observações (opcional)</label>
                <input type="text" name="observations" id="observations" class="form-control" maxlength="100"
                    value="{{ old('observations') }}">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-upload me-1"></i>Enviar Documento
            </button>
        </form>
    </main>
</x-main-layout>
