<?php

namespace App\Http\Controllers;

use App\Models\Document as ModelsDocument;
use Dom\Document;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        //
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
