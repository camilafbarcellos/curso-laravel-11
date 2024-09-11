@extends('admin.layouts.app')

@section('title', 'Detalhes do usuário')

@section('content')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight">
            Detalhes do Usuário {{ $user->name }}
        </h2>
    </div>

    <ul class="max-w-md space-y-1 text-gray-400 list-disc list-inside">
        <li><b>Nome:</b> {{ $user->name }}</li>
        <li><b>E-mail:</b> {{ $user->email }}</li>
    </ul>

    <x-alert/>

    {{-- only admins can delete users --}}
    @can('is-admin')
    {{-- user cannot delete himself --}}
    {{-- @can('owner', $user) --}}
    <form action="{{ route('users.destroy', $user->id) }}" method="post" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
            Excluir
        </button>
    </form>
    {{-- @endcan --}}
    @endcan
@endsection
