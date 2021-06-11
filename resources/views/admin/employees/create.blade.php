@extends('admin.layouts.app')

@section('title', 'Cadastro de funcionarios - ')

@section('content')
    <h1>Adicionar Funcionario</h1>

    <form action="{{ route('employees.insert') }}" method="post" enctype="multipart/form-data">
        @include('admin.employees._partials.form')
    </form>

@endsection
