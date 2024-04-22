<?php

namespace App\Http\Controllers\Practitioner;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;
use Symfony\Component\Console\Input\Input;

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

    public function addClient()
    {
        return view('practitioner.add-client');
    }

    public function storeClient(Request $request)
    {
        $user = new User();
        $user->first_name = $request->input('first-name');
        $user->last_name = $request->input('last-name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->type = 2;
        $user->practitioner_id = auth()->user()->id;
        $user->save();

        return redirect()->back();
    }

    public function editClient($id)
    {
        $user = User::find($id);
        
        return view('practitioner.edit-client', ['user'=>$user]);
    }

    public function storeEdit($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->input('first-name');
        $user->last_name = $request->input('last-name');
        $user->email = $request->input('email');

        if ($request->password) {
            $user->password = $request->password;
        }
        $user->save();
        return redirect()->back();
    }

    public function deleteClient($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    
        
}
