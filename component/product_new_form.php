<h1>Termék hozzáadása</h1>
<form action="<?= ADMIN_PAGE ?>?new" method="post">
    <div class="form-group">
        <label for="name">Megnevezés</label>
        <input type="text" id="name" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="price">Ár</label>
        <input type="number" id="price" name="price" class="form-control">
    </div>
    <div class="form-group">
        <label for="stock">Készlet</label>
        <input type="number" id="stock" name="stock" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Mentés</button>
    <a class="btn btn-link" href="<?= ADMIN_PAGE ?>">Mégse</a>
</form>