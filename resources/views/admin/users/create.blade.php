@extends('admin.layouts.app')

@section('title', 'Criar novo usuário')

@section('content')
    <h1>Novo Usuário</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @include('admin.users.partials.form')
    </form>
@endsection
