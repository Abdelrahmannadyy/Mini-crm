<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   /*  public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    } */
    // Controller method to fetch and paginate employees
public function index()
{
    $employees = Employee::with('company')->paginate(10); // Fetch 10 employees per page
    return view('employees.index', compact('employees'));
}


   /*  public function create()
    {
        return view('employees.create');
    }
 */
public function create()
{
    $companies = Company::all(); // Assuming you want to fetch all companies

    return view('employees.create', compact('companies'));
}

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'phonenumber' => 'required|string|max:20|unique:employees',
            'company_id' => 'required|exists:companies,id',
        ]);

        $employee = new Employee();
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->email = $request->input('email');
        $employee->phonenumber = $request->input('phonenumber');
        $employee->company_id = $request->input('company_id');
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }
    public function edit(Employee $employee)
    {
        $employee = Employee::findOrFail($employee);
        $companies = Company::all();

        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'phonenumber' => 'required|string|max:20|unique:employees,phonenumber,'.$employee->id,
            'company_id' => 'required|exists:companies,id',
        ]);

        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->email = $request->input('email');
        $employee->phonenumber = $request->input('phonenumber');
        $employee->company_id = $request->input('company_id');
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
