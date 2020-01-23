{

  let scrollLeft = 0;
  const $longread = document.querySelector(`.longread`);

  const scrollVert = () => {
    // $longread.off('mousewheel').mousewheel(function (e, delta) {
    //$longread.removeaddEventListener('wheel', function (e, delta) {
    $longread.addEventListener('wheel', function (e, delta) {
      this.scrollTop -= (delta * 40);
      e.preventDefault();
      setTimeout(function () {
        if (window.scrollTop() + window.height() == document.height())
          scrollHoriz();
      }, 0);

    });
  };

  const scrollHoriz = () => {
    // $longread.off('mousewheel').mousewheel(function (e, delta) {
    $longread.addEventListener('wheel', function (e, delta) {
      this.scrollLeft -= (delta * 40);
      e.preventDefault();
      scrollLeft = this.scrollLeft;
      setTimeout(function () {
        if (scrollLeft == 0) scrollVert();
      }, 0);
    });
  };

  const init = () => {
    scrollVert();
  }

  init();

}
