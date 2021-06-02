@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<h1>Adicionar Funcionario</h1>


<form action="{{ route('employees.insert')}}" method="post">
    @csrf
    <input type="text" name="name" id="name" placeholder="Nome completo" value= "{{old('name')}}">
    <input type="text" name="role" id="role" placeholder="Cargo" value= "{{old('role')}}">
    <input type="number" name="age" id="age" placeholder="Idade" value= "{{old('age')}}">
    <button type="submit">Cadastrar</button>
</form>