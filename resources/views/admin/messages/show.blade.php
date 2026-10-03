@extends('layouts.admin', [
    'title' => 'Message Details',
    'headerTitle' => 'Message Details',
    'headerDescription' => 'View message from ' . $message->sender_name
])

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Email Card -->
    <article class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <!-- Card Header -->
        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Message Details</h2>
                    <p class="text-sm text-gray-500">Message from {{ $message->sender_name }}</p>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="p-6 md:p-8">
            <!-- Sender Information -->
            <section class="mb-8 pb-8 border-b border-gray-100">
                <div class="flex items-center gap-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    From
                </div>
                <div class="ml-6">
                    <p class="text-xl font-semibold text-gray-900">{{ $message->sender_name }}</p>
                    <p class="text-gray-500 mt-1 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        {{ $message->sender_email }}
                    </p>
                </div>
            </section>

            <!-- Subject -->
            <section class="mb-8 pb-8 border-b border-gray-100">
                <div class="flex items-center gap-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Subject
                </div>
                <div class="ml-6">
                    <p class="text-gray-900 font-medium text-lg">{{ $message->subject ?? '<span class="text-gray-400 italic">— No subject —</span>' }}</p>
                </div>
            </section>

            <!-- Message Body -->
            <section class="mb-8 pb-8 border-b border-gray-100">
                <div class="flex items-center gap-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    Message
                </div>
                <div class="ml-6">
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <p class="text-gray-700 whitespace-pre-wrap leading-relaxed text-base">{{ $message->message }}</p>
                    </div>
                </div>
            </section>

            <!-- Metadata -->
            <section class="mb-6">
                <div class="flex items-center gap-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Information
                </div>
                <div class="ml-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Received</p>
                        <p class="text-gray-900 font-medium">{{ \Carbon\Carbon::parse($message->created_at)->format('M d, Y H:i:s') }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Status</p>
                        @if($message->is_read)
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-green-50 text-green-700 border border-green-100 font-medium text-sm">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                Read
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-amber-50 text-amber-700 border border-amber-100 font-medium text-sm">
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                Unread
                            </span>
                        @endif
                    </div>
                </div>
            </section>

            <!-- Actions -->
            @if(!$message->is_read)
            <div class="pt-6 border-t border-gray-100">
                <form action="{{ route('admin.messages.markAsRead', $message) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Mark as Read
                    </button>
                </form>
            </div>
            @endif
        </div>
    </article>

    <!-- Back Link -->
    <div class="mt-8 text-center">
        <a href="{{ route('admin.messages.index') }}"
           class="text-sm text-gray-500 hover:text-gray-700 transition-colors inline-flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Messages List
        </a>
    </div>
</div>
@endsection