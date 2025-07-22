<x-main-layout>
    <x-header />
    <main class="container">
        <div class="d-flex justify-content-between">
            <h2>{{ $business->name }}</h2>
            <p>Total de clients: {{ count($clients) }}</p>
        </div>
    </main>
</x-main-layout>
