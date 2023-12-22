<div class="container">
        <div class="products">
          <div class="products__heading">
            <div class="products__heading-logo" data-aos="fade-down" data-aos-delay="200">
              <img width="686" height="80" src="<?=base_url("assets/frontend/themes");?>/images/logo-text.svg" alt="logo text">
            </div>
            <div class="products__heading-title font-apex" data-aos="fade-down">products list</div>
          </div>


          <div class="products__list">

          
<?php
$groupedProducts = array_chunk($products, 3);

foreach ($groupedProducts as $group) {
    echo '<div class="row">';
    foreach ($group as $product) {
        $imageSrc = 'assets/frontend/themes/images/products/' . $product['product_image'];
        $game_url = base_url('purchase/' . $product['product_slug']);
        echo '
            <div class="col-md-4 col-6">
                <a href="'. $game_url .'" class="products__image" data-aos="fade-up-right" data-aos-delay="200">
                    <img width="404" height="585" src="' . $imageSrc . '" alt="game thumbnail">
                </a>
            </div>
        ';
    }
    echo '</div>';
}

?>


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
      </div>
      <div class="grid-background">
        <img width="1560" height="2450" src="<?=base_url("assets/frontend/themes");?>/images/background.webp" alt="background">
      </div>