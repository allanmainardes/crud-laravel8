<h1>Editar o cadastro do Funcionario {{ $employee->name }}</h1>

<form action="{{ route('employees.update', $employee->name)}}" method="post">
    @method('PUT');
    @include('admin.employees._partials.form');
</form>