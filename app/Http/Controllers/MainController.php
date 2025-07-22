<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Client;
use App\Models\Document as ModelsDocument;
use Dom\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
