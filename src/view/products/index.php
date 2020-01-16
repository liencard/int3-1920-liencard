<h1 class="title">Webshop</h1>

<!-- FILTERS -->
<section class="filters">
  <h2 class="hidden">Filter</h2>
  <p>14 results</p>

  <form action="index.php" method="get" class="filter__form">
    <label>
      <input type="radio" class="filter__input" name="type" value="all">
      <span class="filter__text">alles</span>
    </label>
    <?php foreach($types as $type): ?>
      <label class="xx">
        <input type="radio" class="filter__input" name="type" value="<?php echo $type['type'] ?>">
        <span class="filter__text"><?php echo $type['type'] ?></span>
      </label>
    <?php endforeach; ?>
    <input type="submit" class="filter__submit" value="filter">
  </form>

  <!-- <select name="type" id="type" class="filter-type">
    <option value="all">-- Alles --</option>
    <option value="all">A-Z</option>
    <option value="all">Z-A</option>
  </select> -->

</section>


<!-- HIGHLIGHTS -->
<section class="highlights">
  <h2 class="hidden">Highlight</h2>
  <article class="highlight highlight__book">
    <div class="highlight__wrapper">
      <h3 class="highlight__title">Promoboek <br> van de week</h3>
      <p class="highlight__subtitle">Vind je kortingscode op de flap <br> van HUMO deze week</p>
      <a class="highlight__btn" href="index.php?page=detail&id=8">Meer info</a>
    </div>
    <img class="highlight__img" srcset="./assets/img/the-road-1.jpg" sizes="15px" src="./assets/img/the-road-1.jpg" alt="boekcover The Road">
  </article>
  <article class="highlight highlight__abbo">
    <div class="highlight__wrapper">
      <h3 class="highlight__title">Lees geen <br> andere onzin,<br> <span class="color--red">abonneer je nu!<span></h3>
      <a class="highlight__btn" href="index.php?page=detail&id=15">Bekijk aanbod</a>
    </div>
    <img class="highlight__img" srcset="./assets/img/the-road-1.jpg" sizes="15px" src="./assets/img/the-road-1.jpg" alt="boekcover The Road">
  </article>
</section>


<!-- PRODUCTS -->
<section class="products">
  <h2 class="hidden">Producten</h2>
  <?php foreach ($products as $product): ?>
    <article class="product">
      <div class="product__info">
        <div class="product__head">
          <h3 class="product__title"><?php echo $product['title']; ?></h3>
          <p class="product__subtitle"><?php echo $product['subtitle']; ?></p>
        </div>
        <div class="product__buy">
          <p class="product__price"><?php echo $product['priceinfo']; ?></p>
          <a class="product__btn" href="index.php?page=detail&id=<?php echo $product['id']; ?>" >+ <img srcset="./assets/img/cart.svg" sizes="16px" src="./assets/img/cart.svg" alt="cart vector"></a>
        </div>
      </div>
      <a class="product__link" href="index.php?page=detail&id=<?php echo $product['id']; ?>" ><img class="product__img" srcset=".<?php echo $product['image']; ?>" sizes="15px" src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>"></a>
    </article>
  <?php endforeach; ?>
</section>
