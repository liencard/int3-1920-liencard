<h1 class="title">Webshop</h1>
<a class="back__btn" href="index.php">terug naar overview</a>

<section class="book">

<div class="book__info">
  <h2 class="book__title"><?php echo $product['title']; ?></h2>
  <p class="book__author"><?php echo $product['author']; ?><p>

  <div class="book__wrapper--mini">
    <p class="book__lang">Nederlands</p>
    <p class="book__pages">204blz.</p>
  </div>

  <p class="book__description"><?php echo $product['description']; ?></p>

  <form action="index.php" method="get" class="book-type">
    <label for="booktype">
      <input class="filter__input" type="radio" id="booktype" name="filter" value="hardcover">
      <div class="booktype__wrapper">
        <span>Hardcover</span>
        <span>€12,99</span>
      </div>

      <input class="filter__input" type="radio" id="booktype" name="filter" value="ebook">
      <div class="booktype__wrapper">
        <span>E-book</span>
        <span>€1,99</span>
      </div>
    </label>
  </form>

  <a class="btn order__btn" href="index.php?page=detail&id=<?php echo $product['id']; ?>" >+ <img srcset="./assets/img/cart.svg" sizes="16px" src="./assets/img/cart.svg" alt="cart vector"> Toevoegen aan winkelmandje</a>


  <div class="buy__info">
    <p>Voor <span class="bold">18:00</span> besteld, <span class="bold">volgende dag</span> geleverd</p>
    <p>Vanaf €50, <span class="bold">gratis thuislevering</span></p>
    <p><span class="bold">Gratis</span> binnen de 30 dagen <span class="bold">retourneren</span></p>
  </div>

</div>

<img class="book__img" srcset="<?php echo $product['image']; ?>" sizes="15px" src="image" alt="boekcover The Road">
</section>
