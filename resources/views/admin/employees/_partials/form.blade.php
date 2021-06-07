@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif


@csrf
<input type="text" name="name" id="name" placeholder="Nome completo" value= "{{ $employee->name ?? old('name')}}">
<input type="text" name="role" id="role" placeholder="Cargo" value= "{{ $employee->role ?? old('role')}}">
<input type="number" name="age" id="age" placeholder="Idade" value= "{{ $employee->age ?? old('age')}}">
<button type="submit">Salvar alteração</button>
