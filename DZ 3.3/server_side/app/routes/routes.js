module.exports = app => {


  const interest = require("../controllers/interest.controller.js"); 

  const posts = require("../controllers/post.controller.js");

  var router = require("express").Router();
  
  router.use(function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    next();
  });

  router.get("/posts", posts.findAll);

  router.get("/posts/:id", posts.findOne);
  
  router.post("/post", posts.create);

  router.put("/post/:id", posts.update);

  router.delete("/post/:id", posts.delete);

  router.delete("/posts", posts.deleteAll);



  router.get("/interests", interest.findAll);

  router.get("/interest/:id", interest.findOne);
  
  router.post("/interest", interest.create);

  router.put("/interest/:id", interest.update);

  router.delete("/interest/:id", interest.delete);

  router.delete("/interest", interest.deleteAll);


  app.use('/api', router);
};
