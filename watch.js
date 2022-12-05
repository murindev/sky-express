const watch = require('node-watch');

const WebSocket = require('ws');

const wss = new WebSocket.Server({port: 8090});

watch([
    './resources/',
    // './public/',
    './app/',
], {recursive: true}, (evt, name) => {
    console.log('%s changed.', name);
    wss.clients.forEach((client) => {
        if (client.readyState === WebSocket.OPEN) {
            client.send(name);
        }
    });
});
