 <h2>
     A kosár tartalma: <?= cart_count() ?> termék, összesen <?= number_format(cart_total(), 0, '.', ' ') ?> Ft.
 </h2>
 <table class="table">
     <thead>
         <tr>
             <th>megnevezés</th>
             <th>egységár</th>
             <th>mennyiség</th>
             <th>töröl</th>
         </tr>
     </thead>
     <tbody>
         <?php foreach (get_cart() as $product) : ?>
             <tr>
                 <td><?= $product['name'] ?></td>
                 <td><?= number_format($product['price'], 0, '.', ' ') ?> Ft</td>
                 <td>
                     <?= $product['amount'] ?>
                     <a href="<?= CART_PAGE ?>?increase_amount&id=<?= $product['id'] ?>">
                         +
                     </a>
                     /
                     <?php if ($product['amount'] > 1) : ?>
                         <a href="<?= CART_PAGE ?>?decrease_amount&id=<?= $product['id'] ?>">
                             -
                         </a>
                     <?php else : ?>
                         -
                     <?php endif; ?>
                 </td>
                 <td>
                     <a href="<?= CART_PAGE ?>?remove&id=<?= $product['id'] ?>">
                         <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                             <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z" />
                             <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd" />
                         </svg>
                     </a>
                 </td>
             </tr>
         <?php endforeach; ?>
     </tbody>
 </table>
 <button class="btn btn-primary" <?php if (cart_total() == 0) : ?> disabled <?php endif; ?>>
     Tovább a rendeléshez
 </button>
 <a href="<?= CART_PAGE ?>?clear">
     <button class="btn btn-link" <?php if (cart_total() == 0) : ?> disabled <?php endif; ?>>
         Kosár ürítése
     </button>
 </a>