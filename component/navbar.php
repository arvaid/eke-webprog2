<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= INDEX_PAGE ?>">Webshop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Kosár: <?= cart_count() ?> termék</a>
      </li>
      <?php if (user_logged_in()) : ?>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Beállítások</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Kijelentkezés</a>
        </li>
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Bejelentkezés</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Regisztráció</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>