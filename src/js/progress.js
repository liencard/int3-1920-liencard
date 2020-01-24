{
  const mainNavLinks = document.querySelectorAll('.section-link');

  const processScrolHandler = () => {
    const fromTop = window.scrollY + (window.innerHeight / 2);

    mainNavLinks.forEach(link => {
      const section = document.querySelector(link.hash);
      console.log(link.hash);

      if (section.offsetTop <= fromTop && section.offsetTop + section.offsetHeight > fromTop) {
        link.childNodes[0].classList.add('current');
      } else {
        link.childNodes[0].classList.remove('current');
      }
    });
  };

  const init = () => {
    window.addEventListener(`scroll`, processScrolHandler);
  };

  init();
}
