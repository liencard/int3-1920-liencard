{
  const handleSubmitForm = e => {
    const $form = e.currentTarget;
    if (!$form.checkValidity()) {
      e.preventDefault();

      const fields = $form.querySelectorAll(`.input`);
      fields.forEach(showValidationInfo);

    } else {
      console.log(`Form is valid => submit form`);
    }
  };

  const showValidationInfo = $field => {
    let message;
    if ($field.validity.valueMissing) {
      message = `Veld is verplicht`;
    }
    if ($field.validity.typeMismatch) {
      message = `Type is niet correct`;
    }
    if ($field.validity.rangeOverflow) {
      const max = $field.getAttribute(`max`);
      message = `Te groot, max ${max}`;
    }
    if ($field.validity.rangeUnderflow) {
      const min = $field.getAttribute(`min`);
      message = `Te klein, min ${min}`;
    }
    if ($field.validity.tooShort) {
      const min = $field.getAttribute(`minlength`);
      message = `Te kort, minimum lengte is ${min}`;
    }
    if ($field.validity.tooLong) {
      const max = $field.getAttribute(`maxlength`);
      message = `Te lang, maximum lengte is ${max}`;
    }
    if (message) {
      $field.parentElement.querySelector(`.error`).textContent = message;
    }
  };

  const handeInputField = e => {
    const $field = e.currentTarget;
    if ($field.checkValidity()) {
      $field.parentElement.querySelector(`.error`).textContent = ``;
      if ($field.form.checkValidity()) {
        $field.form.querySelector(`.error`).innerHTML = ``;
      }
    }
  };

  const handeBlurField = e => {
    const $field = e.currentTarget;
    showValidationInfo($field);
  };

  const addValidationListeners = fields => {
    fields.forEach($field => {
      $field.addEventListener(`input`, handeInputField);
      $field.addEventListener(`blur`, handeBlurField);
    });
  };

  // const handleClickImage = e => {
  //   e.preventDefault();
  //   // path naar afbeelding ophalen
  //   const $link = e.currentTarget;
  //   const src = $link.querySelector(`img`).getAttribute(`src`);
  //   console.log(src);
  //   // path van grote afbeelding overschrijven
  //   document.querySelector(`#product-image img`).setAttribute(`srcset`, src);

  //   const path = window.location.href.split('?')[0];
  //   const qs = $link.getAttribute(`href`).split('?')[1];
  //   window.history.pushState({}, '', `${path}?${qs}`);
  // };

  // const handleChangeFilter = e => {
  //   const type = e.target.value;
  //   const path = window.location.href.split(`?`)[0];
  //   const qs = `?type=${type}`;
  //   getProducts(`${path}${qs}`);
  // };

  // const getProducts = async url => {
  //   const response = await fetch(url, {
  //     headers: new Headers({
  //       Accept: 'application/json'
  //     })
  //   });
  //   const products = await response.json();

  //   window.history.pushState({}, ``, url);
  //   showProducts(products);
  //   console.log(products);
  // };

  // const showProducts = products => {
  //   const $list = document.querySelector('.products');
  //   $list.innerHTML = ``;
  //   products.forEach(product => {
  //     $list.innerHTML += `
  //       <article class="product">
  //         <div class="product__info">
  //           <div class="product__head">
  //             <h3 class="product__title">${product.title}</h3>
  //             <p class="product__subtitle">${product.subtitle}</p>
  //           </div>
  //           <div class="product__buy">
  //             <p class="product__price">${product.priceinfo}</p>
  //             <a class="product__btn" href="index.php?page=detail&id=${product.id}" >+ <img srcset="./assets/img/cart.svg" sizes="16px" src="./assets/img/cart.svg" alt="cart vector"></a>
  //           </div>
  //         </div>
  //         <a class="product__link" href="index.php?page=detail&id=${product.id}" ><img class="product__img" srcset=".${product.image}" sizes="15px" src="${product.image}" alt="${product.title}"></a>
  //       </article>`;
  //   });
  // };

  const init = () => {
    const $form = document.querySelector(`form`);
    $form.noValidate = true;
    $form.addEventListener(`submit`, handleSubmitForm);
    addValidationListeners();

    // const $imageLinks = document.querySelectorAll(`.product-image-link`);
    // $imageLinks.forEach($link => $link.addEventListener(`click`, handleClickImage));

    // document.documentElement.classList.add('has-js');
    // document.querySelectorAll('.filter__form').forEach($select => $select.addEventListener('change', handleChangeFilter));

    console.log('webshopppp');
  };

  init();
}
