<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminPracticeStore;
use App\Http\Requests\AdminPractitionerStore;

class AdminPractitionersController extends Controller
{
    public function showPractitioners()
    {
        view()->share('activePage', 'practitioners');
        $practitioners = User::where('type', 1)->paginate(10);
        return view('admin.practitioners', ['practitioners' => $practitioners]);
    }

    public function addPractitioner() {
        view()->share('activePage', 'practitioners');
        $practices = Practice::all();
        return view('admin.add-practitioner', ['practices' => $practices]);
    }
  
    public function storePractitioner(AdminPractitionerStore $request)
    {
        $firstName = strtolower($request->input('first_name'));
        $lastName = strtolower($request->input('last_name'));
        $randomNumber = rand(1, 1000);
        $generatedEmail = "{$firstName}.{$lastName}{$randomNumber}@example.com";

        $practitioner = new User();
        $practitioner->first_name = $request->input('first_name');
        $practitioner->last_name = $request->input('last_name');
        $practitioner->email = $generatedEmail;
        $practitioner->practice_id = $request->input('practices');
        $practitioner->password = Hash::make('password');
        $practitioner->type = 1;
        $practitioner->save();
        return redirect()->back()->with('message',"Practitioner added successfully");
    }

    
    public function showSinglePractitioner($id)
	  {
      view()->share('activePage', 'practitioners');
      $practitioner = User::findOrFail($id);
      return view('admin.single-practitioner', compact('practitioner'));
    }

    public function editPractitioner($id)
    {
        view()->share('activePage', 'practitioners');
        $practitioner = User::find($id);
        $practices = Practice::all();
        return view('admin.edit-practitioner', ['practitioner'=>$practitioner], ['practices'=>$practices]);
    
    }

    public function storeEditPractitioner($id, AdminPractitionerStore $request)
    {
        $practitioner = User::findOrFail($id);
        $practitioner->first_name = $request->input('first_name');
        $practitioner->last_name = $request->input('last_name');
        $practitioner->email = $request->input('email');
        $practitioner->password = $request->input('password');
        $practitioner->practice_id = $request->input('practices');
        $practitioner->save();
        if ($request->password) {
            $practitioner->password = $request->password;
        }
        return redirect()->back()->with('message',"Practitioner edited successfully");
    }

    public function deletePractitioner($id)
    {
        $practitionerr = User::findOrFail($id);
        foreach ($practitionerr as $practitioner) {
            $clients = User::where('practitioner_id', $id)->get();
            if (count($clients)) {
                foreach($clients as $client) {
                    $client->delete();
                }
            }
        }
        $practitionerr->delete();
        return redirect()->back()->with('message',"Client deleted successfully");
    }
}
