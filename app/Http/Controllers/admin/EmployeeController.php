<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.employee.index', compact('employees'));
    }



    public function create()
    {
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.employee.create', compact('companies'));
    }
    public function store(StoreEmployeeRequest $request)
    {

        Employee::create([
            'company_id' => $request->company_id,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        return redirect()->route('admin.index-employees')->with('status', 'created by successfully');
    }


    public function edit($id)
    {
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);
        $employee = Employee::find($id);
        if (isset($employee)) {
            return view('admin.employee.edit', compact('employee', 'companies'));
        }
        return redirect()->route('admin.index-employees')->with('status', 'Not Found');
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        // return $request;
        $employee = Employee::find($id);

        if (isset($employee)) {
            $employee->update([
                'company_id' => $request->company_id,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            return redirect()->route('admin.show-companies', [$employee->company_id])->with('status', 'Updated');
        }
        return redirect()->route('admin.show-companies', [$employee->company_id])->with('status', 'Not Found');
    }
    public function delete($id)
    {
        $employee = Employee::find($id);
        if (isset($employee)) {

            $employee->delete();
            return redirect()->route('admin.index-employees')->with('status', 'Deleted');
        }
        return redirect()->route('admin.index-employees')->with('status', 'Not Found');
    }
}
