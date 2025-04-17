# 🎬 CRUDMoviesPHP

**CRUDMoviesPHP** is a sleek and modern web application that lets you manage your favorite movies and TV shows in just a few clicks. Designed for simplicity and built with core web technologies, it's the perfect lightweight solution for cataloging, editing, and exporting multimedia content.

![PHP](https://img.shields.io/badge/php-8.x-blue)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?&style=flat&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-5.x-purple)
![License](https://img.shields.io/badge/license-MIT-green)

---

## ✨ Features

- 📌 Add, edit, and delete movies or TV series
- 🎯 Filter by title, genre, type (movie or series), and status
- 🌓 Built-in dark mode toggle
- 📄 Export your content to PDF
- 🛠️ Clean and responsive interface with Bootstrap 5
- 📁 Organized file structure for easy customization

---

## ⚙️ Tech Stack

| Layer        | Technology       |
|--------------|------------------|
| Front-end    | HTML5, CSS3, Bootstrap 5, JavaScript (Vanilla) |
| Back-end     | PHP 8.x          |
| Database     | MySQL            |
| PDF Export   | DomPDF           |
| UI Theme     | Custom + Dark Mode Toggle |

---

## 🚀 Getting Started

### 📦 Requirements

- PHP 8.x or higher
- MySQL Server
- Composer (for dependencies)
- Local server (e.g., XAMPP, MAMP, or `php -S`)
- phpMyAdmin (recommended for database management)

### 🔧 Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/CRUDMoviesPHP.git
   cd CRUDMoviesPHP
   ```

2. **Install dependencies:**

   ```bash
   composer install
   ```

3. **Set up the database:**

   - Create a new MySQL database (e.g. `crud_movies_db`)
   - Import your own schema or let the app create tables on first use
   - Configure the database credentials in `db.php`

4. **Run the project locally:**

   ```bash
   php -S localhost:8000
   ```

5. **Access in browser:**

   ```
   http://localhost:8000
   ```

---

## 🗂️ Project Structure

```
CRUDMoviesPHP/
├── assets/             # JavaScript & CSS (incl. dark mode)
├── vendor/             # Composer dependencies (includes DomPDF)
├── create.php          # Add new movie/series
├── edit.php            # Edit existing entry
├── delete.php          # Delete entry
├── exportPdf.php       # Export current list to PDF
├── genres.js           # Genre options (dynamic)
├── platforms.js        # Platform list (externalized)
├── index.php           # Main view
├── search.php          # Search & filter
├── store.php           # Save new entries to DB
├── update.php          # Update entries in DB
├── db.php              # Database connection
├── header.php/footer.php # Layout files
```

---

## 🖼️ Screenshots

> _Add your screenshots here for better showcase!_

Example:

![Screenshot](screenshots/dashboard.png)

---

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---

## 🤝 Author

Developed with 💻 and ☕ by **Salvador Castro**  
📧 salvacastro06@gmail.com  
🔗 [GitHub](https://github.com/salvador-castro)

---

> Contributions are welcome! Feel free to fork this repo, open issues, or suggest improvements 🙌
