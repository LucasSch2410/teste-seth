# How to use

```bash
$ git clone https://github.com/LucasSch2410/teste-seth.git
```

---

# Back End
```bash
# Go To BackEnd directory
$ cd laravel-crud-api

# Build the image
$ docker compose build

# Start the container
$ docker compose up

# Open a new terminal and migrate the database
$ docker exec laravelapp php artisan migrate
```

---

# Front End
```bash
# Go To FrontEnd directory
$ cd app

# Install dependencies
$ npm install

# Start the server
$ npm run dev

# You can access the application at this URL:
http://localhost:5173/
```