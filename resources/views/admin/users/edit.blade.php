@extends('admin.layouts.app')

@section('title', 'Editar usuário')

@section('content')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight">
            Editar o Usuário {{ $user->name }}
        </h2>
    </div>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @method('PUT') {{-- submits with put method --}}
        @include('admin.users.partials.form')
    </form>
@endsection
