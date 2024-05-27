<?php

namespace App\Http\Controllers\Practitioner;

use App\Models\User;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination\Paginator;

class PracticeController extends Controller
{
    public function showPractice()
    {
        view()->share('activePage', 'practice');
        $user = auth()->user();
        $data['practice'] = $user->practice;
        $data['fields'] = $data['practice']->fieldsOfPractice;
        return view('practitioner.practice', $data);
    }
}
