import config from './config';
const sql = require('mssql');

class InterestData {


    static getAll(callback){

        sql.connect(config.databaseConnectionData, function (err) {

            if (err) callback(err, err);

            var request = new sql.Request();

            // query to the database and get the records
            request.query('SELECT * FROM interest', function (err, result) {
                sql.close();
                if (err) callback(err, err);
                callback(null, result);

            });

        });
    }

    static add(model, callback){
        sql.connect(config.databaseConnectionData, function (err) {
            if (err) (err, err);

            var request = new sql.Request()
                .input("intid", int, NULL)
                .input("interest", sql.VarChar(50), model.interest)
                .input("rid", int, model.rid);

            request.query("INSERT INTO interest (intid,interest,rid) VALUES (@intid,@interest,@rid)", function (err, result) {
                sql.close();
                if (err) callback(err, result);
                callback(null, result);
            });
        });
    }

    static update(model, callback){
        sql.connect(config.databaseConnectionData, function (err) {
            if (err) (err, err);

            var request = new sql.Request()
            .input("intid", int, model.initid)
            .input("interest", sql.VarChar(50), model.interest)
            .input("rid", int, model.rid);

            request.query("UPDATE interest SET pcontent = @pcontent , time = @time WHERE pid = @pid", function (err, result) {
                sql.close();
                if (err) callback(err, result);
                callback(null, result);
            });
        });
    }

    static delete(model, callback){
        sql.connect(config.databaseConnectionData, function (err) {
            if (err) (err, err);

            var request = new sql.Request()
                .input('intid', int, model.intid)

            request.query("DELETE FROM interest WHERE pid = @pid", function (err, result) {
                sql.close();
                if (err) callback(err, result);
                callback(null, result);
            });
        });
    }


}

module.exports =
    {
        InterestRepository: InterestData
    }