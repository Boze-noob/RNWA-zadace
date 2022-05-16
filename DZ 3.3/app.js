import config from './config';


var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var mysql = require('mysql');


app.use(bodyParser.json());

app.use(bodyParser.urlencoded({
extended: true
}));

const port = 5000;

var dbConn = mysql.createConnection(
    config.databaseConnectionData
);

dbConn.connect();


app.listen(port, function () {
	console.log('Node MySQL REST API app is running on port 5000');
});
export default app;