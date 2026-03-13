@extends('layouts.admin')

@section('title', 'Users')
@section('page-title', 'Users')

@section('content')

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">Users List</h2>
    </div>

    <table class="min-w-full bg-white rounded shadow overflow-hidden">

        <thead class="bg-gray-100">

            <tr>
                <th class="py-2 px-4 text-left">#</th>
                <th class="py-2 px-4 text-left">Name</th>
                <th class="py-2 px-4 text-left">Email</th>
                <th class="py-2 px-4 text-left">Phone</th>
                <th class="py-2 px-4 text-left">Role</th>
                <th class="py-2 px-4 text-left">Registered</th>
            </tr>

        </thead>

        <tbody>

            @foreach ($users as $user)
                <tr class="border-b">

                    <td class="py-2 px-4">
                        {{ $loop->iteration }}
                    </td>

                    <td class="py-2 px-4">
                        {{ $user->name }}
                    </td>

                    <td class="py-2 px-4">
                        {{ $user->email }}
                    </td>

                    <td class="py-2 px-4">
                        {{ $user->phone }}
                    </td>

                    <td class="py-2 px-4">
                        {{ $user->role }}
                    </td>

                    <td class="py-2 px-4">
                        {{ $user->created_at}}
                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

@endsection
