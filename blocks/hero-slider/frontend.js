( function() {
  function initAll() {
    const els = document.querySelectorAll('.eqn-hero-swiper');
    els.forEach(el => {
      if (el._eqnInited) return;
      el._eqnInited = true;
      // eslint-disable-next-line no-undef
      new Swiper(el, {
        loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false },
        pagination: { el: el.querySelector('.swiper-pagination'), clickable: true },
        navigation: {
          nextEl: el.querySelector('.swiper-button-next'),
          prevEl: el.querySelector('.swiper-button-prev')
        }
      });
    });
  }

  // Front
  document.addEventListener('DOMContentLoaded', initAll);
  // Editor (when blocks are rendered/re-rendered)
  if (window.wp && wp.domReady) wp.domReady(initAll);
})();
