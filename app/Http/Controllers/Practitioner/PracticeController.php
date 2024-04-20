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
        $practice = $user->practice;
        $fields = $practice->fieldsOfPractice;
        return view('practitioner.practice', ['practice'=>$practice], ['fields'=>$fields]);
    }
}
