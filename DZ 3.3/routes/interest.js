import express from "express";
const router = express.Router();

import { interestController } from "../controllers";

router.get("/api/interest", interestController.get);

router.post("/api/interest", interestController.create);

router.put("/api/interest/:_id", interestController.update);

router.delete("/api/interest/:_id", interestController.delete);

export default router;