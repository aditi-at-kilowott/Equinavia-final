document.addEventListener('DOMContentLoaded', function() {
  const swiperHero = new Swiper('.hero-slider-inner', {
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.hero-slider-pagination',
      clickable: true,
    },
  });
  // ---- Bestsellers sliders (one Swiper per pane)
  document.querySelectorAll('.bestsellers-slider').forEach((el) => {
    const next = el.querySelector('.swiper-button-next');
    const prev = el.querySelector('.swiper-button-prev');
    const pagination = el.querySelector('.swiper-pagination');

    new Swiper(el, {
      slidesPerView: 4,
      spaceBetween: 20,
      navigation: { nextEl: next, prevEl: prev },
      pagination: { el: pagination, clickable: true },
      watchOverflow: true,   // hide nav if <= slidesPerView
      observer: true,
      observeParents: true,  // re-init when tab becomes visible
      breakpoints: {
        1024: { slidesPerView: 4, spaceBetween: 20 },
        768:  { slidesPerView: 3, spaceBetween: 20 },
        480:  { slidesPerView: 2, spaceBetween: 15 },
        320:  { slidesPerView: 1, spaceBetween: 10 },
      },
    });
  });
});
