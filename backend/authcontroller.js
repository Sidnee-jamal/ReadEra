import bcrypt from "bcrypt";
import jwt from "jsonwebtoken";
import db from "../db/knex.js";

export const register = async (req, res) => {
  const { username, email, password } = req.body;

  const exists = await db("users").where({ email }).first();
  if (exists) return res.status(400).json({ message: "Email already used" });

  const hashed = await bcrypt.hash(password, 10);

  await db("users").insert({
    username,
    email,
    password: hashed,
    role: "user"
  });

  res.json({ message: "User registered" });
};

export const login = async (req, res) => {
  const { email, password } = req.body;

  const user = await db("users").where({ email }).first();
  if (!user) return res.status(400).json({ message: "User not found" });

  const match = await bcrypt.compare(password, user.password);
  if (!match) return res.status(400).json({ message: "Wrong password" });

  const token = jwt.sign(
    { id: user.id, role: user.role },
    process.env.JWT_SECRET,
    { expiresIn: "7d" }
  );

  res.json({ token });
};
