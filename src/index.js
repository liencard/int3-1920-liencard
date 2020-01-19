require('./style.css');
require('./js/scratch.js');
require('./js/validate.js');

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


  const init = () => {
    const $imageLinks = document.querySelectorAll(`.product-image-link`);
    $imageLinks.forEach($link => $link.addEventListener(`click`, handleClickImage));
  };

  init();
}
