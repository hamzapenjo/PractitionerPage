<?php

namespace App\Http\Controllers\Practitioner;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PractitionerClientController extends Controller
{
    public function showClients() 
    {
        $clients = auth()->user()->clients;
        return view('practitioner.practitionerclient', ['clients' => $clients]);
    }

    public function showSingleClient($id)
	{
        try {
            $client = User::findOrFail($id);
            return view('practitioner.singleclient', compact('client'));
        } catch (\Exception $e) {
            return abort(404);
        }
    }
        
}
