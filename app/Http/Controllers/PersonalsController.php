<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Department;
use DB;
class PersonalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index()
    {
       $data['personals'] = Personal::get();
       $datas['department'] = Department::get();
        
       return view('personals.index', $data,$datas);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $personal = new Personal;
       $personal->name = $request->input('name');
       $personal->email = $request->input('email');
       $personal->department = $request->input('department');
       $personal->save();
       return redirect()->back()->with('success', 'Data Saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $personal = Personal::find($id);
        return view('personals.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $personal = Personal::find($id);
        $personal->name = $request->input('name');
        $personal->email = $request->input('email');
        $personal->department = $request->input('department');
        $personal->update();
        return redirect()->back()->with('success', 'Data Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personal = Personal::find($id);
        $personal->delete();
        return redirect()->back()->with('success', 'Data Deleted');

    }
}
