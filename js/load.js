document.addEventListener('DOMContentLoaded', function() {

    var modalOverlay = document.createElement('div');
    modalOverlay.className = 'modal-overlay';
    modalOverlay.innerHTML =
      '<div class="modal">' +
        '<button class="modal-close">✕</button>' +
        '<div class="modal-img-wrap"></div>' +
        '<div class="modal-body">' +
          '<div class="modal-name"></div>' +
          '<div class="modal-desc"></div>' +
          '<div class="modal-price"></div>' +
          '<a href="#order" class="btn modal-btn">Заказать</a>' +
        '</div>' +
      '</div>';
    document.body.appendChild(modalOverlay);

    var modalImgWrap = modalOverlay.querySelector('.modal-img-wrap');
    var modalName    = modalOverlay.querySelector('.modal-name');
    var modalDesc    = modalOverlay.querySelector('.modal-desc');
    var modalPrice   = modalOverlay.querySelector('.modal-price');
    var modalClose   = modalOverlay.querySelector('.modal-close');

    function openModal(p) {
      modalImgWrap.innerHTML = '';
      if (p.image_url) {
        var img = document.createElement('img');
        img.src = p.image_url;
        img.alt = p.name;
        img.className = 'modal-img';
        modalImgWrap.appendChild(img);
      } else {
        var ph = document.createElement('div');
        ph.className = 'modal-img-ph';
        modalImgWrap.appendChild(ph);
      }
      modalName.textContent  = p.name;
      modalDesc.textContent  = p.description || '';
      modalPrice.textContent = p.price || 'Уточнить цену →';
      modalOverlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeModal() {
      modalOverlay.classList.remove('active');
      document.body.style.overflow = '';
    }

    modalClose.addEventListener('click', closeModal);
    modalOverlay.addEventListener('click', function(e) {
      if (e.target === modalOverlay) closeModal();
    });
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') closeModal();
    });
    modalOverlay.querySelector('.modal-btn').addEventListener('click', closeModal);

    var grid = document.querySelector('.catalog-grid');
    if (!grid) return;

    fetch('/api.php?type=products')
      .then(function(r) { return r.json(); })
      .then(function(products) {
        if (!products || products.length === 0) return;
        grid.innerHTML = '';
        products.forEach(function(p) {
          var card = document.createElement('div');
          card.className = 'product-card';
          if (p.image_url) {
            var img = document.createElement('img');
            img.src = p.image_url;
            img.alt = p.name;
            img.style.cssText = 'width:100%;height:300px;object-fit:cover;display:block;';
            card.appendChild(img);
          } else {
            var ph = document.createElement('div');
            ph.className = 'product-img-ph';
            card.appendChild(ph);
          }
          var ov = document.createElement('div');
          ov.className = 'product-overlay';
          ov.innerHTML = '<span class="btn">Подробнее</span>';
          card.appendChild(ov);
          var info = document.createElement('div');
          info.className = 'product-info';
          var nm = document.createElement('div');
          nm.className = 'product-name';
          nm.textContent = p.name;
          var ds = document.createElement('div');
          ds.className = 'product-desc';
          ds.textContent = p.description || '';
          var pr = document.createElement('div');
          pr.className = 'product-price';
          pr.textContent = p.price || 'Уточнить цену →';
          info.appendChild(nm);
          info.appendChild(pr);
          card.appendChild(info);
          card.addEventListener('click', function() { openModal(p); });
          grid.appendChild(card);
        });
      })
      .catch(function(e) { console.error(e); });
  });
