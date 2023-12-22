<div class="auth">

        <div class="container">
          <div class="auth-card" data-aos="fade-up">
            <div class="auth-card__heading">

              <div class="auth-card__heading-logo">
                <img width="686" height="80" src="<?=base_url("assets/frontend/themes");?>/images/logo-text.svg" alt="logo text">
              </div>

              <div class="auth-card__heading-title font-apex">LOG INTO YOUR ACCOUNT</div>
            </div>
            <div class="auth-card__inner">

            <form action="<?=base_url("api/login");?>" method="POST" id="login_form" class="auth-card__form">
                  <?=csrf_form();?>
                <label class="input-group mb-5-5">
                  <span class="input-group-text">

                    <svg class="icon">
                      <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#mail"></use>
                    </svg>

                  </span>
                  <input type="email" class="form-control" name="email" placeholder="PLEASE INSERT YOUR EMAIL" aria-label="Email" required>
                </label>
                <label class="input-group mb-12">
                  <span class="input-group-text">

                    <svg class="icon">
                      <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#keypad"></use>
                    </svg>

                  </span>
                  <input type="password" class="form-control" name="password" placeholder="PLEASE INSERT YOUR PASSWORD" aria-label="password" required title="The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one special character.">
                  
                </label>
                <a href="#" style="margin-top:-1.5rem; margin-right:-22rem">Forget Password</a>
                <button type="submit" id="login_button" class="btn btn-sm btn-red btn-icon btn-shine">
                  <span>LOG IN</span>

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
        
        $("#login_form").submit(function(e) {
            $("#login_button").attr("disabled", true);
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                dataType: "json",
                data: form.serialize(),
                success: function(data) {
                    $("#login_button").attr("disabled", false);
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