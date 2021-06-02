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


<a href="{{route('employees.create')}}">Adicionar Funcionario</a>
<h1> Employees </h1>
@csrf
<table style="text-align:center;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th></th>
        </tr>
    </thead>
    <tbody >
        
@foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->age }}</td>
            <td><a href="{{route('employees.show', $employee->name)}}">Ver</a></td>
        </tr>
@endforeach
    </tbody>
</table>
        
</table>