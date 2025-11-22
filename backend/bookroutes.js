import express from "express";
import {
  getFreeBooks,
  getPremiumBooks,
  getBookByGenre,
  searchBooks,
  bookDetails
} from "../controllers/bookController.js";

const router = express.Router();

router.get("/free", getFreeBooks);
router.get("/premium", getPremiumBooks);
router.get("/genre/:genreId", getBookByGenre);
router.get("/search", searchBooks);
router.get("/:id", bookDetails);

export default router;
