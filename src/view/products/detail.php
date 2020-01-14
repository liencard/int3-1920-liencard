<h1 class="title">Webshop</h1>
<a class="back__btn" href="index.php">terug naar overview</a>

<section class="book">

  <div class="book__info">
    <h2 class="book__title"><?php echo $product['title']; ?></h2>
    <p class="book__subtitle"><?php echo $product['subtitle']; ?><p>

    <div class="book__wrapper--mini">
      <p class="book__lang">Nederlands</p>
      <p class="book__pages">204blz.</p>
    </div>

    <p class="book__description"><?php echo $product['description']; ?></p>

    <form action="index.php" method="get" class="form__option">
      <div class="options__wrapper">
        <?php foreach($options as $option): ?>
          <?php if ($option['name'] != 'No option'): ?>
            <label>
              <input class="option__input" type="radio" name="option" value="<?php echo $option['id'] ?>">
              <div class="option__wrapper">
                <span><?php echo $option['name'] ?></span>
                <span>€<?php echo $option['price'] ?></span>
              </div>
            </label>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </form>

    <a class="btn order__btn" href="index.php?page=detail&id=<?php echo $product['id']; ?>" >+ <img srcset="./assets/img/cart.svg" sizes="16px" src="./assets/img/cart.svg" alt="cart vector"> Toevoegen aan winkelmandje</a>

    <div class="buy__info">
      <p>Voor <span class="bold">18:00</span> besteld, <span class="bold">volgende dag</span> geleverd</p>
      <p>Vanaf €50, <span class="bold">gratis thuislevering</span></p>
      <p><span class="bold">Gratis</span> binnen de 30 dagen <span class="bold">retourneren</span></p>
    </div>

  </div>

  <div class="image__wrapper">
    <div id="product-image">
      <img class="book__img" srcset="<?php echo $product['image']; ?>" sizes="15px" src="<?php echo $product['image']; ?>" alt="boekcover The Road">
    </div>

    <ul class="images__viewer">
      <?php foreach($images as $image): ?>
        <li>
          <a class="product-image-link" href="index.php?page=detail&amp;id=<?php echo $product['id']; ?>&amp;image=<?php echo $image['id']; ?>">
            <img class="minibook__img" srcset="<?php echo $image['image']; ?>" sizes="15px" src="<?php echo $image['image']; ?>" alt="images product">
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
