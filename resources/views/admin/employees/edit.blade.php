@extends('admin.layouts.app')

@section('title', 'Editar funcionario - ')

@section('content')

<h1>Editar o cadastro do Funcionario {{ $employee->name }}</h1>

<form action="{{ route('employees.update', $employee->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.employees._partials.form')
</form>

@endsection