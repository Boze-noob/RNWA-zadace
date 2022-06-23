module.exports = app => {
  const jwt = require('jsonwebtoken');

  const interestController = require("../controllers/interest.controller.js"); 

  const postController = require("../controllers/post.controller.js");

  var router = require("express").Router();
  
  router.use(function(req, res, next) {
    res.header('Access-Control-Allow-Origin', '*');
    res.header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
    res.header('Access-Control-Allow-Headers', 'Content-Type');
    next();
  });

  router.get("/posts", authenticateToken, postController.findAll);

  router.get("/post/:id", authenticateToken, postController.findOne);
  
  router.post("/post", authenticateToken, postController.create);

  router.put("/post/:id", authenticateToken, postController.update);

  router.delete("/post/:id", authenticateToken, postController.delete);

  router.delete("/posts", authenticateToken, postController.deleteAll);



  router.get("/interests", authenticateToken, interestController.findAll);

  router.get("/interest/:id", authenticateToken, interestController.findOne);
  
  router.post("/interest", authenticateToken, interestController.create);

  router.put("/interest/:id", authenticateToken, interestController.update);

  router.delete("/interest/:id", authenticateToken, interestController.delete);

  router.delete("/interest", authenticateToken, interestController.deleteAll);

  function authenticateToken(req, res, next) {
    const authHeader = req.headers['authorization']
    const token = authHeader && authHeader.split(' ')[1]
    if (token == null) return res.sendStatus(401)
  
    jwt.verify(token, process.env.ACCESS_TOKEN_SECRET, (err, user) => {
      console.log(err)
      if (err) return res.sendStatus(403)
      req.user = user
      next()
    })
  }


  let refreshTokens = [];

  router.post('/token', (req, res) => {
    const refreshToken = req.body.token
    if (refreshToken == null) return res.sendStatus(401)
    if (!refreshTokens.includes(refreshToken)) return res.sendStatus(403)
    jwt.verify(refreshToken, process.env.REFRESH_TOKEN_SECRET, (err, user) => {
      if (err) return res.sendStatus(403)
      const accessToken = generateAccessToken({ name: user.name })
      res.json({ accessToken: accessToken })
    })
  })
  
  router.delete('/logout', (req, res) => {
    refreshTokens = refreshTokens.filter(token => token !== req.body.token)
    res.sendStatus(204)
  })
  
  router.post('/login', (req, res) => {
    // Authenticate User
  
    const username = req.body.username
    const user = { name: username }
  
    const accessToken = generateAccessToken(user)
    const refreshToken = jwt.sign(user, process.env.REFRESH_TOKEN_SECRET)
    refreshTokens.push(refreshToken)
    res.json({ accessToken: accessToken, refreshToken: refreshToken })
  })
  
  function generateAccessToken(user) {
    return jwt.sign(user, process.env.ACCESS_TOKEN_SECRET, { expiresIn: '90s' })
  }

  app.use('/api', router);
};
