

      <div class="auth">

        <div class="container">
          <div class="auth-heading">
            <div class="auth-heading__logo">
              <img src="<?=base_url("assets/frontend/coming_soon");?>/images/logo-text.svg" alt="logo text">
            </div>
            <div class="auth-heading__title font-apex">UNDETECTED GAME CHEATS</div>
            <div class="auth-heading__text">Sign up to get an email when we are live</div>
          </div>
        </div>

        <div class="container">
          <div class="auth-card auth-card--small">
            <div class="auth-card__heading">

              <div class="auth-card__heading-top">COMING SOON</div>

              <div class="auth-card__heading-title font-apex">SIGN UP AND GET NOTIFIED</div>
            </div>
            <div class="auth-card__inner">











              <form action="<?=base_url("api/newsletter");?>" method="POST" id="newsletter_form" class="auth-card__form">
                  <?=csrf_form();?>
                <label class="input-group mb-7">
                  <span class="input-group-text">

                    <svg class="icon">
                      <use xlink:href="<?=base_url("assets/frontend/coming_soon");?>/images/icons.svg#mail"></use>
                    </svg>

                  </span>
                  <input type="email" name="email" class="form-control" placeholder="PLEASE INSERT YOUR EMAIL" aria-label="Email" required>
                </label>
                <button type="submit" class="btn btn-sm btn-red btn-icon btn-shine" id="newsletter_button">
                  <span>SIGN UP TO OUR NEWSLETTER</span>

                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/coming_soon");?>/images/icons.svg#checkmark"></use>
                  </svg>

                </button>
              </form>














            </div>
          </div>
        </div>

        <div class="auth-background">
          <div class="auth-background__hero">
            <img draggable="false" src="<?=base_url("assets/frontend/coming_soon");?>/images/hero.webp" alt="hero">
          </div>
          <div class="auth-background__grid">
            <img draggable="false" src="<?=base_url("assets/frontend/coming_soon");?>/images/background.webp" alt="grid effect">
          </div>
        </div>
      </div>

      <script>
        
        $("#newsletter_form").submit(function(e) {
            $("#newsletter_button").attr("disabled", true);
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                dataType: "json",
                data: form.serialize(),
                success: function(data) {
                    $("#newsletter_button").attr("disabled", false);
                    $("#token").val(data.data.tokens.hash);
                    if (data.status == "false") {
                        alert("error",data.message);
                    } else {
                        alert("success",data.message);
                    }
                }
            });
        });
        
    </script>