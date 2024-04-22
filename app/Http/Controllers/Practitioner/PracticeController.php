<?php

namespace App\Http\Controllers\Practitioner;

use App\Models\User;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PracticeController extends Controller
{
    public function showPractice()
    {
        $user = auth()->user();
        $data['practice'] = $user->practice;
        $data['fields'] = $data['practice']->fieldsOfPractice;
        return view('practitioner.practice', $data);
    }
}
