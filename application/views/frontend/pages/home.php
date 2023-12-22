<div class="home">
        <div class="home-hero">
          <div class="container">
            <div class="home-hero__container">
              <div class="home-hero__content">
                <div class="home-hero__logo" data-aos="fade-up">
                  <img width="686" height="80" src="<?=base_url("assets/frontend/themes");?>/images/logo-text.svg" alt="logo text">
                </div>
                <div class="home-hero__title font-apex" data-aos="fade-up" data-aos-delay="200">UNDETECTED GAME CHEATS</div>
                <div class="home-hero__subtitle" data-aos="fade-up" data-aos-delay="500">Personalize your gaming experience</div>
                <div class="home-hero__description" data-aos="fade-up" data-aos-delay="800">
                  Thousands of paid cheats and trainers for
                  all your favorite multiplayer PC games — all in one place.
                </div>
              </div>
              <div class="container">
              <center><a href="<?=base_url("products");?>" class="btn btn-sm btn-shine btn-icon btn-red">Buy Now</a></center>
              </div>
              <div class="home-hero__list">

                <div class="home-hero__feature" data-aos="fade-up" data-aos-delay="300">
                  <div class="home-hero__feature-image">
                    <img draggable="false" src="<?=base_url("assets/frontend/themes");?>/images/home/hero/features/cup.svg" alt="feature">
                  </div>
                  <div class="home-hero__feature-text font-apex">

                    <span>easy</span>

                    <span> championship</span>

                  </div>
                </div>

                <div class="home-hero__feature" data-aos="fade-up" data-aos-delay="600">
                  <div class="home-hero__feature-image">
                    <img draggable="false" src="<?=base_url("assets/frontend/themes");?>/images/home/hero/features/gun.svg" alt="feature">
                  </div>
                  <div class="home-hero__feature-text font-apex">

                    <span>professional</span>

                    <span>gunner</span>

                  </div>
                </div>

                <div class="home-hero__feature" data-aos="fade-up" data-aos-delay="900">
                  <div class="home-hero__feature-image">
                    <img draggable="false" src="<?=base_url("assets/frontend/themes");?>/images/home/hero/features/skull.svg" alt="feature">
                  </div>
                  <div class="home-hero__feature-text font-apex">

                    <span>crisp</span>

                    <span>shots</span>

                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="home-hero__background" data-aos="fade" data-aos-delay="200" data-aos-duration="1000">
            <img draggable="false" src="<?=base_url("assets/frontend/themes");?>/images/home/hero/background.webp" alt="background">
          </div>
        </div>

        <div class="watch">
          <div class="container">
            <div class="watch__container">
              <div class="watch__text font-apex" data-aos="fade-right">WATCH IT NOW!</div>
              <div class="watch__link" data-aos="fade-left" data-aos-delay="500" id="play_area">
                <button class="btn btn-sm btn-shine btn-icon btn-red" id="play_button">
                  <span>play</span>

                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#play"></use>
                  </svg>

                </button>
              </div>
            </div>
          </div>
          <div class="watch__background" data-aos="zoom-out">
            <div class="watch__background-hero">
              <img draggable="false" width="1648" height="927" src="<?=base_url("assets/frontend/themes");?>/images/watch/hero.webp" alt="hero">
            </div>
            <img draggable="false" class="watch__background-effect" src="<?=base_url("assets/frontend/themes");?>/images/watch/effect.webp" alt="effect">
          </div>
          <div class="watch__effect">
            <img width="1782" height="2038" src="<?=base_url("assets/frontend/themes");?>/images/watch/effect-2.webp" alt="effect">
          </div>
        </div>
        
        <script>
            
            $("#play_button").click(function(e) {
                
                $("#play_area").html('<iframe width="560" height="315" src="<?=settings("play_button");?>&amp;controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
                
            });
            
        </script>
        
        <div class="home-benefits">
          <div class="container">
            <div class="row gy-6 align-items-end">
              <div class="col-lg-5">
                <div class="home-benefits__heading" data-aos="fade-right">
                  <div class="home-benefits__heading-logo">
                    <img width="686" height="80" src="<?=base_url("assets/frontend/themes");?>/images/logo-text.svg" alt="logo text">
                  </div>
                  <div class="home-benefits__heading-title font-apex">BENEFITS OF OUR CHEAT</div>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="home-benefits__list">

                  <div class="home-benefits__item" data-aos="fade-left" data-aos-delay="200">
                    <div class="home-benefits__item-title font-apex">

                      <span>we are built to</span>

                      <span>make you win</span>

                    </div>
                    <div class="home-benefits__item-text">
                      StartWinning products use a Polymorphic build system. Each time a user wants to use any of our products, our server gives out a different build for the user.
                    </div>
                  </div>

                  <div class="home-benefits__item" data-aos="fade-left" data-aos-delay="400">
                    <div class="home-benefits__item-title font-apex">

                      <span>your cheat is</span>

                      <span>smarter than ever</span>

                    </div>
                    <div class="home-benefits__item-text">
                      StartWinning products use a Polymorphic build system. Each time a user wants to use any of our products, our server gives out a different build for the user.
                    </div>
                  </div>

                </div>
                <a href="#" class="btn btn-sm btn-shine btn-icon btn-red">benefits of our cheats</a>
              </div>
            </div>
          </div>
          <div class="home-benefits__effect">
            <img width="1782" height="2038" src="<?=base_url("assets/frontend/themes");?>/images/home/benefits.webp" alt="effect">
          </div>
        </div>
        <div class="container">
          <div class="home-features">
            <div class="home-features__heading" data-aos="fade-down">
              <div class="home-features__heading-logo">
                <img width="686" height="80" src="<?=base_url("assets/frontend/themes");?>/images/logo-text-dark.svg" alt="logo text">
              </div>
              <div class="home-features__heading-title font-apex">our general features and statistics</div>
            </div>
            <div class="home-features__benefits">

              <div class="home-features__benefit" data-aos="fade-up" data-aos-delay="200">
                <div class="home-features__benefit-title font-apex">HIGH LEVEL OPTIMAZTION</div>
                <div class="home-features__benefit-image">
                  <img src="<?=base_url("assets/frontend/themes");?>/images/home/features/benefits/settings.svg" alt="icon in flag">
                </div>
                <div class="home-features__benefit-text">All our cheats get optimized by senior-level developers. Our major difference from other software providers is that our software uses the lowest system requirements possible. Therefore, Startwinning products will always be the best choice for you.</div>
              </div>

              <div class="home-features__benefit" data-aos="fade-up" data-aos-delay="400">
                <div class="home-features__benefit-title font-apex">FULLTIME DEVELOPMENT</div>
                <div class="home-features__benefit-image">
                  <img src="<?=base_url("assets/frontend/themes");?>/images/home/features/benefits/code.svg" alt="icon in flag">
                </div>
                <div class="home-features__benefit-text">If you have any suggestions regarding the software, you can always share your ideas with us on our forum, where you will get a reward for supporting us if your recommendation gets recognized by a developer. With your help, our software will get stronger every day.</div>
              </div>

              <div class="home-features__benefit" data-aos="fade-up" data-aos-delay="600">
                <div class="home-features__benefit-title font-apex">KEEP IN TOUCH WITH US</div>
                <div class="home-features__benefit-image">
                  <img src="<?=base_url("assets/frontend/themes");?>/images/home/features/benefits/wifi.svg" alt="icon in flag">
                </div>
                <div class="home-features__benefit-text">The StartWinning Community is growing day by day. You can be a part of this massive community by joining us. Our new releases, events, and discounts will get announced on our forum which you can reach from our main page.</div>
              </div>

            </div>
            <div class="home-features__statistics">

              <div class="home-features__statistic" data-aos="fade-up" data-aos-delay="300">
                <div class="home-features__statistic-container">
                  <div class="home-features__statistic-value font-apex">150000+</div>
                  <div class="home-features__statistic-text">Order’s Completed</div>
                </div>
              </div>

              <div class="home-features__statistic" data-aos="fade-up" data-aos-delay="600">
                <div class="home-features__statistic-container">
                  <div class="home-features__statistic-value font-apex">150000+</div>
                  <div class="home-features__statistic-text">Years Experience</div>
                </div>
              </div>

              <div class="home-features__statistic" data-aos="fade-up" data-aos-delay="900">
                <div class="home-features__statistic-container">
                  <div class="home-features__statistic-value font-apex">150000+</div>
                  <div class="home-features__statistic-text">Scripting Right Now</div>
                </div>
              </div>

              <div class="home-features__statistic" data-aos="fade-up" data-aos-delay="1200">
                <div class="home-features__statistic-container">
                  <div class="home-features__statistic-value font-apex">150000+</div>
                  <div class="home-features__statistic-text">Banned Accounts</div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="home-purchase">
          <div class="container">
            <div class="home-purchase__container">
              <div class="home-purchase__text font-apex" data-aos="fade-up">PURCHASE IT NOW!</div>
              <div class="home-purchase__link" data-aos="fade-up" data-aos-delay="300">
                <a href="<?=base_url("products");?>" class="btn btn-sm btn-shine btn-icon btn-red">
                  <span>PURCHASE</span>

                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#play"></use>
                  </svg>

                </a>
              </div>
            </div>
          </div>
          <div class="home-purchase__background">
            <div class="home-purchase__background-hero" data-aos="fade-up">
              <img draggable="false" width="1648" height="927" src="<?=base_url("assets/frontend/themes");?>/images/home/purchase/hero.webp" alt="hero">
            </div>
            <img draggable="false" class="home-purchase__background-effect" src="<?=base_url("assets/frontend/themes");?>/images/home/purchase/effect.webp" alt="effect" data-aos="fade" data-aos-delay="150">
          </div>
          <div class="home-purchase__effect">
            <img width="1782" height="2038" src="<?=base_url("assets/frontend/themes");?>/images/home/purchase/effect-2.webp" alt="effect" data-aos="fade-up-left" data-aos-delay="150">
          </div>
        </div>
        <div class="home-soon">
          <div class="container">
            <div class="home-soon__container">
              <div class="home-soon__heading">
                <div class="home-soon__heading-logo" data-aos="fade-up">
                  <img width="686" height="80" src="<?=base_url("assets/frontend/themes");?>/images/logo-text.svg" alt="logo text">
                </div>
                <div class="home-soon__heading-title font-apex" data-aos="fade-up" data-aos-delay="100">MORE PRODUCTS THAR ARE COMING SOON</div>
              </div>
              <div class="row">
                <div class="col-sm-4 col-6">
                  <div class="home-soon__image" style="--margin: -64px; --mobile-margin: -30px;" data-aos="fade-up-right" data-aos-delay="150">
                    <img width="404" height="585" src="<?=base_url("assets/frontend/themes");?>/images/home/soon/cards/1.webp" alt="game thumbnail">
                  </div>
                </div>
                <div class="col-sm-4 col-6">
                  <div class="home-soon__image" style="--margin: 116px; --mobile-margin: 80px;" data-aos="fade-up" data-aos-delay="350">
                    <img width="404" height="585" src="<?=base_url("assets/frontend/themes");?>/images/home/soon/cards/2.webp" alt="game thumbnail">
                  </div>
                </div>
                <div class="col-sm-4 col-6">
                  <div class="home-soon__image" style="--margin: -102px; --mobile-margin: -80px;" data-aos="fade-up-left" data-aos-delay="250">
                    <img width="404" height="585" src="<?=base_url("assets/frontend/themes");?>/images/home/soon/cards/3.webp" alt="game thumbnail">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="home-soon__effect">
            <img height="2038" width="1782" src="<?=base_url("assets/frontend/themes");?>/images/home/soon/effect.png" alt="effect">
          </div>
          <div class="home-soon__background">
            <img width="1560" height="2450" src="<?=base_url("assets/frontend/themes");?>/images/background.webp" alt="background">
          </div>
        </div>
        <div class="container">
          <div class="faq">
            <div class="faq__heading">
              <div class="faq__heading-logo" data-aos="fade-up">
                <img width="686" height="80" src="<?=base_url("assets/frontend/themes");?>/images/logo-text.svg" alt="logo text">
              </div>
              <div class="faq__heading-title font-apex" data-aos="fade-up" data-aos-delay="100">
                Frequently asked questions
              </div>
            </div>

              <div class="faq__list">
                    <?php foreach(get_where("faq")->result() as $item){ ?>
                      <div class="faq__item" data-aos="fade-up" data-aos-delay="100">
                        <a href="javascript:void(0);" class="faq__list-link"><?=$item->text;?></a>
                        <div class="faq__answer" style="display:none;"><?=$item->answer;?></div>
                      </div>
                    <?php } ?>
              </div>
          
          </div>
        </div>
      </div>

