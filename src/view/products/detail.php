<h1 class="title">Webshop</h1>
<a class="back__btn" href="index.php">terug naar overview</a>

<section class="book">

  <div class="book__info">
    <h2 class="book__title"><?php echo $product['title']; ?></h2>
    <p class="book__subtitle"><?php echo $product['subtitle']; ?><p>

    <?php if ($product['type'] === 'boek'): ?>
      <div class="book__wrapper--mini">
        <p class="book__lang">Nederlands</p>
        <p class="book__pages"><?php echo $product['extra']; ?></p>
      </div>
    <?php endif; ?>
    <p class="book__description"><?php echo $product['description']; ?></p>

    <form action="index.php?page=cart" method="post" class="form__option">
      <input type="hidden" name="product_id" value="<?php echo $product['id'];?>" />
      <div class="options__wrapper options__wrapper--big">
        <?php foreach($options as $index => $option): ?>
          <?php if ($option['name'] != 'No option'): ?>
            <label>
              <input class="option__input" type="radio" name="option_id" value="<?php echo $option['id'] ?>" <?php if ($index === 0) { echo 'checked';}?>>
              <div class="option__wrapper">
                <span><?php echo $option['name'] ?></span>
                <span>€<?php echo $option['price'] ?></span>
              </div>
            </label>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <div class="priceinfo">
        <div class="price__default">
          <p class="price__title">Prijs</p>
          <p class="price__price"><?php echo $product['priceinfo'] ?></p>
        </div>
        <?php if ($product['type'] === 'boek' && $product['id'] != 16 && $product['id'] != 15  ): ?>
        <div class="price__default">
          <p class="price__title">Prijs ebook</p>
          <p class="price__price">€1,99</p>
        </div>
        <div class="price__promo">
          <p class="price__title">Promo</p>
          <p class="price__price">€4,99</p>
        </div>
        <div class="price__text">
          <p>Met <span class="bold">kortingscode</span>, te vinden op de flap van HUMO</p>
        </div>
        <?php endif; ?>
      </div>

      <input class="product__quantity" type="number" name="quantity" value="1" min="1">

      <button class="btn order__btn <?php if(!empty($_SESSION['add'])) { echo 'added__btn';}?>" type="submit" name="action" value="add">
        +<img srcset="./assets/img/cart.svg" sizes="16px" src="./assets/img/cart.svg" alt="cart vector">
        <?php if(!empty($_SESSION['add'])) { echo $_SESSION['add'];}
          else { echo 'Toevoegen aan winkelmandje'; }
        ?>
      </button>
    </form>

    <div class="buy__info">
      <h3>BEZORGING</h3>
      <p>Voor <span class="bold">18:00</span> besteld, <span class="bold">volgende dag</span> geleverd</p>
      <p>Vanaf €50, <span class="bold">gratis thuislevering</span></p>
      <p><span class="bold">Gratis</span> binnen de 30 dagen <span class="bold">retourneren</span></p>
    </div>

  </div>

  <div class="image__wrapper">
    <div id="product-image">
      <img class="book__img" srcset="<?php echo $product['tumbnail']; ?>" sizes="15px" src="<?php echo $product['tumbnail']; ?>" alt="boekcover The Road">
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
