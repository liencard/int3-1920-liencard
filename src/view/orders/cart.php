<section class="process__order">
  <!-- process bar -->
  <h1 class="title">Jouw bestelling</h1>
</section>

<section>
  <h2 class="hidden">Orders</h2>

  <?php if (empty($_SESSION['cart'])): ?>
    <form action="index.php?page=cart" method="post" id="cart__form">
      <table class='cart-table'>
        <thead>
          <tr>
            <th class='product-description' colspan='2'>Item</th>
            <th class='price'>Prijs</th>
            <th class='quantity'>Aantal</th>
            <th class='total'>Totaal</th>
            <th class='remove-item'></th>
          </tr>
        </thead>

        <tbody>
          <tr class="item">
            <td class='item__image'>
              <a href="index.php?page=detail&amp;id=3"">
                <img class="xxx" srcset="./assets/img/the-road-1.jpg" sizes="15px" src="./assets/img/the-road-1.jpg" alt="xxx">
              </a>
            </td>
            <td class='item__title'>The Road</td>
            <td class='price'>€12,99</td>
            <td class='quantity'> <input class="quantity" type="text" name="quantity" value="3"/> </td>
            <td class='total'>€12,99</td>
            <td class='item__remove'><button type="submit" class="btn__remove" name="remove" value="xx"><img src="./assets/img/icon-remove.svg"  alt="remove" /></button></td>
          </tr>
        </tbody>
        </table>

        <!-- <div class='cart-end'>
          <div class="cart-wrapper">
            <p class='order-total'><span>total:</span>€ <?php echo $total;?>,00</p>
            <div class="cart-buttons">
              <button type="submit" id="update-cart" class="btn btn--light btn--button" name="action" value="update">Update</button>
              <button type="submit" id="checkout" class="btn btn--dark" name="action" value="checkout">Uitchecken</button>
            </div>
          </div>
        </div> -->

     </form>

    <?php else: ?>

     <div class="cart__empty">
       <p class="cart__empty-text">Oeps, er zit nog niets in je winkelmandje!</p>
       <a class="btn btn__empty" href="index.php?page=index">Bekijk producten</a>
     </div>
    <?php endif; ?>




</section>
