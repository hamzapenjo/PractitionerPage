<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Practice;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SimpleExcel\SimpleExcelWriter;

class UserExportController extends Controller
{
    public function PracExportsClient()
    {
    
        $practitionerID = auth()->user()->id;
        $users = DB::table('users')->where('type', 2)->where('practitioner_id', $practitionerID)->get();
        $pracName = auth()->user()->first_name;
        $pracLast = auth()->user()->last_name;
        $path =$pracName . '_' . $pracLast . "_clients.xlsx";
        $writer = SimpleExcelWriter::streamDownload($path)
            ->addHeader([
                'ID',
                'Name',
                'Email',
                'Created At',
            ]);

        foreach ($users as $user) {
            $writer->addRow([
                'ID' => $user->id,
                'Name' => $user->first_name,
                'Email' => $user->email,
                'Created At' => Carbon::parse($user->created_at)->format('Y-m-d H:i:s'),
            ]); 
        }


        $writer->toBrowser();
        return redirect()->back();
    }

    public function AdminExportsClients()
    {
        
        $users = User::where('type', 2)->get();
        
        $path ="healthportal_clients.xlsx";
        $writer = SimpleExcelWriter::streamDownload($path)
            ->addHeader([
                'ID',
                'First Name',
                'Last Name',
                'Email',
                'Practitioner Name',
                'Created At'
            ]);

        foreach ($users as $user) {
            $writer->addRow([
                'ID' => $user->id,
                'First Name' => $user->first_name,
                'Last Name' => $user->last_name,
                'Email' => $user->email,
                'Practitioner name' => $user->practicioner->first_name,
                'Created At' => Carbon::parse($user->created_at)->format('Y-m-d H:i:s'),
            ]); 
        }


        $writer->toBrowser();
        return redirect()->back();
    }

    public function AdminExportsPractitioners()
    {
    
        $users = User::where('type', 1)->get();
        
        $path ="healthportal_practitioners.xlsx";
        $writer = SimpleExcelWriter::streamDownload($path)
            ->addHeader([
                'ID',
                'First Name',
                'Last Name',
                'Email',
                'Practice',
                'Created At'
            ]);

        foreach ($users as $user) {
            $writer->addRow([
                'ID' => $user->id,
                'First Name' => $user->first_name,
                'Last Name' => $user->last_name,
                'Email' => $user->email,
                'Practice' => $user->practice->name,
                'Created At' => Carbon::parse($user->created_at)->format('Y-m-d H:i:s'),
            ]); 
        }


        $writer->toBrowser();
        return redirect()->back();
    }

    public function AdminExportsPractices()
    {
        $practices = Practice::get();
        $path ="healthportal_practices.xlsx";
        $writer = SimpleExcelWriter::streamDownload($path)
            ->addHeader([
                'ID',
                'Name',
                'Email',
                'Count Practitioners',
                'Count Clients',
                'Created At'
            ]);
        
        foreach ($practices as $practice) {
            $writer->addRow([
                'ID' => $practice->id,
                'Name' => $practice->name,
                'Email' => $practice->email,
                'Count Practitioners' => $practitionersCount = $practice->users()->where('practice_id', $practice->id)->count(),
                'Count Clients' => $clientsCount = User::whereHas('practicioner', function(Builder $query) use($practice) {
                $query->where('practice_id', $practice->id); 
            })->count(),
                'Created At' => Carbon::parse($practice->created_at)->format('Y-m-d H:i:s'),
            ]); 
        }


        $writer->toBrowser();
        return redirect()->back();
    }


}
