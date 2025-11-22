import db from "../db/knex.js";

export const getFreeBooks = async (req, res) => {
  const books = await db("books").where({ is_premium: false });
  res.json(books);
};

export const getPremiumBooks = async (req, res) => {
  const books = await db("books").where({ is_premium: true });
  res.json(
    books.map(b => ({
      ...b,
      locked: true
    }))
  );
};

export const getBookByGenre = async (req, res) => {
  const { genreId } = req.params;

  const books = await db("books")
    .join("book_genre", "books.id", "book_genre.book_id")
    .where("genre_id", genreId);

  res.json(books);
};

export const searchBooks = async (req, res) => {
  const { q } = req.query;

  const books = await db("books").whereILike("title", `%${q}%`);

  res.json(books);
};

export const bookDetails = async (req, res) => {
  const { id } = req.params;
  const book = await db("books").where({ id }).first();
  res.json(book);
};
