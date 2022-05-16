import express from "express";
const router = express.Router();

import { postsController } from "../controllers";

router.get("/api/posts", postsController.get);

router.post("/api/posts", postsController.create);

router.put("/api/posts/:_id", postsController.update);

router.delete("/api/posts/:_id", postsController.delete);

export default router;