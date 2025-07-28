<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Veon's Webserver Dashboard</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
    crossorigin="anonymous" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
</head>

<body class="d-flex align-items-center justify-content-center vh-100 font-monospace">
  <div class="container text-center border rounded-3">
    <p class="fs-3 fw-bold pt-3">
      <i class="bi bi-server"></i> Veon's
      <span class="text-body-secondary">Webserver Dashboard</span>
    </p>
    <div class="container-sm">
      <p>
        If you're wondering why I created this, it's because I was tired of
        using XAMPP, and I received an error when I closed it improperly. I
        made it in Docker because I think it's more flexible, and I have more
        control over my web server because I built it.
      </p>
      <div class="container">
        <p class="fw-bold">Services</p>
        <button class="btn btn-primary" onclick='gotoPage()'><i class="bi bi-database-fill-gear"></i> PhpMyAdmin</button>
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-database-fill-gear"></i> Pages</button>
        <ul class="dropdown-menu">
          <?php
          $dir = "../";
          $dir_array = scandir($dir);
          foreach ($dir_array as $dir) {
            if (!($dir == "." || $dir == ".." || $dir == "dashboard" || $dir == "index.php"))
              echo "<li><a class='dropdown-item' href='../$dir'>$dir</a></li>";
          }
          ?>
        </ul>
      </div>
      <div class="container">
        <footer class="py-3 text-success">v0.0.1</footer>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
    <script>
      const gotoPage = (page) => {
        const currentURL = window.location.href;
        const newURL = currentURL.replace("dashboard", page);

        window.location.href = newURL; // Optional: navigate to new URL
        return newURL; // Return the new URL
      };

      const gotoURL = (url) => {
        window.location.href = url
      }
    </script>
</body>

</html>