<div class="orders">
        <div class="container" data-aos="fade-up">
          <div class="orders-heading">
            <div class="orders-heading__top"><?=db_decrypt(user_data()["email"]);?>,</div>
            <div class="orders-heading__title font-apex">CART</div>
          </div>
        </div>
        <div class="container-lg" data-aos="fade-up">
          <div class="orders-table">
            <table class="orders-table__container">
              <thead>
                <tr class="orders-table__heading">
                  <th>NAME</th>
                  <th>PERIOD</th>
                  <th>PERIOD DAY</th>
                  <th>PRICE</th>
                </tr>
              </thead>
              <tbody>
                
              <?php foreach($cart as $carts): ?>
                    <tr class="orders-table__row">
                        <td><?php echo $carts['name']; ?></td>
                        <td><?php echo $carts['period']; ?></td>
                        <td><?php echo $carts['period_day']; ?></td>
                        <td><?php echo $carts['subtotal']; ?></td>
                    </tr>
              <?php endforeach; ?>

              </tbody>
            </table>
            <hr>
            <form action="<?=base_url("api/use-coupon");?>" method="POST" id="coupon_form">
              <?=csrf_form();?>
              <label class="input-group">
                    <input type="text" class="form-control" name="coupon" maxlength="16" placeholder="Coupon Code" style="height: 55px; <?php if(!$this->agent->mobile()){ echo 'margin-right: 55em;'; } ?>" required>
              </label>
              <br>
              <button type="submit" class="btn btn-sm btn-red" id="coupon_button">Use Coupon</button>
            </form>
          </div>
        </div>
        
      </div>
      <div class="grid-background">
        <img width="1560" height="2450" src="<?=base_url("assets/frontend/themes");?>/images/background.webp" alt="background">
      </div>

      <script>
        
        $("#coupon_form").submit(function(e) {
            $("#coupon_button").attr("disabled", true);
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                dataType: "json",
                data: form.serialize(),
                success: function(data) {
                    $("#coupon_button").attr("disabled", false);
                    $("#token").val(data.data.tokens.hash);
                    if (data.status == "false") {
                        alert("error",data.message);
                    } else {
                        alert("success",data.message);
                        window.location.href = data.data.redirect;
                    }
                }
            });
        });
        
    </script>