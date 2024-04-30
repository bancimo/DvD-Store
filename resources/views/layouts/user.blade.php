<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMovie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container-fluid">
            <div class="container d-flex align-items-center">
                <img src="../img/logo.svg" alt="movieicon " style="height: 50px;">
                <a class="navbar-brand text-light fs-4" href="/">MyMovie</a>
            </div>
          
            <div class="d-flex mx-3 ">
                <button class="btn btn-success me-2" type="submit"><a href="/register" class="nav-link text-light">Register</a></button>
                <button class="btn btn-primary" type="submit"><a href="/login" class="nav-link text-light">Login</a></button>
            </div>
        </div>
      </nav>

      @yield('home')
      
      <script src="js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>