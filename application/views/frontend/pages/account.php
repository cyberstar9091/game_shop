<div class="account">
        <div class="container">

          <div class="account-heading" data-aos="fade-up">
            <div class="account-heading__top"><?=db_decrypt(user_data()["email"]);?>,</div>
            <div class="account-heading__title font-apex">MY account</div>
          </div>

        </div>

        <div class="container">
          <div class="account-games" data-aos="fade-up" data-aos-delay="150">
            <div class="account-games__top">MY GAMES</div>
            <div class="account-games__carousel">
              <div class="account-games__carousel-list">

                <?php
                $order_check = get_where("orders",["user_key" => user_data()["user_key"]])->row_array();
                if($order_check){
                ?>
                <div class="swiper-wrapper">

                <?php foreach($products as $product){ ?>
                  <script>
                    alert("success","Please <a href='"<?=base_url("tutorial");?>"'>click</a> on the link to download Loader.");
                  </script>
                  <div class="swiper-slide">
                    <div class="account-games__item">
                      <div class="account-games__item-image">
                        <img width="404" height="585" src="<?=base_url("assets/frontend/themes/images/products/");?><?=$product->product_image;?>" alt="game thumbnail">
                      </div>
                      <div class="account-games__item-content">
                        <div class="account-games__item-heading">
                          <div class="account-games__item-top">GAME NAME</div>
                          <div class="account-games__item-title font-apex"><?=$product->product_name;?></div>
                        </div>
                        <div class="account-games__item-details">
                          <div class="account-games__item-value">
                            <span>license key</span>

                            <?php 
                              $order = get_where("orders",["user_key" => user_data()["user_key"],"product_key" => $product->product_key])->row_array();
                              if($order["status"] == "active"){
                            ?>
                            <span class="dot active">ACTIVE</span>
                            <?php }else{ ?>
                            <span class="dot">INACTIVE</span>
                            <?php } ?>
                          </div>
                          <?php if($order["status"] == "active"){ ?>
                          <div class="account-games__item-date"><?=date("d/m/Y", $order["finish_time"]);?></div>
                          <?php } ?>
                        </div>
                        <!--<button class="btn btn-white btn-icon">-->
                        <!--  <span>GIFT</span>-->

                        <!--  <svg class="icon">-->
                        <!--    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#share"></use>-->
                        <!--  </svg>-->

                        <!--</button>-->
                      </div>
                    </div>
                  </div>

                  <?php } ?>


                </div>
                <?php }else{ ?>
                  <center><img height="500px" src="<?=base_url("assets/frontend/themes/images/rno_product.png");?>" alt="no product"></center>
                <?php } ?>

              </div>
              <?php
                if($order_check){
              ?>
              <div class="account-games__carousel-navigation">
                <button data-slider-prev class="prev">
                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#chevron-left"></use>
                  </svg>
                </button>
                <button data-slider-next class="next">
                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#chevron-right"></use>
                  </svg>
                </button>
              </div>
              <?php } ?>

            </div>
          </div>
        </div>

        <div class="account-keys" data-aos="fade-up" data-aos-delay="200">
          <div class="container">

            <div class="account-heading" data-aos="fade-up">
              <div class="account-heading__top"><?=db_decrypt(user_data()["email"]);?>,</div>
              <div class="account-heading__title font-apex">MY AFFILIATE</div>
            </div>

          </div>
          <div class="container-lg">
            <div class="account-keys__table">
              <div class="account-keys__table-container">
                <div class="account-keys__table-heading">

                  <div class="account-keys__table-item">
                    <span class="account-keys__table-text">Invited</span>
                  </div>

                  <div class="account-keys__table-item">
                    <span class="account-keys__table-text">Earning</span>
                  </div>

                  <div class="account-keys__table-item">
                    <span class="account-keys__table-text">Time</span>
                  </div>

                </div>
                <div class="account-keys__table-body">


                <?php foreach($affilate as $affilate_user){ ?>
                  <div class="account-keys__table-row">
                    <div class="account-keys__table-main">
                      <div class="account-keys__table-item">
                        <span class="account-keys__table-text"><?=maskEmail(db_decrypt(affilate_to_user($affilate_user->guest)["email"]));?></span>
                      </div>
                      <div class="account-keys__table-item">
                        <span class="account-keys__table-text"><?=$affilate_user->earning;?></span>
                      </div>
                      <div class="account-keys__table-item">
                        <span class="account-keys__table-text"><?=date("d/m/Y",$affilate_user->time);?></span>
                      </div>
                    </div>
                  </div>

                  <?php } ?>

                </div>
              </div>
            </div>
            <br>
            <input type="text" style="color: #0e0e0e;
    font-weight: 400;
    border: none;
    padding: 16px; width:100%" value="<?=base_url("register/").user_data()["affiliate_code"];?>" readonly> 
          </div>
        </div>
      </div>
      <div class="grid-background">
        <img width="1560" height="2450" src="<?=base_url("assets/frontend/themes");?>/images/background.webp" alt="background">
      </div>
