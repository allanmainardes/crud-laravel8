@extends('admin.layouts.app')

@section('title', 'Lista de funcionarios - ')

@section('content')
<style>
thead{
    background-color: #b3b3b3;
}
 tbody{
    background-color: #dbdbdb;
    /*border: 1px solid black;*/

}
</style>

@if(session('message'))
    <div>
        {{session('message')}}
    </div>
@endif

<form action="{{ route('employees.search')}}" method="post">
    @csrf
    <input type="text" name="search" id="search" placeholder="Procurar:">
    <button type="submit">Buscar</button>
</form>

<a href="{{route('employees.create')}}">Adicionar Funcionario</a>
<h1> Employees </h1>
@csrf
<table style="text-align:center;">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Idade</th>
            <th></th>
        </tr>
    </thead>
    <tbody >
        
@foreach ($employees as $employee)

        <tr>
            <td><img src="{{ url("storage/{$employee->image}") }}" alt="{{$employee->name}}" style="width: 100px;"></img></td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->age }}</td>
            <td>
                <a href="{{route('employees.show', $employee->id)}}">Ver</a>
                <a href="{{route('employees.edit', $employee->id)}}">Editar</a>

            </td>
        </tr>
@endforeach
    </tbody>
</table>
        
<hr>
@if(isset($parameters))
    {{$employees->appends($parameters)->links()}}
@else
    {{ $employees->links()}}
@endif

@endsection