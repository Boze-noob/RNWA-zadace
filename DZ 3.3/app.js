var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var cors = require('cors');


app.use(bodyParser.json());

app.use(bodyParser.urlencoded({
extended: true
}));

app.use('./routes/post', function (req, res) {
    console.log("/user request called");
});
app.use('./routes/interest', function (req, res) {
    console.log("/user request called");
});
// allow cors
app.use(cors);

const port = 5000;


app.listen(port, function () {
	console.log('Node MySQL REST API app is running on port 5000');
});
module.exports = app;