@extends('layout-pengguna.main')
@section('content')

<div class="max-w-4xl mx-auto p-5">
    <div class="text-center mb-8">
        <div class="flex items-center justify-center gap-4 mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center text-white text-2xl shadow-lg">
                🤖
            </div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                LioraBooks
            </h1>
        </div>
        <p class="text-gray-600 text-lg mb-6">
            LioraBooks Adalah Asisten AI untuk membantu Anda menemukan buku dan informasi perpustakaan
        </p>
    </div>

    <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden">
        <div class="h-96 overflow-y-auto p-6 bg-gradient-to-b from-gray-50 to-white" id="chatMessages">
            <div class="text-center text-gray-500 italic py-12" id="welcomeMessage">
                <div class="inline-flex items-center gap-2 bg-white px-6 py-3 rounded-full shadow-sm border">
                    👋 <span>Halo! Saya LioraBooks, siap membantu Anda dengan segala pertanyaan seputar buku dan perpustakaan. Silakan tanyakan apa saja!</span>
                </div>
            </div>
        </div>

        <div class="px-6 pb-4 hidden" id="typingIndicator">
            <div class="flex justify-start">
                <div class="bg-gray-100 rounded-2xl rounded-bl-md px-4 py-3 border border-gray-200">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border-t border-gray-200 p-6">
            <form id="formAI">
                @csrf
                <div class="flex items-end gap-3">
                    <div class="flex-1 relative">
                        <textarea 
                            name="pertanyaan" 
                            id="pertanyaan"
                            rows="1"
                            placeholder="Ketik pertanyaan Anda di sini..."
                            class="w-full min-h-[50px] max-h-[120px] px-6 py-4 bg-gray-50 border-2 border-gray-200 rounded-3xl resize-none outline-none focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100 transition-all duration-300 text-gray-800 placeholder-gray-500"></textarea>
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

<div id="jawaban" class="hidden"></div>

<script>
// Auto-resize textarea
const textarea = document.getElementById('pertanyaan');
textarea.addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = Math.min(this.scrollHeight, 120) + 'px';
});

// Handle Enter key (Shift+Enter for new line, Enter to send)
textarea.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        document.getElementById('formAI').dispatchEvent(new Event('submit'));
    }
});

// Format text content for better readability
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

// Add message to chat
function addMessage(content, isUser = false) {
    const chatMessages = document.getElementById('chatMessages');
    const welcomeMessage = document.getElementById('welcomeMessage');
    
    // Remove welcome message on first interaction
    if (welcomeMessage) {
        welcomeMessage.remove();
    }
    
    // Create message container
    const messageDiv = document.createElement('div');
    messageDiv.className = `mb-6 flex ${isUser ? 'justify-end' : 'justify-start'} animate-fadeInUp`;
    
    // Create message bubble
    const bubbleDiv = document.createElement('div');
    bubbleDiv.className = `${
        isUser 
            ? 'max-w-xs lg:max-w-md px-5 py-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-2xl rounded-br-md shadow-lg' 
            : 'max-w-sm lg:max-w-lg px-5 py-4 bg-white text-gray-800 rounded-2xl rounded-bl-md border border-gray-200 shadow-sm'
    }`;
    
    // Format content for bot messages
    if (!isUser) {
        bubbleDiv.innerHTML = formatText(content);
        bubbleDiv.className += ' leading-relaxed text-sm prose prose-sm max-w-none';
        
        // Add custom styling for formatted elements
        const strongElements = bubbleDiv.querySelectorAll('strong');
        strongElements.forEach(el => {
            el.className = 'text-purple-700 font-semibold';
        });
    } else {
        bubbleDiv.textContent = content;
        bubbleDiv.className += ' leading-relaxed';
    }
    
    messageDiv.appendChild(bubbleDiv);
    chatMessages.appendChild(messageDiv);
    
    // Scroll to bottom
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

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

// Form submission
document.getElementById('formAI').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const pertanyaanInput = document.getElementById('pertanyaan');
    const sendButton = document.getElementById('sendButton');
    const pertanyaan = pertanyaanInput.value.trim();
    
    if (!pertanyaan) return;
    
    // Add user message
    addMessage(pertanyaan, true);
    
    // Clear input and disable button
    pertanyaanInput.value = '';
    pertanyaanInput.style.height = 'auto';
    sendButton.disabled = true;
    
    // Show typing indicator
    showTyping(true);
    
    try {
        let response = await fetch("/tanya-ai", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ pertanyaan })
        });

        let data = await response.json();
        
        // Hide typing indicator
        showTyping(false);
        
        // Add bot response
        addMessage(data.jawaban);
        
        // Update hidden div (maintain original functionality)
        document.getElementById('jawaban').innerText = data.jawaban;
        
    } catch (error) {
        showTyping(false);
        addMessage('Maaf, terjadi kesalahan. Silakan coba lagi.');
        console.error('Error:', error);
    } finally {
        sendButton.disabled = false;
        pertanyaanInput.focus();
    }
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

/* Message formatting styles */
.bot-message {
    line-height: 1.6;
}

.bot-message strong {
    color: #7c3aed;
    font-weight: 600;
    display: block;
    margin-top: 8px;
    margin-bottom: 4px;
}

.bot-message strong:first-child {
    margin-top: 0;
}

.bot-message br + strong {
    margin-top: 12px;
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

/* Better text spacing for bot messages */
.formatted-text p {
    margin-bottom: 12px;
}

.formatted-text p:last-child {
    margin-bottom: 0;
}

.formatted-text strong {
    color: #7c3aed;
    font-weight: 600;
}
</style>

@endsection