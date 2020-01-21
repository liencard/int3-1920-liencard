<section class="process__order">
  <!-- process bar -->
  <div class="process__bar">
    <a href="index.php?page=cart"><img class="process__img" srcset="./assets/img/step1--done.svg" sizes="34px" src="./assets/img/step1--done.svg" alt="Step 1 icon"></a>
    <div class="step-line step-line--red"></div>
    <img class="process__img" srcset="./assets/img/step2--red.svg" sizes="34px" src="./assets/img/step2--red.svg" alt="Step 2 icon">
    <div class="step-line"></div>
    <img class="process__img" srcset="./assets/img/step3.svg" sizes="34px" src="./assets/img/step3.svg" alt="Step 3 icon">
    <div class="step-line"></div>
    <img class="process__img" srcset="./assets/img/step4.svg" sizes="34px" src="./assets/img/step4.svg" alt="Step 4 icon">
  </div>
  <h1 class="title">Persoonlijke Gegevens</h1>
</section>

<section>
  <h2 class="hidden">Checkout form</h2>
  <form action="index.php?page=checkout" method="post" class="checkout__form">

    <div class="checkout__gegevens">
    <input type="hidden" name="action" value="insertCheckout">
      <section class="checkout__mail">
        <h2 class="checkout__title">Contactgegevens</h2>
        <label class="form__label">E-mail
          <span class="error"><?php if(!empty($errors['email'])){ echo $errors['email'];} ?></span>
          <input type="email" class="input" name="email" placeholder="john.doe@domain.com" value="<?php if(!empty($_POST['email'])){ echo $_POST['email'];} ?>" required />
        </label>
        <label class="form__text">
          <input type="checkbox" name="aanbiedingen" />Hou me op de hoogte van nieuws en exclusieve aanbiedingen.
        </label>
      </section>

      <section class="checkout__adres">
        <h2 class="checkout__title">Bezorgadres</h2>

         <label class="form__label">Voornaam
          <span class="error"><?php if(!empty($errors['firstname'])){ echo $errors['firstname'];} ?></span>
          <input type="text" name="firstname" class="input" placeholder="John" value="<?php if(!empty($_POST['firstname'])){ echo $_POST['firstname'];} ?>" required/>
        </label>

        <label class="form__label">Familienaam
          <span class="error"><?php if(!empty($errors['lastname'])){ echo $errors['lastname'];} ?></span>
          <input type="text" name="lastname" class="input" placeholder="Doe" value="<?php if(!empty($_POST['lastname'])){ echo $_POST['lastname'];} ?>" required />
        </label>

        <div class="form--line">
          <label class="form__label">Adres
            <span class="error"><?php if(!empty($errors['adres'])){ echo $errors['adres'];} ?></span>
            <input type="text" name="adres" class="input" placeholder="Straatnaam" value="<?php if(!empty($_POST['adres'])){ echo $_POST['adres'];} ?>" required />
          </label>
          <label class="form__label">Huisnummer
            <span class="error"><?php if(!empty($errors['housenumber'])){ echo $errors['housenumber'];} ?></span>
            <input type="number" name="housenumber" class="input" placeholder="Nr." min="1" value="<?php if(!empty($_POST['housenumber'])){ echo $_POST['housenumber'];} ?>" required />
          </label>
        </div>

        <div class="form--line">
          <label class="form__label">Postcode
            <span class="error"><?php if(!empty($errors['postcode'])){ echo $errors['postcode'];} ?></span>
            <input type="number" name="postcode" class="input postcode" placeholder="Postcode"  min="1000" max="9999" value="<?php if(!empty($_POST['postcode'])){ echo $_POST['postcode'];} ?>" required />
          </label>
          <label class="form__label">Gemeente
            <span class="error"><?php if(!empty($errors['city'])){ echo $errors['city'];} ?></span>
            <input type="text" name="city" class="input" placeholder="Gemeente" value="<?php if(!empty($_POST['city'])){ echo $_POST['city'];} ?>" required />
          </label>
        </div>

        <label class="form__text">
          <input type="checkbox" name="terms" />Ik ga akkoort met de <a href="#" class="terms__link">algemende voorwaarde</a>.
        </label>

      </section>
    </div>

    <div class="checkout__overview">
      <h2 class="checkout__title">Besteloverzicht <span class="checkout__title--extra"><?php echo $numItems;?> artikels</span></h2>
      <?php
        $total = 0;
        $Oldtotal = 0;
          foreach($_SESSION['cart'] as $item) {
            $itemTotal = number_format($item['price'] * $item['quantity'], 2);
            $total += $itemTotal;
            $itemOldTotal = number_format($item['product']['price'] * $item['quantity'], 2);
            $Oldtotal += $itemOldTotal;
      ?>
      <div class="wrapper__orderoverview">
        <img class="orderoverview__img" srcset="<?php echo $item['product']['tumbnail'];?>" sizes="15px" src="<?php echo $item['product']['tumbnail'];?>" alt="product tumbnail">
        <div class="wrapper__orderinfo">
          <p class="item__title"><?php echo $item['product']['title'];?></p>
          <p class="item__option"><?php echo $item['product']['name'];?></p>
        </div>
        <p><?php echo $item['quantity'];?>x</p>
        <p>€<?php echo $itemTotal;?></p>
      </div>
      <?php } ?>
      <div class="checkout__subtotaal">
        <p>Subtotaal</p>
        <p>€<?php echo $total;?></p>
      </div>
    </div>

    <div class="checkout order__pay">
      <div class="total__wrapper">
        <p class="total__text">Te betalen</p>
        <p class="total__price">€<?php echo $total;?></p>
      </div>
      <button type="submit" class="btn btn__uitchecken">Betalen</button>
    </div>

  </form>
  <a class="back__btn back__checkout" href="index.php?page=cart">Terug naar je bestelling</a>

</section>
