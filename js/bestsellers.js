document.addEventListener('DOMContentLoaded', () => {
  // Tab toggle
  const panesWrap = document.querySelector('.bestsellers-panes');
  if (!panesWrap) return;

  const buttons = document.querySelectorAll('.bestsellers-toggle .toggle-btn');
  const panes   = panesWrap.querySelectorAll('.bestsellers-pane');

  const activate = (key) => {
    buttons.forEach(b => b.classList.toggle('is-active', b.dataset.target === key));
    panes.forEach(p => p.classList.toggle('is-active', p.dataset.pane === key));

    // Init swiper(s) in the active pane if not already done
    const activePane = [...panes].find(p => p.dataset.pane === key);
    activePane.querySelectorAll('.bestsellers-slider[data-swiper="bestsellers"]').forEach(el => {
      if (!el._eqnSwiper) {
        el._eqnSwiper = new Swiper(el, {
          slidesPerView: 1,
          spaceBetween: 16,
          breakpoints: {
            768:  { slidesPerView: 2, spaceBetween: 20 },
            1024: { slidesPerView: 4, spaceBetween: 20 }
          },
          navigation: {
            nextEl: el.querySelector('.swiper-button-next'),
            prevEl: el.querySelector('.swiper-button-prev')
          },
          pagination: { el: el.querySelector('.swiper-pagination'), clickable: true }
        });
      }
    });
  };

  buttons.forEach(btn => btn.addEventListener('click', () => activate(btn.dataset.target)));
  activate(panesWrap.dataset.defaultTab || 'tab1'); // initial
});