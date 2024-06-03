<?php

namespace App\Http\Controllers\Practitioner;

use App\Models\Practice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
      view()->share('activePage', 'dash');
      return view('practitioner.dashboard');
      }
}
