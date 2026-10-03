@extends('layouts.admin', [
    'title' => 'Messages',
    'headerTitle' => 'Messages',
    'headerDescription' => 'Manage incoming contact messages'
])

@section('content')
<div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Subject</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Received</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($messages as $message)
                    <tr class="hover:bg-gray-50 transition-colors {{ !$message->is_read ? 'font-medium bg-blue-50' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">{{ $message->sender_name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $message->sender_email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $message->subject ?? '<span class="text-gray-400 italic">— No subject —</span>' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($message->created_at)->format('M d, Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($message->is_read)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                    Read
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse mr-1.5"></span>
                                    Unread
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.messages.show', $message) }}"
                               class="text-blue-600 hover:text-blue-900 mr-4 font-medium">View</a>
                            <form action="{{ route('admin.messages.markAsRead', $message) }}" method="POST" class="inline mr-2">
                                @csrf
                                @method('PUT')
                                @if(!$message->is_read)
                                    <button type="submit"
                                            class="text-blue-600 hover:text-blue-900 font-medium">
                                        Mark as Read
                                    </button>
                                @endif
                            </form>
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-900 font-medium"
                                        onclick="return confirm('Are you sure you want to delete this message?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <p class="text-lg font-medium">No messages found</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $messages->links() }}
</div>
@endsection