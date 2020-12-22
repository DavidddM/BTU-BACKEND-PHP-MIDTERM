@extends("layout.home")
@section("content")
<script>
    window.onload = () => {
        document.querySelectorAll('.hire').forEach(item => {
            item.addEventListener('click', async ({target}) => {
                try {
                    const response = await fetch(`/employees/${target.dataset.id}/hire/`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                    });
                    console.log(response)
                    document.querySelector(`[data-id="${target.dataset.id}"]`).textContent = "Hired"
                    item.disabled = true
                }
                catch(err) {
                    console.error(err)
                }
            })
        })
    };
</script>
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
            <td data-id="{{$employee->id}}">{{array("Not Hired", "Hired")[$employee->is_hired]}}</td>
            <td><button data-id="{{$employee->id}}" class="btn btn-primary hire" @if($employee->is_hired) disabled @endif>Hire</button></td>
            <td><a class="underline text-gray-900 dark:text-white" style="margin-left:10px;" href="{{route('employee.edit', $employee)}}">[Edit]</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
