<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentsController extends Controller
{
    public function index()
    {
        return response(Department::all());
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        return response(Department::find($id));
    }

    public function update(Request $request, $id)
    {
        return response(Department::find($id));
    }

    public function destroy($id)
    {
        return response(Department::find($id));
    }
}
