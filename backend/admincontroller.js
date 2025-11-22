import db from "../db/knex.js";

export const createBook = async (req, res) => {
  const { title, author, description, is_premium } = req.body;

  const cover = req.files?.cover?.[0]?.path || null;
  const file = req.files?.book?.[0]?.path || null;

  await db("books").insert({
    title,
    author,
    description,
    cover_image: cover,
    file_path: file,
    is_premium
  });

  res.json({ message: "Book added" });
};

export const updateBook = async (req, res) => {
  const { id } = req.params;

  await db("books").where({ id }).update(req.body);

  res.json({ message: "Book updated" });
};

export const deleteBook = async (req, res) => {
  const { id } = req.params;

  await db("books").where({ id }).delete();

  res.json({ message: "Book deleted" });
};

export const togglePremium = async (req, res) => {
  const { id } = req.params;

  const book = await db("books").where({ id }).first();
  const newValue = !book.is_premium;

  await db("books").where({ id }).update({
    is_premium: newValue
  });

  res.json({ message: "Status updated" });
};
