import express from "express";
var interestRouter = express.Router();

import { interestController } from "../controllers";

interestRouter.get("/api/interest", interestController.get);

interestRouter.post("/api/interest", interestController.create);

interestRouter.put("/api/interest/:_id", interestController.update);

interestRouter.delete("/api/interest/:_id", interestController.delete);

module.exports = interestRouter;