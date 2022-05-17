var express = require('express');
var postRouter = express.Router();

import { controller } from "./controllers";

postRouter.get("/api/posts", controller.PostController.get);

postRouter.post("/api/posts", controller.PostController.create);

postRouter.put("/api/posts/:_id", controller.PostController.update);

postRouter.delete("/api/posts/:_id", controller.PostController.delete);

module.exports = postRouter;