<form action="<?= USER_PAGE ?>" method="post">
    <div class="form-group">
        <label for="email">Email cím</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= $user['email'] ?>">
    </div>
    <div class="form-group">
        <label for="last_name">Vezetéknév</label>
        <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $user['last_name'] ?>">
    </div>
    <div class="form-group">
        <label for="first_name">Keresztnév</label>
        <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $user['first_name'] ?>">
    </div>
    <div class="form-group">
        <label for="zipcode">Irányítószám</label>
        <input type="text" name="zipcode" id="zipcode" class="form-control" value="<?= $user['zipcode'] ?>">
    </div>
    <div class=" form-group">
        <label for="city">Város</label>
        <input type="text" name="city" id="city" class="form-control" value="<?= $user['city'] ?>">
    </div>
    <div class=" form-group">
        <label for="address">Cím</label>
        <input type="text" name="address" id="address" class="form-control" value="<?= $user['address'] ?>">
    </div>
    <div class="form-group">
        <input type="submit" value="Mentés" class="btn btn-primary" />
    </div>
</form>