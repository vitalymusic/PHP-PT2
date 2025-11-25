<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Mana Lapa</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="index.php?page=sec1" class="nav-link <?= $page == 'sec1' ? 'active' : '' ?>">Saite 1</a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=sec2" class="nav-link <?= $page == 'sec2' ? 'active' : '' ?>">Saite 2</a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=sec3" class="nav-link <?= $page == 'sec3' ? 'active' : '' ?>">Raksti</a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=sec4" class="nav-link <?= $page == 'sec4' ? 'active' : '' ?>">Bilžu galerija</a>
        </li>
      </ul>
    </div>
  </div>
</nav>