<section class="process__order process__order--payement">
   <div class="process__bar">
    <a href="index.php?page=cart"><img class="process__img" srcset="./assets/img/step1--done.svg" sizes="34px" src="./assets/img/step1--done.svg" alt="Step 1 icon"></a>
    <div class="step-line step-line--red"></div>
    <a href="index.php?page=checkout"><img class="process__img" srcset="./assets/img/step2--done.svg" sizes="34px" src="./assets/img/step2--done.svg" alt="Step 2 icon"></a>
    <div class="step-line step-line--red"></div>
    <img class="process__img" srcset="./assets/img/step3--red.svg" sizes="34px" src="./assets/img/step3--red.svg" alt="Step 3 icon">
    <div class="step-line"></div>
    <img class="process__img" srcset="./assets/img/step4.svg" sizes="34px" src="./assets/img/step4.svg" alt="Step 4 icon">
  </div>
  <h1 class="title">Betalen</h1>
</section>

<section class="method">
  <h2 class="method__title">Kies je betaalwijze</h2>

  <div class="payment__wrapper">
    <label>
      <input class="payment__input" type="radio" name="option_id" value="mastercard">
      <div class="payment__border">
        <img class="payment__img" srcset="./assets/img/logo-mastercard.svg" sizes="15px" src="./assets/img/logo-mastercard.svg" alt="Mastercard">
      </div>
    </label>

    <label>
      <input class="payment__input" type="radio" name="option_id" value="mastercard">
      <div class="payment__border">
        <img class="payment__img" srcset="./assets/img/maestro-logo.png" sizes="15px" src="./assets/img/maestro-logo.png" alt="Mastercard">
      </div>
    </label>
    <label>
      <input class="payment__input" type="radio" name="option_id" value="mastercard">
      <div class="payment__border">
        <img class="payment__img" srcset="./assets/img/paypal-logo.jpg" sizes="15px" src="./assets/img/paypal-logo.jpg" alt="Mastercard">
      </div>
    </label>
    <label>
      <input class="payment__input" type="radio" name="option_id" value="mastercard">
      <div class="payment__border">
        <img class="payment__img" srcset="./assets/img/visa-logo.webp" sizes="15px" src="./assets/img/visa-logo.webp" alt="Mastercard">
      </div>
    </label>
  </div>

  <div class="button__wrapper">
    <a class="btn btn__payment" href="index.php?page=confirmation">Bestelling afronden</a>
    <p class="btn__payment--text">* Je wordt doorverwezen naar een extere betaalpagina</p>
  </div>
  <a class="back__btn" href="index.php?page=checkout">Terug naar je gegevens</a>
</section>
