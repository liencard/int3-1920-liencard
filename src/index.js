require('./style.css');

import Product from './js/model/Product.js';
import './js/validate.js';
import './js/scratch.js';
//import './js/scroll.js';
//import './js/lalala.js';
//import './js/text.js';


{
  const $products = document.querySelector('.products');

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
    $products.innerHTML = products
      .map(product => createProduct(product))
      .join(``);
  };

  const createProduct = productObj => {
    const product = new Product(productObj);
    console.log(productObj);
    return product.createHTML();
  };

  const init = () => {

    const $imageLinks = document.querySelectorAll(`.product-image-link`);
    $imageLinks.forEach($link => $link.addEventListener(`click`, handleClickImage));

    document.documentElement.classList.add('has-js');
    document.querySelectorAll('.filter__form').forEach($select => $select.addEventListener('change', handleChangeFilter));

    console.log('index');
  };

  init();
}
