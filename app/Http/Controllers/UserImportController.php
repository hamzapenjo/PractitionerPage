<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Validation\ValidationException;

class UserImportController extends Controller
{
    public function PracImportClients(ImportRequest $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'clients_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public', $fileName);
            $absoluteFilePath = storage_path('app/' . $filePath);
            DB::beginTransaction();
            SimpleExcelReader::create($absoluteFilePath)->getRows()->each(function (array $rowProperties) {
                $email = User::where('email', $rowProperties['Email'])->first();
                if ($email) {
                    DB::rollBack();
                    throw ValidationException::withMessages(['email' => 'Clients not imported: One of the clients already exists!!!!']);
                }

                DB::table('users')->insert([
                    'first_name' => $rowProperties['First Name'],
                    'last_name' => $rowProperties['Last Name'],
                    'email' => $rowProperties['Email'],
                    'type' => 2, 
                    'password' => Hash::make('password'),
                    'practitioner_id' => auth()->user()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            });
            DB::commit();
        }
        return redirect()->back()->with('message', 'Clients imported successfully.');
    }
}
