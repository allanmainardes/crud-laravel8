<style>
thead{
    background-color: #b3b3b3;
}
 tbody{
    background-color: #dbdbdb;
    /*border: 1px solid black;*/

}

</style>
<h1> Detalhes do funcionário: {{$employee->name}} </h1>
@csrf
<table style="text-align:center;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Idade</th>
        </tr>
    </thead>
    <tbody >
        <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->role }}</td>
            <td>{{ $employee->age }}</td>
            <td>
            <form action="{{route('employees.destroy', $employee->name)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Deletar {{ $employee->name }} </button>
            </form>
            </td>
        </tr>
    </tbody>
</table>


