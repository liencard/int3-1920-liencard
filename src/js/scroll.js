let $canvas;
let $div;


const handleScroll = e => {
  // const x = $div.scrollLeft;
  // const y = $div.scrollTop;
  // //document.getElementById("demo").innerHTML = "Horizontally: " + x + "px<br>Vertically: " + y + "px";
  // console.log(x, y);
  e.preventDefault();
  console.log(window.scrollY);
};

const handleScrollTwo = () => {
  const test = document.querySelector(`.scroll__wrapper`);
  console.log(`testje klopt dit ${test.scrollLeft}`);
  // console.log(test.scrollX);
  // console.log(window.pageYOffset);
  // console.log(window.scrollY);
  // console.log(window.scrollX);
  // console.log($section.scrollLeft);
  // console.log('hallo');
};


const init = () => {

  // $canvas = document.getElementById('canvas');
  //window.addEventListener('scroll', handleScroll);

  if ($canvas) {

    const $div = document.querySelector('.scroll__wrapper');
    //$div.addEventListener('scroll', handleScroll);

    window.addEventListener('scroll', handleScroll);

  }

  //window.addEventListener('scroll', handleScroll);
  window.addEventListener('scroll', handleScroll);

  const $section = document.querySelector('.morality');
  //console.log($section);

  console.log(document.querySelector(`.scroll__wrapper`).scrollWidth); // alle section children


};

init();
