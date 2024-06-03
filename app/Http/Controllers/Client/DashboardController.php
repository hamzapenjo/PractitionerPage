<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
      view()->share('activePage', 'dashh');
      $user = auth()->user();
      $data['practitioner'] = $user->practicioner;
      $data['practice'] = $user->practicioner->practice;
      $data['fields1'] = $data['practice']->fieldsOfPractice;
      return view('client.dashboard', $data);
    }
}
