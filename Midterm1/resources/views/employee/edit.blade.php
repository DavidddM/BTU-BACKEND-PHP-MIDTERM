@extends("layout.home")
@section("content")
    <div style="width: 450px; margin:0 auto;">
        <form method="post" enctype="multipart/form-data" action="{{route('employee.update', $employee->id)}}">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" class="form-control"  placeholder="Name" name="name" value="{{old('name', $employee->name)}}" class="form-control @error('name') is-invalid @enderror"/>
                    @error('name')
                    <p class="text-danger">{{$errors->first('name')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Surname</label>
                    <input type="text" class="form-control"  placeholder="Surname" name="surname" value="{{old('surname', $employee->surname)}}" class="form-control @error('surname') is-invalid @enderror"/>
                    @error('surname')
                    <p class="text-danger">{{$errors->first('surname')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Position</label>
                    <input type="name" class="form-control"  placeholder="Position" name="position" value="{{old('position', $employee->position)}}" class="form-control @error('position') is-invalid @enderror"/>
                    @error('position')
                    <p class="text-danger">{{$errors->first('position')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="name" class="form-control"  placeholder="Phone" name="phone" value="{{old('phone', $employee->phone)}}" class="form-control @error('phone') is-invalid @enderror"/>
                    @error('phone')
                    <p class="text-danger">{{$errors->first('phone')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Is Hired</label>
                    <select name="is_hired" name="cars">
                        <option value=0 {{ $employee->is_hired == 0 ? 'selected' : '' }}>Not Hired</option>
                        <option value=1 {{ $employee->is_hired == 1 ? 'selected' : '' }}>Hired</option>
                    </select>
{{--                    <input type="name" class="form-control"  placeholder="Is Hired" name="is_hired" value="{{old('is_hired', $employee->is_hired)}}">--}}
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
