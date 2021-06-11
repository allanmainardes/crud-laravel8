<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Http\Requests\IncludeUpdateEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::paginate();
        //$employees = Employee::orderBy('name')->paginate(3);
        //$employees = Employee::orderBy('name', 'asc')->paginate(3);
        //$employees = Employee::latest()->paginate(3);
        //$employees = Employee::get();
        return view('admin.employees.index', compact('employees'));

    }

    public function create(){
        return view('admin.employees.create');
    }

    public function insert(IncludeUpdateEmployee $request){

        $data = $request->all();

        if($request->image && $request->image->isValid()){
            
            $nameFile = Str::of($request->name)->slug('-') . "." . $request->image->getClientOriginalExtension();

            $image = $request->image->storeAs('employees', $nameFile);

            $data['image'] = $image;

        }

        Employee::create($data);
        return redirect()
        ->route('employees.index')
        ->with('message', 'Cadastro feito com sucesso!');

    }

    public function show($id){
        
        if(!$employee = Employee::find($id)){
            return redirect()->route('employees.index');
        }
        
        return view('admin.employees.show', compact('employee'));

    }

    public function destroy($id){

        if(!$employee = Employee::find($id)){
            return redirect()->route('employees.index');
        }
        
        if(Storage::exists($employee->image)){
            Storage::delete($employee->image);
        }
        $employee->delete();

        return redirect()
        ->route('employees.index')
        ->with('message', 'Funcionário removido com sucesso!');
    }

    public function edit($id){
        
        if(!$employee = Employee::find($id)){
            return redirect()->back();
        }
        
        return view('admin.employees.edit', compact('employee'));

    }

    public function update(IncludeUpdateEmployee $request, $id){

        if(!$employee = Employee::find($id)){
            return redirect()->back();
        }

        $data = $request->all();

        if($request->image && $request->image->isValid()){
            
            if(Storage::exists($employee->image)){
                Storage::delete($employee->image);
            }

            $nameFile = Str::of($request->name)->slug('-') . "." . $request->image->getClientOriginalExtension();

            $image = $request->image->storeAs('employees', $nameFile);

            $data['image'] = $image;

        }

        if(!$employee = Employee::find($id)){
            return redirect()->back();
        }       

        $employee->update($data);

        return redirect()
            ->route('employees.index')
            ->with('message', 'Cadastro alterado com sucesso!');

    }

    public function search(Request $request){

        $parameters = $request->except('_token');
        $employees = Employee::where('name', 'LIKE', "%{$request->search}%")
        ->orWhere('role', 'LIKE', "%{$request->search}%")
        ->paginate();
        return view('admin.employees.index', compact('employees', 'parameters'));
    }
}
