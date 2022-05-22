module.exports = app => {


  const interestController = require("../controllers/interest.controller.js"); 

  const postController = require("../controllers/post.controller.js");

  var router = require("express").Router();
  
  router.use(function(req, res, next) {
    res.header('Access-Control-Allow-Origin', '*');
    res.header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
    res.header('Access-Control-Allow-Headers', 'Content-Type');
    next();
  });

  router.get("/posts", postController.findAll);

  router.get("/post/:id", postController.findOne);
  
  router.post("/post", postController.create);

  router.put("/post/:id", postController.update);

  router.delete("/post/:id", postController.delete);

  router.delete("/posts", postController.deleteAll);



  router.get("/interests", interestController.findAll);

  router.get("/interest/:id", interestController.findOne);
  
  router.post("/interest", interestController.create);

  router.put("/interest/:id", interestController.update);

  router.delete("/interest/:id", interestController.delete);

  router.delete("/interest", interestController.deleteAll);


  app.use('/api', router);
};
