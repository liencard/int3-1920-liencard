<h1 class="title">Webshop</h1>

<section class="filters">
  <h2 class="hidden">Filter</h2>

  <p>14 results</p>

  <form action="index.php" method="get" class="filter-form">

    <label for="all">
      <input class="filter__input" type="radio" id="all>" name="filter" value="all">
      <span>alles</span>

      <input class="filter__input" type="radio" id="all" name="filter" value="book">
      <span>boeken</span>

      <input class="filter__input" type="radio" id="all" name="filter" value="extra">
      <span>extra</span>
    </label>

    <input type="submit" class="filter__submit" value="filter">
  </form>


  <select name="type" id="type" class="filter-type">
    <option value="all">-- Alles --</option>
    <option value="all">A-Z</option>
    <option value="all">Z-A</option>
  </select>

</section>


<section class="products">
  <h2 class="hidden">Producten</h2>

  <?php foreach ($products as $product): ?>
    <article class="product">
      <div class="product__info">
        <h3 class="product__title"><?php echo $product['title']; ?></h3>
        <p class="product__subtitle"><?php echo $product['author']; ?></p>
        <div class="product__buy">
          <p class="product__price">€12,99</p>
          <a class="product__btn" href="index.php?page=detail&id=<?php echo $product['id']; ?>" >+ <img srcset="./assets/img/cart.svg" sizes="16px" src="./assets/img/cart.svg" alt="cart vector"></a>
        </div>
      </div>
      <img class="product__img" srcset="./assets/img/farenheit451.jpg 15w" sizes="15px" src="./assets/img/farenheit451.jpg " alt="boekcover farenheit 451">
    </article>
  <?php endforeach; ?>

</section>
