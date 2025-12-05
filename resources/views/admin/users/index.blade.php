@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-neutral-900 p-8">
        <div class="max-w-7xl mx-auto">
            <!-- HEADER -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-4xl font-bold text-white">👥 Users Management</h1>
                    <a href="{{ route('admin.dashboard') }}"
                        class="px-4 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-100 rounded-lg transition">
                        Back to Dashboard
                    </a>
                </div>

                <!-- SEARCH BAR -->
                <form method="GET" action="{{ url('/admin/users') }}" class="flex gap-2">
                    <input type="text" name="q" value="{{ $query ?? '' }}" placeholder="Search by name or email..."
                        class="flex-1 px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white placeholder-neutral-500 focus:outline-none focus:border-brand-500">
                    <button type="submit"
                        class="px-6 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-lg transition">
                        Search
                    </button>
                </form>
            </div>

            <!-- USERS TABLE -->
            <div class="bg-neutral-800 rounded-xl border border-neutral-700 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-neutral-700 border-b border-neutral-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">User ID</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Join Date</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Last Login</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="border-b border-neutral-700 hover:bg-neutral-700/50 transition">
                                <td class="px-6 py-4">
                                    <span class="font-mono text-brand-400">#{{ $user->id }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-white font-medium">{{ $user->name }}</span>
                                    @if($user->email === 'admin@gmail.com')
                                        <span
                                            class="ml-2 px-2 py-1 bg-brand-900 text-brand-200 rounded text-xs font-semibold">ADMIN</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-neutral-400">{{ $user->email }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-900 text-green-200">
                                        ✓ Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-neutral-300 text-sm">
                                    {{ $user->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 text-neutral-300 text-sm">
                                    @if($user->last_login_at)
                                        {{ $user->last_login_at->format('M d, Y H:i') }}
                                    @else
                                        <span class="text-neutral-500">Never</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-neutral-400">
                                    No users found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            @if($users->count() > 0)
                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection