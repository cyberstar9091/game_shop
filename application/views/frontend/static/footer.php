<footer class="footer">
        <div class="container">
          <div class="footer__container">
            <div class="footer__main">
              <div class="footer__content">
                <a href="<?=base_url();?>" class="footer__content-logo" aria-label="route home">
                  <img width="686" height="80" src="<?=base_url("assets/frontend/themes");?>/images/logo-text.svg" alt="logo text">
                </a>
                <div class="footer__content-text">Never know what its like to lose a single game after trying out the products we put out. The path to victory is one click away!</div>
              </div>
              <div class="footer__socials">

                <a class="footer__socials-item" href="<?=settings("discord");?>" aria-label="discord">

                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#discord"></use>
                  </svg>

                </a>

                <a class="footer__socials-item" href="<?=settings("instagram");?>" aria-label="instagram">

                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#instagram"></use>
                  </svg>

                </a>

                <a class="footer__socials-item" href="<?=settings("tiktok");?>" aria-label="tiktok">

                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#tiktok"></use>
                  </svg>

                </a>

                <a class="footer__socials-item" href="<?=settings("youtube");?>" aria-label="youtube">

                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#youtube"></use>
                  </svg>

                </a>

              </div>
            </div>
            <div class="footer__links">

              <a href="<?=base_url("terms-conditions");?>" class="footer__links-item">
                Terms &amp; Conditions
              </a>

              <a href="<?=base_url("privacy-policy");?>" class="footer__links-item">
                Privacy Policy
              </a>

              <a href="<?=base_url("products");?>" class="footer__links-item">
                Cheats
              </a>

            </div>
          </div>
        </div>
        <div class="footer__effect">
          <img width="3405" height="3063" src="<?=base_url("assets/frontend/themes");?>/images/layout/footer-effect.webp" alt="effect">
        </div>
      </footer>

    </div>

    <script src="<?=base_url("assets/frontend/themes");?>/scripts/vendor.js"></script>
    <script src="<?=base_url("assets/frontend/themes");?>/scripts/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.2/dist/simple-notify.min.js"></script>
    <script src="<?=base_url("assets/frontend");?>/app.js"></script>
  </body>
</html>