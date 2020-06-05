<h1>Termék módosítása</h1>
<form action="<?= ADMIN_PAGE ?>?edit&id=<?= $_GET['id'] ?>" method="post">
    <div class="form-group">
        <label for="id">Azonosító</label>
        <input type="text" disabled id="id" name="id" class="form-control" value="<?= $record['id'] ?>" />
    </div>
    <div class="form-group">
        <label for="name">Megnevezés</label>
        <input type="text" id="name" name="name" class="form-control" value="<?= $record['name'] ?>" />
    </div>
    <div class="form-group">
        <label for="price">Ár</label>
        <input type="number" id="price" name="price" class="form-control" value="<?= $record['price'] ?>">
    </div>
    <div class="form-group">
        <label for="stock">Készlet</label>
        <input type="number" id="stock" name="stock" class="form-control" value="<?= $record['stock'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Mentés</button>
    <a class="btn btn-link" href="<?= ADMIN_PAGE ?>">Mégse</a>
</form>