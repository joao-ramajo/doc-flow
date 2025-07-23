<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Client;
use App\Models\Document as ModelsDocument;
use Dom\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $business = Business::where('id', $user->business_id)->first();

        $clients = Client::with('documents')->where('business_id', $business->id)->get();

        $documents = ModelsDocument::where('user_id', $user->id)->get();

        return view('home', [
            'business' => $business,
            'clients' => $clients,
            'documents' => $documents
        ]);
    }

    public function documentForm()
    {
        echo "Formulario do docmento";
    }

    public function clientForm()
    {
        $business = Business::find(Auth::user()->business_id);

        return view('register.client', [
            'business' => $business
        ]);
    }


    public function clientDocuments(string $id)
    {
        $id = Crypt::decrypt($id);

        $client = Client::with('documents')->where('id', $id)->first();

        return view('clients.index', ['client' => $client]);
    }
}
