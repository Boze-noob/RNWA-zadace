var database = require("./data");
var model = require("./schemas");

class PostController {

    static findAll(callback) {
        
        database.PostRepository.findAll(function name(err, result) {
            if (err) callback(err, err);
            callback(null, result);
        });
    }

    static add(req, callback) {
        var model = new model.POST(req.pid, req.pcontent, req.rid, req.time);
        data.PostRepository.add(model, function (err, result) {
            if (err) callback(err, err);
            callback(null, result);
        });
    }

    static update(req, callback) {
        var model = new model.POST(req.pid, req.pcontent, req.rid, req.time);
        data.PostRepository.update(model, function (err, result) {
            if (err) callback(err, err);
            callback(null, result);
        });
    }
    static delete(req, callback) {
        var model = { "pid": req.pid };
        data.PostRepository.delete(model, function (err, result) {
            if (err) callback(err, err);
            callback(null, result);
        });
    }
}

module.exports =
    {
        PostController: PostController
    }