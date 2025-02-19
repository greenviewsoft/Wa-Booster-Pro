# WhatsApp API Documentation

A lightweight Php Packages library for interacting with WhatsApp Web API.

## Installation

```bash
npm install whatsapp-api
```

## Quick Start

```javascript
const WhatsAppApi = require('whatsapp-api');

// Initialize client
const client = new WhatsAppApi();

// Connect to WhatsApp Web
client.connect();

// Send a message
client.sendMessage('1234567890@c.us', 'Hello from WhatsApp API!');
```

## Features

- Send text messages
- Send media files
- Get chat history
- Handle incoming messages
- Group management

## Basic Usage

```javascript
// Listen for messages
client.on('message', message => {
    console.log(message.body);
});

// Send image
client.sendImage('1234567890@c.us', 'path/to/image.jpg');
```

## License

MIT

## Support

For issues and feature requests, please create an issue on GitHub.