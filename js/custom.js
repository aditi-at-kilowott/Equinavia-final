document.addEventListener('DOMContentLoaded', function() {
  // mobile menu toggle
  var menuToggle = document.querySelector('.menu-toggle');
  var navMenu = document.querySelector('.nav-menu');

  if (menuToggle && navMenu) {
    menuToggle.addEventListener('click', function() {
      var expanded = this.getAttribute('aria-expanded') === 'true' || false;
      this.setAttribute('aria-expanded', !expanded);
      navMenu.classList.toggle('open');
    });
  }

  // search overlay toggle
  var searchToggle = document.querySelectorAll('.search-toggle');
  var searchOverlay = document.getElementById('search-overlay');
  var searchClose = document.querySelector('.search-close');

  if (searchToggle && searchOverlay) {
    searchToggle.forEach(function(btn) {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        searchOverlay.classList.remove('hidden');
        searchOverlay.setAttribute('aria-hidden', 'false');
      });
    });
  }

  if (searchClose) {
    searchClose.addEventListener('click', function() {
      searchOverlay.classList.add('hidden');
      searchOverlay.setAttribute('aria-hidden', 'true');
    });
  }

  // close search on outside click
  if (searchOverlay) {
    searchOverlay.addEventListener('click', function(e) {
      if (e.target === this) {
        searchOverlay.classList.add('hidden');
        searchOverlay.setAttribute('aria-hidden', 'true');
      }
    });
  }
});
