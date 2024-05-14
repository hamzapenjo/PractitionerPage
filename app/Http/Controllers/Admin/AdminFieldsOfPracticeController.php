<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Models\FieldsOfPractice;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminFieldsEdit;
use App\Http\Requests\AdminEditRequest;
use App\Http\Requests\AdminFieldsStore;
use App\Http\Requests\AdminFieldPracticeStore;

class AdminFieldsOfPracticeController extends Controller
{
    public function showFieldsOfPractice()
    {
        view()->share('activePage', 'fields');
        $fields = FieldsOfPractice::paginate(10);
        return view('admin.fields-of-practice', ['fields' => $fields]);
        
    }

    public function addFieldsOfPractice() {
        view()->share('activePage', 'fields');
        return view('admin.add-fields-of-practice');
    }

    public function storeFieldsOfPractice(AdminFieldsStore $request)
    {
        $field = new FieldsOfPractice();
        $field->name = $request->input('name');
        $field->save();
        return redirect()->back()->with('message',"Practice added successfully");
    }

    public function showSingleFieldOfPractice($id)
	  {
      view()->share('activePage', 'fields');
      $field = FieldsOfPractice::findOrFail($id);
      return view('admin.single-field-of-practice', compact('field'));
    }

    public function editField($id)
    {
      view()->share('activePage', 'fields');
      $field = FieldsOfPractice::find($id);
      return view('admin.edit-fields', ['field'=>$field]);
    }

    public function storeEdit($id, AdminFieldsEdit $request)
    {
        $field = FieldsOfPractice::findOrFail($id);
        $field->name = $request->input('name');
        $field->save();
        return redirect()->back()->with('message',"Field edited successfully");
    }

    public function deleteField($id)
    {
        $field = FieldsOfPractice::findOrFail($id);
        $field->delete();
        return redirect()->back()->with('message',"Practice deleted successfully");
    }

    public function addFieldToPractice($id) {
        view()->share('activePage', 'practices');
        $fields = FieldsOfPractice::all();
      return view('admin.addlist-fields-of-practice', ['fields' => $fields], ['id' => $id]);
    }

    public function storeFieldToPractice(AdminFieldPracticeStore $request, $id)
    {
        $field_id = $request->input('field');
        $existing = DB::table('fields_of_practice_practice')->where('practice_id', $id)->where('fields_of_practice_id', $field_id)->exists();
        if ($existing) {
            return redirect()->route('edit-practice', $id)->withErrors(['field' => 'The selected field already exists for this practice.']);
        }
        DB::table('fields_of_practice_practice')->insert(['practice_id' => $id, 'fields_of_practice_id' => $field_id]);
        return redirect()->route('edit-practice', $id)->with('message',"Practice assigned successfully");
    }
}
