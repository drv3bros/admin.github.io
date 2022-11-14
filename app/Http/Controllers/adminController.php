<?php

namespace App\Http\Controllers;
use App\Models\admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    
    public function index()
    {
        $admin = admin::all();
        return view ('admins.index')->with('admins', $admins);
    }
    
    public function create()
    {
        return view('admins.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        admin::create($input);
        return redirect('admin')->with('flash_message', 'admin Addedd!');  
    }
    
    public function show($id)
    {
        $admin = admin::find($id);
        return view('admins.show')->with('admins', $admin);
    }
    
    public function edit($id)
    {
        $admin = admin::find($id);
        return view('admins.edit')->with('admins', $admin);
    }
  
    public function update(Request $request, $id)
    {
        $admin = admin::find($id);
        $input = $request->all();
        $admin->update($input);
        return redirect('admin')->with('flash_message', 'admin Updated!');  
    }
  
    public function destroy($id)
    {
        admin::destroy($id);
        return redirect('admin')->with('flash_message', 'admin deleted!');  
    }
    
}
