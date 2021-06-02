<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Http\Requests\IncludeUpdateEmployee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){

        $employees = Employee::get();
        return view('admin.employees.index', compact('employees'));

    }

    public function create(){
        return view('admin.employees.create');
    }

    public function insert(IncludeUpdateEmployee $request){

        $employee = Employee::create($request->all());
        return redirect()->route('employees.index');

    }

    public function show($name){
        
        if(!$employee = Employee::where('name', $name)->first()){
            return redirect()->route('employees.index');
        }
        
        return view('admin.employees.show', compact('employee'));

    }

    public function destroy($name){

        if(!$employee = Employee::where('name', $name)->first()){
            return redirect()->route('employees.index');
        }
        $employee->delete();

        return redirect()
        ->route('employees.index')
        ->with('message', 'Funcionário removido com sucesso!');
    }
}
