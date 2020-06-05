<h1>Termékek</h1>
<div class="row" style="margin-bottom: 15px">
    <form action="<?= ADMIN_PAGE ?>?import" method="post" enctype="multipart/form-data" class="form-inline">
        <a href="<?= ADMIN_PAGE ?>?new" class="btn btn-primary btn-sm">
            Új hozzáadása
        </a>
        &nbsp;
        <input type="file" id="file" name="file" accept=".csv" class="form-control" />
        <button type="submit" value="1" id="submit" name="submit" class="btn btn-sm btn-link">
            Adatok importálása
        </button>
        &nbsp;
        <a href="<?= ADMIN_PAGE ?>?export" target="_blank" class="btn btn-sm btn-link">
            Exportálás
        </a>
    </form>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>megnevezés</th>
                <th>ár</th>
                <th>készlet</th>
                <th>műveletek</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (product_get_all() as $product) : ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td>
                        <a href="<?= PRODUCT_PAGE ?>?id=<?= $product['id'] ?>" target="_blank">
                            <?= $product['name'] ?>
                        </a>
                    </td>
                    <td><?= number_format($product['price'], 0, '.', ' ') ?> Ft</td>
                    <td><?= $product['stock'] ?></td>
                    <td>
                        <a href="<?= ADMIN_PAGE ?>?edit&id=<?= $product['id'] ?>">
                            módosít
                        </a>
                        <a href="<?= ADMIN_PAGE ?>?delete&id=<?= $product['id'] ?>">
                            töröl
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>