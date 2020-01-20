require('./style.css');
//require('./js/scratch.js');
// require('./js/validate.js');
if (document.body.classList.contains('webshop')) {
  require('./js/webshop.js');
}

if (document.body.classList.contains('longread')) {
  require('./js/scratch.js');
}

{
  const init = () => {

    // if (document.body.classList.contains('webshop')) {
    //   require('./js/webshop.js');
    // }
    console.log('index');
  };

  init();
}
