@extends("layout.home")
@section("content")
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Position</th>
        <th scope="col">Phone</th>
        <th scope="col">Is Hired</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
            <th>{{$employee->id}}</th>
            <td>{{$employee->name}}</td>
            <td>{{$employee->surname}}</td>
            <td>{{$employee->position}}</td>
            <td>{{$employee->phone}}</td>
            <td>{{array("Not Hired", "Hired")[$employee->is_hired]}}</td>
            <td><a class="underline text-gray-900 dark:text-white" style="margin-left:10px;" href="{{route('employee.edit', $employee)}}">[Edit]</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
