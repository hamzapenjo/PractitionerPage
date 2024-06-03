<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ClientProfileStore;

class ClientProfileController extends Controller
{
    public function editClientProfile()
    {
        view()->share('activePage', 'client');
        $user = auth()->user();
        $practice = $user->practicioner->practice;
        return view('client.edit-client-profile', ['user' => $user, 'practice' => $practice]);
    }

    public function storeClientProfile(ClientProfileStore $request)
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
