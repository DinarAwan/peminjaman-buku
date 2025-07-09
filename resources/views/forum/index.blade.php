@extends('layout-pengguna.main')
@section('content')

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>

    <div class="max-w-4xl mx-auto p-5">
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-4 mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center text-white text-2xl shadow-lg">
                    <span>📚</span>
                </div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                    Forum Diskusi
                </h1>
            </div>
            <p class="text-gray-600 text-lg mb-6">
                Forum Diskusi ini adalah wadah untuk berinteraksi sesama member dari Demen Baca
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden">
            <div class="h-96 overflow-y-auto p-6 bg-gradient-to-b from-gray-50 to-white" id="chatMessages">
                @if($pesan->isEmpty())
                    <!-- Welcome message -->
                    <div class="text-center text-gray-500 py-12" id="welcomeMessage">
                        <div class="inline-flex items-center gap-2 bg-white px-6 py-3 rounded-full shadow-sm border">
                            <span>💬 Selamat datang di Forum Diskusi Demen Baca!</span>
                        </div>
                    </div>
                @else
                    <!-- Display messages from database -->
                    @foreach ($pesan as $item)
                        @php
                            $isCurrentUser = auth()->check() && $item->user->id == auth()->id();
                            $avatarInitials = strtoupper(substr($item->user->name, 0, 2));
                            $avatarColors = [
                                'from-blue-500 to-purple-600',
                                'from-green-500 to-teal-600',
                                'from-orange-500 to-red-600',
                                'from-pink-500 to-purple-600',
                                'from-indigo-500 to-blue-600',
                                'from-yellow-500 to-orange-600',
                                'from-teal-500 to-green-600',
                                'from-red-500 to-pink-600'
                            ];
                            $colorIndex = abs(crc32($item->user->name)) % count($avatarColors);
                            $avatarColor = $avatarColors[$colorIndex];
                            $messageTime = $item->created_at ? $item->created_at->format('H:i') : now()->format('H:i');
                        @endphp
                        
                        <div class="mb-4 flex {{ $isCurrentUser ? 'justify-end' : 'justify-start' }} animate-fadeInUp">
                            @if($isCurrentUser)
                                <!-- Current user message (right side) -->
                                <div class="flex items-start gap-3 max-w-md">
                                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-2xl rounded-tr-md px-4 py-3 shadow-lg">
                                        <div class="text-xs text-purple-100 mb-1 font-medium">{{ $item->user->name }}</div>
                                        <div class="text-white text-sm leading-relaxed formatted-message">{{ $item->content }}</div>
                                        <div class="text-xs text-purple-200 mt-2">{{ $messageTime }}</div>
                                    </div>

                                    @if ($item->user->foto_profile)
                                        <img alt="profile_image" class="w-10 h-10 bg-gradient-to-br rounded-full flex items-center justify-center text-white text-sm font-semibold flex-shrink-0" src="{{ url('foto_profile').'/'.$item->user->foto_profile}}" >
                                    @else
                                    <div class="w-10 h-10 bg-gradient-to-br {{ $avatarColor }} rounded-full flex items-center justify-center text-white text-sm font-semibold flex-shrink-0">
                                        {{ $avatarInitials }}
                                    </div>
                                    @endif
                                       
                                    {{-- <div class="w-10 h-10 bg-gradient-to-br {{ $avatarColor }} rounded-full flex items-center justify-center text-white text-sm font-semibold flex-shrink-0">
                                        {{ $avatarInitials }}
                                    </div> --}}
                                </div>
                            @else
                                <!-- Other user message (left side) -->
                                <div class="flex items-start gap-3 max-w-md">
                                    @if ($item->user->foto_profile)
                                    <img alt="profile_image" class="w-10 h-10 bg-gradient-to-br rounded-full flex items-center justify-center text-white text-sm font-semibold flex-shrink-0" src="{{ url('foto_profile').'/'.$item->user->foto_profile}}" >
                                @else
                                <div class="w-10 h-10 bg-gradient-to-br {{ $avatarColor }} rounded-full flex items-center justify-center text-white text-sm font-semibold flex-shrink-0">
                                    {{ $avatarInitials }}
                                </div>
                                @endif
                                    <div class="bg-white rounded-2xl rounded-tl-md px-4 py-3 border border-gray-200 shadow-sm">
                                        <div class="text-xs text-gray-500 mb-1 font-medium">{{ $item->user->name }}</div>
                                        <div class="text-gray-800 text-sm leading-relaxed formatted-message">{{ $item->content }}</div>
                                        <div class="text-xs text-gray-400 mt-2">{{ $messageTime }}</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Typing indicator -->
            <div class="px-6 pb-4 hidden" id="typingIndicator">
                <div class="flex justify-start">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center text-gray-600 text-sm font-semibold flex-shrink-0">
                            ?
                        </div>
                        <div class="bg-gray-100 rounded-2xl rounded-tl-md px-4 py-3 border border-gray-200">
                            <div class="flex space-x-1">
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message input form -->
            <div class="bg-white border-t border-gray-200 p-6">
                <form id="formAI" method="post" action="/forum">
                    @csrf
                    <div class="flex items-end gap-3">
                        <div class="flex-1 relative">
                            <textarea 
                                name="content" 
                                id="pertanyaan"
                                rows="1"
                                placeholder="Kirim pesan disini..."
                                class="w-full min-h-[50px] max-h-[120px] px-6 py-4 bg-gray-50 border-2 border-gray-200 rounded-3xl resize-none outline-none focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100 transition-all duration-300 text-gray-800 placeholder-gray-500"
                                required></textarea>
                        </div>
                        <button 
                            type="submit" 
                            id="sendButton"
                            class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 disabled:opacity-60 disabled:cursor-not-allowed disabled:transform-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        @if(auth()->check())
        const currentUser = {
            name: "{{ auth()->user()->name }}",
            avatar: "{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}",
            id: {{ auth()->id() }}
        };
        @endif

        const textarea = document.getElementById('pertanyaan');
        
        // Auto-resize textarea
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 120) + 'px';
        });

        // Submit on Enter key
        textarea.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                document.getElementById('formAI').submit();
            }
        });

        // Handle form submission - removed preventDefault to allow normal form submission
        document.getElementById('formAI').addEventListener('submit', function(e) {
            const message = textarea.value.trim();
            if (!message) {
                e.preventDefault();
                return;
            }
            
            // Show loading state
            const sendButton = document.getElementById('sendButton');
            sendButton.disabled = true;
            sendButton.innerHTML = '<div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>';
        });

        // Format text for better display
        function formatText(text) {
            // Replace numbered lists (1. 2. 3. etc.)
            text = text.replace(/(\d+\.\s)/g, '<br><strong>$1</strong>');
            
            // Replace **text** with bold formatting
            text = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            
            // Replace paragraphs (double line breaks)
            text = text.replace(/\n\n/g, '<br><br>');
            
            // Replace single line breaks
            text = text.replace(/\n/g, '<br>');
            
            // Add spacing after periods for better readability
            text = text.replace(/\.\s+/g, '. ');
            
            return text;
        }

        // Apply formatting to existing messages
        document.addEventListener('DOMContentLoaded', function() {
            const messages = document.querySelectorAll('.formatted-message');
            messages.forEach(function(message) {
                const originalText = message.textContent;
                message.innerHTML = formatText(originalText);
            });
            
            // Auto-scroll to bottom
            const chatMessages = document.getElementById('chatMessages');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });

        // Show/hide typing indicator
        function showTyping(show = true) {
            const typingIndicator = document.getElementById('typingIndicator');
            const chatMessages = document.getElementById('chatMessages');
            
            if (show) {
                typingIndicator.classList.remove('hidden');
                chatMessages.scrollTop = chatMessages.scrollHeight;
            } else {
                typingIndicator.classList.add('hidden');
            }
        }


        window.Echo = new Echo({
        broadcaster: 'socket.io',
        host: window.location.hostname + ':6001', // Port default Laravel Echo Server
    });

    Echo.channel('chat')
    .listen('NewMessage', (e) => {
        console.log("Pesan baru:", e.message);

        const chatBox = document.getElementById('chatMessages');

        // Buat elemen pesan baru
        const isCurrentUser = e.message.user.id === currentUser?.id;
        const div = document.createElement('div');
        div.className = 'mb-4 flex ' + (isCurrentUser ? 'justify-end' : 'justify-start') + ' animate-fadeInUp';

        const avatar = `
            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center text-white text-sm font-semibold flex-shrink-0">
                ${e.message.user.name.slice(0, 2).toUpperCase()}
            </div>`;

        const bubble = `
            <div class="${isCurrentUser ? 'bg-gradient-to-r from-purple-500 to-pink-500 text-white' : 'bg-white border border-gray-200 text-gray-800'} rounded-2xl px-4 py-3 shadow-sm max-w-md">
                <div class="text-xs ${isCurrentUser ? 'text-purple-100' : 'text-gray-500'} mb-1 font-medium">${e.message.user.name}</div>
                <div class="text-sm leading-relaxed formatted-message">${e.message.content}</div>
                <div class="text-xs ${isCurrentUser ? 'text-purple-200' : 'text-gray-400'} mt-2">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</div>
            </div>`;

        // Susun bubble dan avatar
        div.innerHTML = isCurrentUser
            ? `<div class="flex items-start gap-3">${bubble}${avatar}</div>`
            : `<div class="flex items-start gap-3">${avatar}${bubble}</div>`;

        chatBox.appendChild(div);
        chatBox.scrollTop = chatBox.scrollHeight;
    });


    </script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.3s ease-out;
        }

        /* Custom scrollbar */
        #chatMessages::-webkit-scrollbar {
            width: 6px;
        }

        #chatMessages::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        #chatMessages::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        #chatMessages::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Better text spacing for messages */
        .formatted-message {
            line-height: 1.5;
        }

        .formatted-message p {
            margin-bottom: 12px;
        }

        .formatted-message p:last-child {
            margin-bottom: 0;
        }

        .formatted-message strong {
            color: #7c3aed;
            font-weight: 600;
        }

        /* Loading animation */
        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }
    </style>


@endsection