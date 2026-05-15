<?php
      function h($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
      $reviewsFile = __DIR__ . '/data/reviews.json';
      $reviews = [];
      if (file_exists($reviewsFile)) {
          $data = json_decode(file_get_contents($reviewsFile), true);
          if (is_array($data)) {
              $reviews = array_values(array_filter($data, function($r) {
                  return !isset($r['status']) || $r['status'] === 'approved';
              }));
          }
      }
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <link rel="sitemap" type="application/xml" href="/sitemap.xml" />

  <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
      (function(m,e,t,r,i,k,a){
          m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
          m[i].l=1*new Date();
          for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
          k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
      })(window,document,'script','https://mc.yandex.ru/metrika/tag.js?id=108359804', 'ym');
      ym(108359804, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", referrer: document.referrer, url: location.href, accurateTrackBounce:true, trackLinks:true});
  </script>
  <noscript><div><img src="https://mc.yandex.ru/watch/108359804" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->

<head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>САКВОЯЖЪ — изделия из натуральной кожи ручной работы | Архангельск</title>
      <meta name="description" content="Кожевенная мастерская «САКВОЯЖЪ» в Архангельске — авторские изделия из натуральной кожи ручной работы." />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="САКВОЯЖЪ — изделия из натуральной кожи ручной работы | Архангельск" />
  <meta property="og:url" content="https://kozhaarxangelsk.ru/" />
  <meta property="og:image" content="https://kozhaarxangelsk.ru/uploads/img_69d016ccaa4c3.jpg" />
  <meta property="og:locale" content="ru_RU" />
      <link rel="icon" type="image/png" href="/favicon.png?v=2" />
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v=2" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Raleway:wght@300;400;500&display=swap" rel="stylesheet" />
      <link rel="stylesheet" href="css/style.css?v=3" />
    </head>
    <body>
      <header>
        <a href="#" class="logo"><span style="font-size:0.55em; display:block; letter-spacing:0.15em; font-weight:400; color:var(--gold);">Кожевенная мастерская</span>САКВОЯЖЪ</a>
        <nav>
          <a href="#catalog">Каталог</a>
          <a href="#about">О мастерской</a>
          <a href="#testimonials">Отзывы</a>
          <a href="#order">Заказать</a>
        </nav>
        <div class="header-socials">
          <a href="https://vk.ru/annakuharchuk60" target="_blank">ВКонтакте</a>
          <a href="tel:+79506614235">+7 950 661-42-35</a>
        </div>
        <button class="burger" id="burgerBtn"><span></span><span></span><span></span></button>
      </header>
      <div class="mobile-nav" id="mobileNav">
        <button class="mobile-nav-close" id="mobileNavClose">✕</button>
        <a href="#catalog" class="mobile-nav-link">Каталог</a>
        <a href="#about" class="mobile-nav-link">О мастерской</a>
        <a href="#testimonials" class="mobile-nav-link">Отзывы</a>
        <a href="#order" class="mobile-nav-link">Заказать</a>
      </div>
      <section class="hero" id="home">
        <div class="hero-img-placeholder"></div>
        <div class="hero-bg"></div>
        <div class="hero-lines"></div>
        <div class="hero-content" style="display:flex; align-items:flex-end; justify-content:space-between; width:96vw; max-width:1600px; padding-left:0; padding-right:60px; margin-left:-50px; position:absolute; bottom:90px;">
          <div style="flex:1; margin-bottom:-40px;">
            <div class="hero-divider"></div>
            <p class="hero-desc">
              Изделия из натуральной кожи ручной работы.<br>
              Авторский окрас. Винтажный характер.<br>
              Каждая вещь — единственная в своём роде.
            </p>
          </div>
          <a href="#catalog" class="btn" style="flex-shrink:0; margin-right:-70px;">Смотреть коллекцию</a>
        </div>
        <div class="scroll-hint">
          <span>Листай</span>
          <div class="scroll-arrow"></div>
        </div>
      </section>
      <div class="promo">
        <div class="promo-bg-pattern"></div>
        <div class="promo-inner">
          <span class="promo-tag">Авторская работа</span>
          <h2 class="promo-title">Кожа с<br><em>характером</em></h2>
          <p class="promo-text">Каждое изделие проходит через руки мастера от выбора кожи до финальной полировки.</p>
          <a href="#order" class="btn">Заказать индивидуально</a>
        </div>
        <div class="promo-deco">
          <div class="promo-deco-text">Ручная<br>работа<br>·<br>Натуральная<br>кожа</div>
        </div>
      </div>
      <section id="catalog">
        <p class="section-label">Коллекция</p>
        <h2 class="section-title">Изделия мастерской</h2>
        <div class="section-divider"></div>
        <div class="catalog-grid"></div>
      </section>
      <section id="about">
        <div class="about-inner">
          <div class="about-img-ph"></div>
          <div class="about-text">
            <p class="section-label">О мастерской</p>
            <h2 class="section-title">Саквояжь —<br><em>это про руки</em></h2>
            <div class="section-divider"></div>
            <p class="about-body">Мастерская «Саквояжь» — это авторские изделия из натуральной кожи, сделанные вручную в Архангельске.</p>
            <div class="about-features">
              <div class="feature"><div class="feature-icon">✦</div><div class="feature-text"><strong>Натуральная кожа</strong>Только растительное дубление</div></div>
              <div class="feature"><div class="feature-icon">✦</div><div class="feature-text"><strong>Авторский окрас</strong>Каждый цвет смешивается вручную</div></div>
              <div class="feature"><div class="feature-icon">✦</div><div class="feature-text"><strong>Ручная работа</strong>Седельный шов, ручная отделка края</div></div>
              <div class="feature"><div class="feature-icon">✦</div><div class="feature-text"><strong>Индивидуальный заказ</strong>Сделаю по вашим размерам и пожеланиям</div></div>
            </div>
          </div>
        </div>
      </section>
      <section id="testimonials">
        <p class="section-label">Отзывы</p>
        <h2 class="section-title">Что говорят клиенты</h2>
        <div class="section-divider"></div>
        <div class="testimonials-grid">
          <?php if (empty($reviews)): ?>
            <?php foreach ([
              ['author'=>'Анна, Архангельск','text'=>'Заказала ридикюль — получила произведение искусства.','stars'=>5],
            ] as $r): ?>
            <div class="testimonial">
              <div class="testimonial-stars"><?= str_repeat('★', $r['stars']) ?></div>
              <p class="testimonial-text"><?= h($r['text']) ?></p>
              <div class="testimonial-author">— <?= h($r['author']) ?></div>
            </div>
            <?php endforeach; ?>
          <?php else: ?>
            <?php foreach ($reviews as $r): ?>
            <div class="testimonial">
              <div class="testimonial-stars"><?= str_repeat('★', (int)($r['stars'] ?? 5)) ?></div>
              <p class="testimonial-text"><?= h($r['text']) ?></p>
              <div class="testimonial-author">— <?= h($r['author']) ?></div>
            </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="review-form-wrap">
          <button class="btn" id="reviewToggleBtn">Оставить отзыв</button>
          <form class="order-form review-form" id="reviewForm">
            <div class="order-field"><label>Ваше имя</label><input type="text" name="name" placeholder="Ваше имя" required /></div>
            <div class="order-field"><label>Город</label><input type="text" name="city" placeholder="Архангельск" /></div>
            <div class="order-field"><label>Оценка</label><select name="stars"><option value="5">★★★★★</option><option value="4">★★★★☆</option><option value="3">★★★☆☆</option><option value="2">★★☆☆☆</option><option value="1">★☆☆☆☆</option></select></div>
            <div class="order-field"><label>Текст отзыва</label><textarea name="text" rows="4" placeholder="Расскажите о своём заказе..." required></textarea></div>
            <div id="reviewMsg" class="order-msg" style="display:none"></div>
            <button type="submit" class="btn">Отправить отзыв</button>
            <p class="order-note">Отзыв появится после проверки</p>
          </form>
        </div>
      </section>
      <section id="order">
        <p class="section-label">Связаться</p>
        <h2 class="section-title">Заказать изделие</h2>
        <div class="section-divider"></div>
        <div class="order-inner">
          <p class="order-text">Расскажите, что хотите — я подберу кожу, окрас и фурнитуру.</p>
          <form class="order-form" id="orderForm">
            <div class="order-field"><input type="text" name="name" placeholder="Ваше имя" required /></div>
            <div class="order-field"><input type="tel" name="phone" placeholder="Телефон" required /></div>
            <div class="order-field"><textarea name="message" rows="3" placeholder="Что хотите заказать? (необязательно)"></textarea></div>
            <div id="orderMsg" class="order-msg" style="display:none"></div>
            <button type="submit" class="btn">Отправить заявку</button>
          </form>
          <div class="order-contacts" style="margin-top:40px">
            <a href="tel:+79506614235" class="contact-item"><span class="contact-label">Телефон</span>+7 950 661-42-35</a>
            <a href="https://vk.ru/annakuharchuk60" target="_blank" class="contact-item"><span class="contact-label">ВКонтакте</span>Кожевенная мастерская «САКВОЯЖЪ» | Архангельск</a>
          </div>
        </div>
      </section>
      <footer>
        <div class="footer-inner">
          <div><a href="#" class="footer-logo">САКВОЯЖЪ</a><div class="footer-tagline">Натуральная кожа · Ручная работа</div></div>
          <div><div class="footer-col-title">Навигация</div><div class="footer-links"><a href="#catalog">Каталог</a><a href="#about">О мастерской</a><a href="#testimonials">Отзывы</a><a href="#order">Заказать</a></div></div>
          <div><div class="footer-col-title">Контакты</div><div class="footer-links"><a href="tel:+79506614235">+7 950 661-42-35</a><a href="https://vk.ru/annakuharchuk60" target="_blank">ВКонтакте</a></div></div>
        </div>
        <div class="footer-bottom">
          <span class="footer-copy">© 2025 Кожевенная мастерская «САКВОЯЖЪ» | Архангельск</span>
          <a href="#home" class="back-top">↑ Наверх</a>
        </div>
      </footer>
      <script>
  var burger = document.getElementById('burgerBtn');
  var mobileNav = document.getElementById('mobileNav');
  var mobileClose = document.getElementById('mobileNavClose');
  if (burger) burger.addEventListener('click', function() { mobileNav.classList.add('open'); });
  if (mobileClose) mobileClose.addEventListener('click', function() { mobileNav.classList.remove('open'); });
  document.querySelectorAll('.mobile-nav-link').forEach(function(a) {
    a.addEventListener('click', function() { mobileNav.classList.remove('open'); });
  });
  document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('orderForm');
    if (!form) return;
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      var btn = form.querySelector('button[type=submit]');
      var msg = document.getElementById('orderMsg');
      btn.disabled = true; btn.textContent = 'Отправляем...';
      fetch('/order.php', { method: 'POST', body: new FormData(form) })
        .then(function(r) { return r.json(); })
        .then(function(data) {
          if (data.ok) {
            msg.className = 'order-msg success'; msg.textContent = 'Заявка отправлена! Скоро свяжусь с вами.';
            msg.style.display = 'block'; form.reset(); btn.textContent = 'Отправлено!';
          } else {
            msg.className = 'order-msg error'; msg.textContent = data.error || 'Ошибка';
            msg.style.display = 'block'; btn.disabled = false; btn.textContent = 'Отправить заявку';
          }
        })
        .catch(function() {
          msg.className = 'order-msg error'; msg.textContent = 'Что-то пошло не так. Позвоните напрямую.';
          msg.style.display = 'block'; btn.disabled = false; btn.textContent = 'Отправить заявку';
        });
    });
  });
  document.getElementById('reviewToggleBtn').addEventListener('click', function() {
    var form = document.getElementById('reviewForm');
    var open = form.classList.toggle('open');
    this.textContent = open ? 'Скрыть форму' : 'Оставить отзыв';
    if (open) form.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  });
  document.getElementById('reviewForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var form = this; var btn = form.querySelector('button[type=submit]'); var msg = document.getElementById('reviewMsg');
    btn.disabled = true; btn.textContent = 'Отправляем...';
    fetch('/review.php', { method: 'POST', body: new FormData(form) })
      .then(function(r) { return r.json(); })
      .then(function(data) {
        if (data.ok) {
          msg.className = 'order-msg success'; msg.textContent = 'Спасибо! Отзыв отправлен на проверку.';
          msg.style.display = 'block'; form.reset(); btn.textContent = 'Отправлено!';
          setTimeout(function() { btn.disabled = false; btn.textContent = 'Отправить отзыв'; msg.style.display = 'none'; }, 10000);
        } else { throw new Error(data.error || 'Ошибка'); }
      })
      .catch(function(err) {
        msg.className = 'order-msg error'; msg.textContent = err.message || 'Что-то пошло не так.';
        msg.style.display = 'block'; btn.disabled = false; btn.textContent = 'Отправить отзыв';
      });
  });
  </script>
      <script src="js/load.js?v=2"></script>
    </body>
    </html>
