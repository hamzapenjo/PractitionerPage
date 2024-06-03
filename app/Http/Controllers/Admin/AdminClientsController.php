<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

use App\Mail\EditClientAdmin;
use App\Mail\WelcomeClientAdmin;
use function PHPSTORM_META\type;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AdminClientStore;
use App\Mail\NewClientNotificationAdmin;
use App\Mail\EditClientNotificationAdmin;

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
        $practitioners = User::where('practitioner_id', null)->get();
        return view('admin.add-client', ['practitioners'=>$practitioners]);
    }
  
    public function storeClient(AdminClientStore $request)
    {
        $firstName = strtolower($request->input('first_name'));
        $lastName = strtolower($request->input('last_name'));
        $randomNumber = rand(1, 1000);
        $generatedEmail = "{$firstName}.{$lastName}{$randomNumber}@example.com";

        $client = new User();
        $client->first_name = $request->input('first_name');
        $client->last_name = $request->input('last_name');
        $client->email = $generatedEmail;
        $client->practitioner_id = $request->input('practitioner_id');
        $client->password = Hash::make('password');
        $client->type = 2;
        $client->save();

        $practitioner = User::find($request->input('practitioner_id'));
        Mail::to($practitioner->email)->send(new NewClientNotificationAdmin($client, $practitioner));
        Mail::to($client->email)->send(new WelcomeClientAdmin($client, $practitioner));
    
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
      $practitioners = User::where('practitioner_id', null)->get();
      return view('admin.edit-client', ['client'=>$client], ['practitioners'=>$practitioners]);
    
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

        $practitioner = User::find($request->input('practitioner_id'));
        Mail::to($practitioner->email)->send(new EditClientNotificationAdmin($client, $practitioner));
        Mail::to($client->email)->send(new EditClientAdmin($client, $practitioner));

        return redirect()->back()->with('message', 'Client edited successfully');
    }

    public function deleteClient($id)
    {
        $client = User::findOrFail($id);
        $client->delete();
        return redirect()->back()->with('message',"Client deleted successfully");
    }
}

