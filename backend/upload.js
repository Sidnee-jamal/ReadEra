import multer from "multer";

const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    const folder = file.fieldname === "cover" ? "uploads/covers" : "uploads/books";
    cb(null, folder);
  },
  filename: (req, file, cb) => {
    cb(null, Date.now() + "-" + file.originalname);
  }
});

export default multer({ storage });
