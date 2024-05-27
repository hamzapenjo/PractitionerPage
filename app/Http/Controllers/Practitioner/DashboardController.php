<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
      view()->share('activePage', 'dash');
        return view('practitioner.dashboard');
      }
}
