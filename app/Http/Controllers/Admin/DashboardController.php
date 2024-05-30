<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;

class DashboardController extends Controller
{
    public function index(Request $request) {
      view()->share('activePage', 'dashboard');
      
      $filter = $request->input('filter', 'all');

      switch ($filter) {
        case 'today':
          $dateFrom = Carbon::now()->endOfDay();
          break;
        case '30':
          $dateFrom = Carbon::now()->subDays(30);
          break;
        case '60':
          $dateFrom = Carbon::now()->subDays(60);
          break;
        case '90':
          $dateFrom = Carbon::now()->subDays(90);
          break;
        default:
          $dateFrom = null;
          break;
      }

      $data['countPractice'] = DB::table('practices')->when($dateFrom, function(Builder $query, $dateFrom){
        $query->where('created_at', '>=', $dateFrom);
      })->count();
      $data['countFieldsOfPractice'] = DB::table('fields_of_practices')->when($dateFrom, function(Builder $query, $dateFrom){
        $query->where('created_at', '>=', $dateFrom);
      })->count();
      $data['countClient'] = DB::table('users')->where('type', 2)->when($dateFrom, function(Builder $query, $dateFrom){
        $query->where('created_at', '>=', $dateFrom);
      })->count();
      $data['countPractitioner'] = DB::table('users')->where('type', 1)->when($dateFrom, function(Builder $query, $dateFrom){
        $query->where('created_at', '>=', $dateFrom);
      })->count();
      
     return view('admin.dashboard', $data, ['filter'=>$filter]);
    }
}
