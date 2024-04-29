<?php

namespace App\Http\Controllers\Admin;

use User;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminEditRequest;
use App\Http\Requests\AdminPracticeStore;

class AdminPracticesController extends Controller
{
    public function showPractice()
    {
        view()->share('activePage', 'practices');
        $practices = Practice::paginate(10);
        //  dd($practices);
        return view('admin.practice', ['practices' => $practices]);
        
      }

    public function addPractices() {
      view()->share('activePage', 'practices');

      return view('admin.add-practice');
    }

    public function storePractices(AdminPracticeStore $request)
    {
        $practice = new Practice();
        $practice->name = $request->input('name');
        $practice->email = $request->input('email');
        $practice->website_url = $request->input('website_url');
        $practice->logo = random_int(0, 10);
        $practice->save();
        return redirect()->back()->with('message',"Practice added successfully");
    }

    public function showSinglePractice($id)
	  {
      view()->share('activePage', 'practices');
      $practice = Practice::findOrFail($id);
      return view('admin.single-practice', compact('practice'));
    }

    public function editPractice($id)
    {
      view()->share('activePage', 'practices');
      $practice = Practice::find($id);
      return view('admin.edit-practice', ['practice'=>$practice]);
    }

    public function storeEdit($id, AdminEditRequest $request)
    {
        $practice = Practice::findOrFail($id);
        $practice->name = $request->input('name');
        $practice->email = $request->input('email');
        $practice->website_url = $request->input('website_url');

        if ($request->password) {
            $practice->password = $request->password;
        }
        $practice->save();
        return redirect()->back()->with('message',"Practice edited successfully");
    }

    public function deletePractice($id)
    {
        $practice = Practice::findOrFail($id);
        $practice->delete();
        return redirect()->back()->with('message',"Practice deleted successfully");
    }
}
