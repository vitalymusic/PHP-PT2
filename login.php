<!DOCTYPE html>
<html lang="lv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ielogoties</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

  <div class="container" style="max-width: 400px;">
    <div class="card shadow-sm p-4">
      <h1 class="text-center mb-4">Ielogoties</h1>

      <?php session_start(); ?>

      <?php if (isset($_SESSION["error"])): ?>
        <div class="alert alert-danger text-center">
          <?= htmlspecialchars($_SESSION["error"]) ?>
        </div>
      <?php endif; ?>

      <form action="save.php" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Lietotājvārds</label>
          <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Parole</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Ieiet</button>
      </form>

      <div class="mt-3">
        <pre class="small text-muted"></pre>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (neobligāts, ja nav dinamisko komponentu) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
