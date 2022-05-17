import config from './config';
const sql = require('mssql');

class PostData {


    static getAll(callback){

        sql.connect(config.databaseConnectionData, function (err) {

            if (err) callback(err, err);

            var request = new sql.Request();

            // query to the database and get the records
            request.query('SELECT * FROM post', function (err, result) {
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
                .input("pid", int, NULL)
                .input("pcontent", sql.VarChar(50), model.pcontent)
                .input("rid", int, model.rid)
                .input("time", dateTime, model.time);

            request.query("INSERT INTO post (pid,pcontent,rid, time) VALUES (@pid,@pcontent,@rid,@time)", function (err, result) {
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
            .input("pid", int, model.pid)
            .input("pcontent", sql.VarChar(50), model.pcontent)
            .input("rid", int, model.rid)
            .input("time", dateTime, model.time);

            request.query("UPDATE post SET pcontent = @pcontent , time = @time WHERE pid = @pid", function (err, result) {
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
                .input('pid', int, model.pid)

            request.query("DELETE FROM post WHERE pid = @pid", function (err, result) {
                sql.close();
                if (err) callback(err, result);
                callback(null, result);
            });
        });
    }


}

module.exports =
    {
        PostRepository: PostData
    }