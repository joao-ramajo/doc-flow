<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentStoreRequest;
use App\Models\Client;
use App\Models\Document as ModelsDocument;
use Dom\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $document_id, $user_id)
    {
        $document_id = Crypt::decrypt($document_id);
        $user_id = Crypt::decrypt($user_id);
        $document = ModelsDocument::find($document_id);

        dd($document);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentStoreRequest $request)
    {
        $file = $request->file('path');
        $path = $file->path();
        $extension = $file->extension();

        $client_cpf = Client::where('id', Crypt::decrypt($request->input('client_id')))->value('cpf');

        $path = $file->store("documents/{$client_cpf}");

        $document = new ModelsDocument();
        $document->title = $request->input('title');
        $document->observations = $request->input('observations');
        $document->doc_type = $extension;
        $document->user_id = Auth::user()->id;
        $document->client_id = Crypt::decrypt($request->client_id);
        $document->business_id = Crypt::decrypt($request->business_id);
        $document->path = $path;

        $document->save();

        return redirect()
            ->route('client.documents', ['id' => $request->client_id])
            ->with('success', 'Documento salvo com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
