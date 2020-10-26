<?php

namespace App\Http\Controllers;

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

    public function update(Request $request, Employee $employee) {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'position' => 'required',
            'phone' => 'required',
        ]);
        $employee -> update($request->all());
        return redirect()->route('employee.index');
    }
}
