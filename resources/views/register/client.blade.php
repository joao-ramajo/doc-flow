<x-main-layout>
    <section class="container">
        <h2>Cadastro de Cliente para a empresa {{ $business->name }}</h2>

        <form action="{{ route('client.store') }}" method="POST" class="">
            @csrf

            <input type="hidden" name="business_id" id="business_id" value="{{ $business->id }}">

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" maxlength="50" value="{{ old('name') }}" maxlength="50">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" maxlength="50" value="{{ old('email') }}" maxlength="50">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf"
                    name="cpf" value="{{ old('cpf') }}" maxlength="14">
                @error('cpf')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rg" class="form-label">RG</label>
                <input type="text" class="form-control @error('rg') is-invalid @enderror" id="rg"
                    name="rg" value="{{ old('rg') }}" maxlength="12">
                @error('rg')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    name="phone" value="{{ old('phone') }}" maxlength="15">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar Cliente</button>
        </form>
    </section>

    <script src="{{ asset('assets/js/client_register.js')}}"></script>
</x-main-layout>
