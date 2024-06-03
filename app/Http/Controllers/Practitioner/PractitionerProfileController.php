<?php

namespace App\Http\Controllers\Practitioner;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\PractitionerProfileStore;
use App\Models\Practice;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PractitionerProfileController extends Controller
{
    public function editPractitionerProfile()
    {
        view()->share('activePage', 'practitioner');
        $user = auth()->user();
        $practice = Practice::findOrFail($user->practice_id);

        return view('practitioner.edit-practitioner-profile', ['user' => $user, 'practice' => $practice]);
    }

    public function storePractitionerProfile(PractitionerProfileStore $request)
    {
        $user = auth()->user();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }

            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $filePath;
        }

        $user->save();

        return redirect()->back()->with('message', 'Profile edited successfully');
    }
}
