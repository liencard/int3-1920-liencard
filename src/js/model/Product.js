class Product {
  constructor(productObject) {
    this.title = productObject['title'];
    this.subtitle = productObject['subtitle'];
    this.priceinfo = productObject['priceinfo'];
    this.id = productObject['id'];
    this.image = productObject['tumbnail'];
  }

  createHTML() {
    return `

    <article class="product">
      <div class="product__info">
        <div class="product__head">
          <h3 class="product__title">${this.title}</h3>
          <p class="product__subtitle">${this.subtitle}</p>
        </div>
        <div class="product__buy">
          <p class="product__price">${this.priceinfo}</p>
          <a class="btn product__btn" href="index.php?page=detail&id=${this.id}" >Meer info</a>
        </div>
      </div>
      <a class="product__link" href="index.php?page=detail&id=${this.id}" ><img class="product__img" srcset=".${this.image}" sizes="15px" src="${this.image}" alt="${this.title}"></a>
    </article>`;
  }
}
export default Product;
