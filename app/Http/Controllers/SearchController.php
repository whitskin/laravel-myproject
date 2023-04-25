<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Department;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $filter = $request->get('filter');

        $items = DB::table('personals')
            ->where('department', $filter)
            ->get();
    
            return view('personals.index', compact('items','request'));
    }
}
