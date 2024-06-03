<?php

namespace App\Http\Controllers\Practitioner;

use App\Models\User;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PracticeLogoStore;
use Illuminate\Contracts\Pagination\Paginator;

class EditPracticeController extends Controller
{
    public function EditPractice()
    {
        view()->share('activePage', 'practice');
        $user = auth()->user();
        $practice = Practice::findOrFail($user->practice_id);
        return view('practitioner.edit-practice-practitioner', ['practice' => $practice]);
    
    }

    public function StorePractice(PracticeLogoStore $request)
    {
        $user = auth()->user();
        $practice = Practice::findOrFail($user->practice_id);
        $practice->name = $request->input('name');
        $practice->email = $request->input('email');
        $practice->website_url = $request->input('url');
        if ($request->password) {
            $practice->password = $request->password;
        }

        if ($request->hasFile('logo')) {
            if ($practice->logo) {
                Storage::delete('public/' . $practice->logo);
            }

            $filePath = $request->file('logo')->store('logo', 'public');
            $practice->logo = $filePath;
        }

        $practice->save();
        return redirect()->back()->with('message',"Practice edited successfully");
    }

}
