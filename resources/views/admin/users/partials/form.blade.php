<x-alert />

@csrf() {{-- sends the csrf token hidden --}}

<div class="space-y-4">
    <div>
        <input type="text" name="name" placeholder="Nome" class="mt-1 block px-3 py-2 border border-gray-600 bg-gray-800 text-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $user->name ?? old('name') }}">
    </div>

    <div>
        <input type="email" name="email" placeholder="E-mail" class="mt-1 block px-3 py-2 border border-gray-600 bg-gray-800 text-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $user->email ?? old('email') }}">
    </div>

    <div>
        <input type="password" name="password" class="mt-1 block px-3 py-2 border border-gray-600 bg-gray-800 text-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Senha">
    </div>

    <div>
        <button type="submit" class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Enviar
        </button>
    </div>
</div>
