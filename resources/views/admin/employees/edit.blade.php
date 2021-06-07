<h1>Editar o cadastro do Funcionario {{ $employee->name }}</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('employees.update', $employee->name)}}" method="post">
    @csrf
    @method('PUT');
    <input type="text" name="name" id="name" placeholder="Nome completo" value= "{{ $employee->name}}">
    <input type="text" name="role" id="role" placeholder="Cargo" value= "{{ $employee->role}}">
    <input type="number" name="age" id="age" placeholder="Idade" value= "{{ $employee->age}}">
    <button type="submit">Salvar alteração</button>
</form>