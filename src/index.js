require('./style.css');
// require('./js/scratch.js');
// require('./js/validate.js');

{
  const handleClickImage = e => {
    e.preventDefault();
    // path naar afbeelding ophalen
    const $link = e.currentTarget;
    const src = $link.querySelector(`img`).getAttribute(`src`);
    console.log(src);
    // path van grote afbeelding overschrijven
    document.querySelector(`#product-image img`).setAttribute(`srcset`, src);

    const path = window.location.href.split('?')[0];
    const qs = $link.getAttribute(`href`).split('?')[1];
    window.history.pushState({}, '', `${path}?${qs}`);
  };

  const handleChangeFilter = e => {
    const type = e.target.value;
    const path = window.location.href.split(`?`)[0];
    const qs = `?type=${type}`;
    getProducts(`${path}${qs}`);
  };

  const getProducts = async url => {
    const response = await fetch(url, {
      headers: new Headers({
        Accept: 'application/json'
      })
    });
    const products = await response.json();

    window.history.pushState({}, ``, url);
    showProducts(products);
    console.log(products);
  };

  const showProducts = products => {
    const $list = document.querySelector('.products');
    $list.innerHTML = ``;
    products.forEach(product => {
      $list.innerHTML += `
        <article class="product">
          <div class="product__info">
            <div class="product__head">
              <h3 class="product__title">${product.title}</h3>
              <p class="product__subtitle">${product.subtitle}</p>
            </div>
            <div class="product__buy">
              <p class="product__price">${product.priceinfo}</p>
              <a class="product__btn" href="index.php?page=detail&id=${product.id}" >+ <img srcset="./assets/img/cart.svg" sizes="16px" src="./assets/img/cart.svg" alt="cart vector"></a>
            </div>
          </div>
          <a class="product__link" href="index.php?page=detail&id=${product.id}" ><img class="product__img" srcset=".${product.image}" sizes="15px" src="${product.image}" alt="${product.title}"></a>
        </article>`;
    });
  };

  const init = () => {
    const $imageLinks = document.querySelectorAll(`.product-image-link`);
    $imageLinks.forEach($link => $link.addEventListener(`click`, handleClickImage));

    document.documentElement.classList.add('has-js');
    document.querySelectorAll('.filter__form').forEach($select => $select.addEventListener('change', handleChangeFilter));
  };

  init();
}
