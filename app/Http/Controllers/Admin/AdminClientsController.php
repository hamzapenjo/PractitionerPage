<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use function PHPSTORM_META\type;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminClientStore;

class AdminClientsController extends Controller
{
    public function showClients()
    {
        view()->share('activePage', 'clients');
        $clients = User::where('type', 2)->paginate(10);
        return view('admin.clients', ['clients' => $clients]);
    }

    public function addClient() {
        view()->share('activePage', 'clients');
  
        return view('admin.add-client');
    }
  
    public function storeClient(AdminClientStore $request)
    {
        $client = new User();
        $client->first_name = $request->input('first_name');
        $client->last_name = $request->input('last_name');
        $client->email = $request->input('email');
        $client->practitioner_id = $request->input('practitioner_id');
        $client->password = Hash::make('password');
        $client->type = 2;
        $client->save();
        return redirect()->back()->with('message',"Client added successfully");
    }

    public function showSingleClient($id)
	  {
      view()->share('activePage', 'clients');
      $client = User::findOrFail($id);
      return view('admin.single-client', compact('client'));
    }


    public function editClient($id)
    {
      view()->share('activePage', 'clients');
      $client = User::find($id);

      return view('admin.edit-client', ['client'=>$client]);
    
    }

    public function storeEditClient($id, AdminClientStore $request)
    {
        $client = User::findOrFail($id);
        $client->first_name = $request->input('first_name');
        $client->last_name = $request->input('last_name');
        $client->email = $request->input('email');
        $client->password = $request->input('password');
        $client->practitioner_id = $request->input('practitioner_id');
        $client->save();
        if ($request->password) {
            $client->password = $request->password;
        }
        return redirect()->back()->with('message',"Client edited successfully");
    }

    public function deleteClient($id)
    {
        $client = User::findOrFail($id);
        $client->delete();
        return redirect()->back()->with('message',"Client deleted successfully");
    }
}

