document.addEventListener('DOMContentLoaded', () => {
    const ws = new WebSocket('ws://127.0.0.1:8080');
    
    ws.onopen = () => {
        console.log('Connected to WebSocket server');
    };
    
    ws.onmessage = (event) => {
        const response = JSON.parse(event.data);
        const messages = document.getElementById('messages');
        const newMessage = document.createElement('div');
        newMessage.classList.add('message', 'server-message');
        newMessage.textContent = 'Assistant :' + response.message;
        messages.appendChild(newMessage);
        messages.scrollTop = messages.scrollHeight;
    };
    
    ws.onclose = () => {
        console.log('Disconnected from WebSocket server');
    };

    ws.onerror = (error) => {
        console.error('WebSocket Error:', error);
    };

    document.querySelectorAll('.predefined-text').forEach(element => {
        element.addEventListener('click', () => {
            const message = element.textContent;
            ws.send(JSON.stringify({ message }));
            const messages = document.getElementById('messages');
            const newMessage = document.createElement('div');
            newMessage.classList.add('message', 'user-message');
            newMessage.textContent = 'You: ' + message;
            messages.appendChild(newMessage);
            messages.scrollTop = messages.scrollHeight;
        });
    });
})