<div class="purchase">
        <div class="purchase__pricing">

          <div class="container">
            <div class="pricing">
              <div class="pricing-heading">
                <div class="pricing-heading__logo" data-aos="fade-up">
                  <img width="686" height="80" src="<?=base_url("assets/frontend/themes");?>/images/logo-text.svg" alt="logo text">
                </div>
                <div class="pricing-heading__title font-apex" data-aos="fade-up" data-aos-delay="200"><?=$product["product_name"];?> PRICING</div>
                <div class="pricing-heading__subtitle" data-aos="fade-up" data-aos-delay="350"><?=$product["product_subtitle"];?></div>
                <div class="pricing-heading__description" data-aos="fade-up" data-aos-delay="600">
                    <?=$product["product_description"];?>
                </div>
              </div>
              <div class="pricing-list">
                <div class="row">

                    <?php

                        $product_data = json_decode($product["product_period"], true);

                        // Pricing kartları oluşturma
                        function createPricingCard($type, $data, $product_key) {
                            $checkmark = base_url("assets/frontend/themes/images/icons.svg#checkmark");
                            $play = base_url("assets/frontend/themes/images/icons.svg#play");

                            if(!session('user_key') or !session('auth')){
                                $PURCHASE = base_url("login");
                            }else{
                                $PURCHASE = base_url("api/add-cart/".$product_key."?period=".$type);
                            }

                            $html = '<div class="col-lg-4 col-md-6">';
                            $html .= '<div class="pricing-card border-gray" data-aos="fade-up" data-aos-delay="150">';
                            $html .= '<div class="pricing-card__heading">';
                            $html .= '<div class="pricing-card__heading-top">' . ucfirst($type) . '</div>';
                            $html .= '<div class="pricing-card__heading-title font-apex">$' . $data['price'] . ' / ' . day_actions2($data['day']) . '</div>';
                            $html .= '</div>';
                            $html .= '<div class="pricing-card__list">';
                            
                            foreach ($data['info'] as $info) {
                                $html .= '<div class="pricing-card__item">';
                                $html .= '<svg class="icon">';
                                $html .= '<use xlink:href="'. $checkmark .'"></use>';
                                $html .= '</svg>';
                                $html .= '<span>' . $info . '</span>';
                                $html .= '</div>';
                            }

                            $html .= '</div>';
                            $html .= '<div class="pricing-card__link">';
                            $html .= '<a href="#" onclick="go_pay(`'. $PURCHASE .'`)" class="btn btn-red btn-lg btn-shine btn-icon">';
                            $html .= '<span>PURCHASE NOW</span>';
                            $html .= '<svg class="icon">';
                            $html .= '<use xlink:href="'. $play .'"></use>';
                            $html .= '</svg>';
                            $html .= '</a>';
                            $html .= '</div>';
                            $html .= '</div>';
                            $html .= '</div>';

                            return $html;
                        }

                        // Oluşturulan JSON verisine göre HTML kartlarını oluşturma
                        foreach ($product_data as $type => $data) {
                            echo createPricingCard($type, $data, $product["product_key"]);
                        }

                    ?>

                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="purchase__watch">

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

            <script>
            
            $("#play_button").click(function(e) {
                
                $("#play_area").html('<iframe width="560" height="315" src="<?=$product["product_video"];?>&amp;controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
                
            });
            
        </script>

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
        <div class="purchase__background">
          <div class="purchase__background-hero">
            <img draggable="false" src="<?=base_url("assets/frontend/themes");?>/images/hero.webp" alt="hero">
          </div>
          <div class="purchase__background-grid">
            <img width="1560" height="2450" draggable="false" src="<?=base_url("assets/frontend/themes");?>/images/background.webp" alt="grid effect">
          </div>
        </div>
      </div>

      <script>
<?php
if(!session('user_key') or !session('auth')){
?>
function go_pay(link) {
    window.location.href = link;
}
<?php 
}else{
?>
function go_pay(link) {
  $.ajax({
        url: link,
        type: "GET",
        dataType: "json",
        success: function(data) {
          if (data.status === "false") {
            alert("error", data.message); 
          } else {
            alert("success", data.message);
            setTimeout(function() {
              window.location.href = data.data.redirect;
            }, 2500);
          }
        }
      });
}
<?php
}
?>

      </script>