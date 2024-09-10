@extends('admin.layouts.app')

@section('title', 'Editar usuário')

@section('content')
    <h1>Editar o Usuário {{ $user->name }}</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @method('PUT') {{-- submits with put method --}}
        @include('admin.users.partials.form')
    </form>
@endsection
