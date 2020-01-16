<section class="process__order">
  <!-- process bar -->
  <h1 class="title">Jouw bestelling</h1>
</section>

<section class="orders">
  <h2 class="hidden">Orders</h2>

  <?php if (!empty($_SESSION['cart'])): ?>
    <form action="index.php?page=cart" method="post" id="cart--form" class="cart__form">

      <div class="table__wrapper">
        <table class='cart__table'>
          <thead class="table__head">
            <tr>
              <th class='head__image'>Item</th>
              <th class='head__info'></th>
              <th class='head__price'>Prijs</th>
              <th class='head__quantity'>Aantal</th>
              <th class='head__total'>Totaal</th>
              <th class='head__remove'></th>
            </tr>
          </thead>

          <tbody class="table__body">
          <?php
            $total = 0;
            foreach($_SESSION['cart'] as $item) {
              $itemTotal = number_format($item['product']['price'] * $item['quantity'], 2);
              $total += $itemTotal;
            ?>

            <tr class="item">
              <td class='item__image'>
                <a href="index.php?page=detail&amp;id=<?php echo $item['product']['id'];?>">
                  <img class="xxx" srcset="<?php echo $item['product']['tumbnail'];?>" sizes="15px" src="<?php echo $item['product']['tumbnail'];?>" alt="xxx">
                </a>
              </td>
              <td class='item__info'>
                <p class="item__title"><?php echo $item['product']['title'];?><p>
                <p class="item__subtitle"><?php echo $item['product']['subtitle'];?><p>
                <p class="item__option"><?php echo $item['product']['name'];?><p>
              </td>
              <td class='price'>€<?php echo $item['product']['price'];?></td>
              <td class='quantity'> <input class="quantity" type="text" name="quantity[<?php echo $item['product']['id'];?>]" value="<?php echo $item['quantity'];?>"/> </td>
              <td class='total'>€<?php echo $itemTotal;?></td>
              <td class='item__remove'><button type="submit" class="btn__remove" name="remove" value="<?php echo $item['product']['id'];?>"><img src="./assets/img/icon-remove.svg"  alt="remove" /></button></td>
            </tr>
            <?php } ?>
          </tbody>
          <button type="submit" class="btn btn__update" name="action" value="update">Update</button>
        </table>
      </div>

      <section class="overview">
        <h2 class="overview__title">Overview</h2>

        <div class="overview__wrapper">
          <div class="overview__subtotaal">
            <p>Subtotaal</p>
            <p>€<?php echo $total;?></p>
          </div>
          <div class="overview__shipping">
            <p>Verzendkosten</p>
            <p>Gratis</p>
          </div>
          <p class="overview--minitext">Gratis vanaf €50</p>
        </div>

        <div class="checkout">
          <div class="total__wrapper">
            <p class="total__text">Te betalen</p>
            <p class="total__price">€<?php echo $total;?></p>
          </div>
          <button type="submit" id="checkout" class="btn btn__uitchecken" name="action" value="checkout">Uitchecken</button>
        </div>
      </section>

     </form>

    <?php else: ?>

     <div class="cart__empty">
       <p class="cart__empty-text">Oeps, er zit nog niets in je winkelmandje!</p>
       <a class="btn btn__empty" href="index.php?page=index">Bekijk producten</a>
     </div>
    <?php endif; ?>




</section>
