var express = require('express');
var path = require('path');
var app = express();

app.use('/assets', express.static('assets'))

app.get('/', function(req, res) {
    res.sendFile(path.join(__dirname + '/index.html'));
});

app.listen(3000, function () {
    console.log('App is running at http://127.0.0.1:3000/');
});