<div class="auth">

        <div class="container">
          <div class="auth-card" data-aos="fade-up">
            <div class="auth-card__heading">

              <div class="auth-card__heading-logo">
                <img width="686" height="80" src="<?=base_url("assets/frontend/themes");?>/images/logo-text.svg" alt="logo text">
              </div>

              <div class="auth-card__heading-title font-apex">RESET YOUR ACCOUNT PASSWORD</div>
            </div>
            <div class="auth-card__inner">

            <form action="<?=base_url("api/forgot");?>" method="POST" id="forgot_form" class="auth-card__form">
                  <?=csrf_form();?>
                <label class="input-group mb-5-5">
                  <span class="input-group-text">

                    <svg class="icon">
                      <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#mail"></use>
                    </svg>

                  </span>
                  <input type="email" class="form-control" name="email" placeholder="PLEASE INSERT YOUR EMAIL" aria-label="Email" required>
                </label>
                <button type="submit" id="forgot_button" class="btn btn-sm btn-red btn-icon btn-shine">
                  <span>RESET</span>

                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#chevron-right"></use>
                  </svg>

                </button>
              </form>

            </div>
          </div>
        </div>

        <div class="auth-background">
          <div class="auth-background__hero">
            <img draggable="false" width="1920" height="1080" src="<?=base_url("assets/frontend/themes");?>/images/hero.webp" alt="hero">
          </div>
          <div class="auth-background__grid">
            <img width="1560" height="2450" draggable="false" src="<?=base_url("assets/frontend/themes");?>/images/background.webp" alt="grid effect">
          </div>
        </div>
      </div>


<script>
        
        $("#forgot_form").submit(function(e) {
            $("#forgot_button").attr("disabled", true);
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                dataType: "json",
                data: form.serialize(),
                success: function(data) {
                    $("#forgot_button").attr("disabled", false);
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