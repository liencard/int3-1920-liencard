{

  const $longread = document.querySelector(`.longread`);


  // const test = () => {
  //   $longread.mousewheel(function (e, delta) {
  //     this.scrollLeft -= (delta * 40);
  //     e.preventDefault();
  //   });
  // };

  const test = () => {
    $longread.addEventListener('wheel', function (e, delta) {
      this.scrollLeft -= (delta * 40);
      e.preventDefault();
    });
  };

  test();

}


