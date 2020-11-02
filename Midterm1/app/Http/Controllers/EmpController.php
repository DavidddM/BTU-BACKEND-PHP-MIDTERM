<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmpController extends Controller
{
    public function index() {
        $employees = Employee::all();
        return view('employee.employee_list')->with("employees", $employees);
    }

    public function edit(Employee $employee) {
        return view("employee.edit")->with("employee", $employee);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee) {

        $employee -> update($request->all());
        return redirect()->route('employee.index');
    }
}
