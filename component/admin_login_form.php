<h1>Admin bejelentkezés</h1>
<form action="<?= ADMIN_PAGE ?>?login" method="post">
    <div class="form-group">
        <label for="username">Felhasználónév</label>
        <input id="username" name="username" type="text" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">Jelszó</label>
        <input id="password" name="password" type="password" class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" value="Bejelentkezés" class="btn btn-primary" />
    </div>
</form>