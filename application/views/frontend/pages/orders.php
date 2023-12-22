<div class="orders">
        <div class="container" data-aos="fade-up">
          <div class="orders-heading">
            <div class="orders-heading__top"><?=db_decrypt(user_data()["email"]);?>,</div>
            <div class="orders-heading__title font-apex">MY ORDERS HISTORY</div>
          </div>
        </div>
        <div class="container-lg" data-aos="fade-up">
          <div class="orders-table">
            <table class="orders-table__container">
              <thead>
                <tr class="orders-table__heading">
                  <th>PRODUCT</th>
                  <th>PERIOD</th>
                  <th>PRICE</th>
                  <th>FINISH DATE</th>
                  <th>STATUS</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($orders as $order){ ?>
                <tr class="orders-table__row">
                  <td><?=product_info($order->product_key)["product_name"];?></td>
                  <?php
                    $get_period = get_where("products",["product_key" => $order->product_key])->row_array();
                    $get_period["product_period"] = json_decode($get_period["product_period"],true);
                  ?>
                  <td><?=day_actions($get_period["product_period"][$order->period]["day"]);?></td>
                  <td><?=$order->price;?></td>
                  <td><?=date("d/m/Y",$order->finish_time);?></td>
                  <td><?=$order->status;?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <br>
        <br>
        <div class="container" data-aos="fade-up">
          <div class="orders-heading">
            <div class="orders-heading__title font-apex">MY PAYMENT HISTORY</div>
          </div>
        </div>
        <div class="container-lg" data-aos="fade-up">
          <div class="orders-table">
            <table class="orders-table__container">
              <thead>
                <tr class="orders-table__heading">
                  <th>PRODUCT</th>
                  <th>PERIOD</th>
                  <th>PRICE</th>
                  <th>TIME</th>
                  <th>STATUS</th>
                </tr>
              </thead>
              <tbody>
            <?php
                $payments = get_where("payments",["user_key" => user_data()["user_key"], "status!=" => "completed"],NULL,NULL,["id","DESC"])->result();
            ?>
              <?php foreach($payments as $payment){ ?>
                <tr class="orders-table__row">
                  <td><?=product_info($payment->product_key)["product_name"];?></td>
                  <?php
                    $get_period = get_where("products",["product_key" => $payment->product_key])->row_array();
                    $get_period["product_period"] = json_decode($get_period["product_period"],true);
                  ?>
                  <td><?=day_actions($get_period["product_period"][$payment->period]["day"]);?></td>
                  <td><?=$payment->price;?></td>
                  <td><?=date("d/m/Y",$payment->time);?></td>
                  <?php if($payment->status == "pending"){ ?>
                  <td><a href="<?=base_url("pay/page/".$payment->order_key);?>" class="btn btn-sm btn-red">PAY NOW</a></td>
                  <?php }else if($payment->status == "canceled"){ ?>
                  <td>Canceled</td>
                  <?php } ?>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
      <div class="grid-background">
        <img width="1560" height="2450" src="<?=base_url("assets/frontend/themes");?>/images/background.webp" alt="background">
      </div>