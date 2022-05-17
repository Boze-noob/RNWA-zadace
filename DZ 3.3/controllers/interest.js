var database = require("./data");
var model = require("./schemas");

class PostController {

    static findAll(callback) {
        
        database.InterestRepository.findAll(function name(err, result) {
            if (err) callback(err, err);
            callback(null, result);
        });
    }

    static add(req, callback) {
        var model = new model.INTEREST(req.intid, req.rid, req.interest);
        database.InterestRepository.add(model, function (err, result) {
            if (err) callback(err, err);
            callback(null, result);
        });
    }

    static update(req, callback) {
        var model = new model.INTEREST(req.intid, req.rid, req.interest);
        database.InterestRepository.update(model, function (err, result) {
            if (err) callback(err, err);
            callback(null, result);
        });
    }
    static delete(req, callback) {
        var model = { "intid": req.intid };
        database.InterestRepository.delete(model, function (err, result) {
            if (err) callback(err, err);
            callback(null, result);
        });
    }
}

module.exports =
    {
        InterestController: InterestController
    }