<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use App\Notifications\EmployeeHired;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class EmpController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee.employee_list')->with("employees", $employees);
    }

    public function edit(Employee $employee)
    {
        return view("employee.edit")->with("employee", $employee);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employee.index');
    }

    public function hire(Employee $employee)
    {
        $employee->update(['is_hired' => true]);
        $admins = User::where('is_admin', 1)->get();
        $details = [
            'greetings' => 'Hello.',
            'body' => "A new employee, Mr./Ms./Mrs. " . $employee->surname . "  has been hired.",
            'thanks' => 'Thank you.',
        ];

        foreach ($admins as $admin) {
            try {
                $admin->notify(new EmployeeHired($details));
                Mail::raw("A new employee, Mr./Ms./Mrs. " . $employee->surname . "  has been hired.", function ($message) use ($admin) {
                    $message->to($admin->email)
                        ->subject("A new employee has been hired");
                });
            } catch (Throwable $e) {
                error_log($e);

                return false;
            }

        }
    }
}
