import express from "express";
import auth from "../middleware/auth.js";
import isAdmin from "../middleware/isAdmin.js";
import upload from "../middleware/upload.js";
import {
  createBook,
  deleteBook,
  updateBook,
  togglePremium
} from "../controllers/adminController.js";

const router = express.Router();

router.post(
  "/book",
  auth,
  isAdmin,
  upload.fields([{ name: "cover" }, { name: "book" }]),
  createBook
);

router.put("/book/:id", auth, isAdmin, updateBook);
router.delete("/book/:id", auth, isAdmin, deleteBook);
router.patch("/book/:id/toggle", auth, isAdmin, togglePremium);

export default router;
