<?php

namespace App\Http\Controllers\Practitioner;
use App\Models\User;
use App\Models\Practice;
use App\Mail\WelcomeClient;
use Illuminate\Http\Request;
use App\Models\FieldsOfPractice;
use App\Http\Requests\EditRequest;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRequest;
use App\Mail\NewClientNotification;
use function Laravel\Prompts\error;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ClientProfileStore;
use Symfony\Component\Console\Input\Input;
use Illuminate\Validation\ValidationException;
use Illuminate\Pagination\LengthAwarePaginator;

class PractitionerClientController extends Controller
{
    public function showClients() 
    {
        view()->share('activePage', 'clients');
        $clients = auth()->user()->clients()->paginate(10);
        
        return view('practitioner.practitionerclient', ['clients' => $clients]);
    }

    public function showSingleClient($id)
	{
        view()->share('activePage', 'clients');
        try {
            $client = User::findOrFail($id);
            return view('practitioner.singleclient', compact('client'));
        } catch (\Exception $e) {
            return abort(404);
        }
    }

    public function addClientPractitioner()
    {
        view()->share('activePage', 'clients');
        return view('practitioner.add-client');
    }

    public function storeClient(StoreRequest $request)
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->type = 2; 
        $user->practitioner_id = auth()->user()->id;
        $user->save();

        $admins = User::where('type', 3)->get();
        $practitioner = auth()->user();

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new NewClientNotification($user, $practitioner));
        }

        Mail::to($user->email)->send(new WelcomeClient($user));
        return redirect()->back()->with('message', 'Client added successfully');
    }

    public function editClientPractitioner($id)
    {
        view()->share('activePage', 'clients');
        $user = User::find($id);
        
        return view('practitioner.edit-client', ['user'=>$user]);
    }

    public function storeEditClient($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        if ($request->password) {
            $user->password = $request->password;
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }

            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $filePath;
        }
        
        $user->save();
        return redirect()->back()->with('message', 'Client edited successfully');
    }

    public function deleteClientPractitioner($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('message',"Client deleted successfully");
    }

    public function addField()
    {
        view()->share('activePage', 'practice');
        return view('practitioner.add-field');
    }

    public function storeField(Request $request)
    {
        $ime = $request->input('name');
        $field = FieldsOfPractice::firstOrCreate(['name' => $ime]);
        $field_id = $field->id;
        $practice_id = auth()->user()->practice_id;

        $n = [
            'practice_id' => $practice_id,
            'fields_of_practice_id' => $field_id
        ];
        $existing = DB::table('fields_of_practice_practice')->where('practice_id', $practice_id)->where('fields_of_practice_id', $field_id)->first();
        if(!$existing) {
            DB::table('fields_of_practice_practice')->insert($n);
        }
        else {
            throw ValidationException::withMessages(['name' => 'Already exists']);
        }
        return redirect()->back()->with('message',"Field added successfully");
    }
}
