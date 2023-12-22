<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=3,minimum-scale=0.5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Start Wining</title>
    <link rel="icon" type="image/x-icon" href="<?=base_url("assets/frontend/themes");?>/images/logo-dark.svg" media="(prefers-color-scheme: light)">
    <link rel="icon" type="image/x-icon" href="<?=base_url("assets/frontend/themes");?>/images/logo.svg" media="(prefers-color-scheme: dark)">
    <link rel="stylesheet" href="<?=base_url("assets/frontend/themes");?>/styles/main.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.2/dist/simple-notify.min.css" />
  </head>
  <body>
    <img width="99999" height="99999" aria-label="Splash" style="user-select:none;pointer-events:none;position:absolute;top:0;left:0;width:100%;height:var(--app-height, 100vh);max-width:100%;max-height:var(--app-height, 100vh);" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSI5OTk5OXB4IiBoZWlnaHQ9Ijk5OTk5cHgiIHZpZXdCb3g9IjAgMCA5OTk5OSA5OTk5OSIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48ZyBzdHJva2U9Im5vbmUiIGZpbGw9Im5vbmUiIGZpbGwtb3BhY2l0eT0iMCI+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9Ijk5OTk5IiBoZWlnaHQ9Ijk5OTk5Ij48L3JlY3Q+IDwvZz4gPC9zdmc+">

    <div class="app">

      <header class="header">
        <div class="container">
          <div class="header-container" data-aos="fade-down">
            <nav class="header-nav">

              <a href="<?=base_url();?>" class="header-nav__item">home</a>

              <a href="<?=base_url("products");?>" class="header-nav__item">shop</a>

              <a href="<?=base_url("tutorial");?>" class="header-nav__item">tutorial</a>

            </nav>
            <div class="header-logo">
              <a href="<?=base_url();?>" class="header__logo-link" aria-label="route home">
                <img draggable="false" width="75" height="46" src="<?=base_url("assets/frontend/themes");?>/images/logo.svg" alt="logo">
              </a>
            </div>
            <div class="header-actions">
              <?php if(!session('user_key') or !session('auth')){ ?>
              <a href="<?=base_url("login");?>" class="btn btn-red">login</a>
              <a href="<?=base_url("register");?>" class="btn btn-outline-red">create an account</a>
              <?php }else{ ?>
                <div class="dropdown">
                <button class="btn btn-icon btn-red dropdown-toggle" type="button" data-bs-toggle="dropdown">
                  <span>MY ACCOUNT</span>

                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#chevron-down"></use>
                  </svg>

                </button>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="<?=base_url("account");?>">

                      <svg class="icon">
                        <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#user"></use>
                      </svg>

                      <span>My Account</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?=base_url("orders");?>">

                      <svg class="icon">
                        <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#box"></use>
                      </svg>

                      <span>my orders</span>
                    </a>
                  </li>
                  <li>
                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#settingsModal">

                      <svg class="icon">
                        <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#gear"></use>
                      </svg>

                      <span>SETTINGS</span>
                    </button>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?=base_url("logout");?>">

                      <svg class="icon">
                        <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#logout"></use>
                      </svg>

                      <span>log out</span>
                    </a>
                  </li>
                </ul>
              </div>
              <?php } ?>
            </div>
            <button onclick="headerMenuToggle()" class="header-toggle" aria-label="menu toggle">

              <svg class="icon">
                <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#menu"></use>
              </svg>

            </button>
          </div>
        </div>
      </header>
      <div class="header-menu" id="headerMenu">
        <div class="container">
          <div class="header-menu__container">
            <div class="header-menu__heading">
              <a href="<?=base_url();?>" class="header-logo" aria-label="route home">
                <img width="75" height="46" draggable="false" src="<?=base_url("assets/frontend/themes");?>/images/logo.svg" alt="logo">
              </a>
              <button onclick="headerMenuToggle()" class="header-toggle" aria-label="menu toggle">

                <svg class="icon">
                  <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#close"></use>
                </svg>

              </button>
            </div>
            <nav class="header-menu__nav">

              <a href="<?=base_url();?>" class="header-menu__nav-link">
                home
              </a>

              <a href="<?=base_url("products");?>" class="header-menu__nav-link">
                shop
              </a>

              <a href="<?=base_url("tutorial");?>" class="header-menu__nav-link">
                tutorial
              </a>

            </nav>
            <div class="header-menu__actions">
            <?php if(!session('user_key') or !session('auth')){ ?>
              <a href="<?=base_url("login");?>" class="btn btn-red">login</a>
              <a href="<?=base_url("register");?>" class="btn btn-outline-red">create an account</a>
            <?php }else{ ?>
              <div class="dropdown">
                <button class="btn btn-lg btn-icon btn-red dropdown-toggle" type="button" data-bs-toggle="dropdown">
                  <span>MY ACCOUNT</span>

                  <svg class="icon">
                    <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#chevron-up"></use>
                  </svg>

                </button>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="<?=base_url("account");?>">

                      <svg class="icon">
                        <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#user"></use>
                      </svg>

                      <span>My Account</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?=base_url("orders");?>">

                      <svg class="icon">
                        <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#box"></use>
                      </svg>

                      <span>my orders</span>
                    </a>
                  </li>
                  <li>
                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#settingsModal">

                      <svg class="icon">
                        <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#gear"></use>
                      </svg>

                      <span>SETTINGS</span>
                    </button>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?=base_url("logout");?>">

                      <svg class="icon">
                        <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#logout"></use>
                      </svg>

                      <span>log out</span>
                    </a>
                  </li>
                </ul>
              </div>

            <?php } ?>
            </div>
            <div class="header-menu__background">
              <img width="1560" height="2450" src="<?=base_url("assets/frontend/themes");?>/images/background.webp" alt="background">
            </div>
          </div>
        </div>
      </div>

      <?php if(session('user_key') or session('auth')){ ?>
      <div class="modal fade" id="settingsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <div class="header-modal">
                <div class="header-modal__heading">
                  <div class="header-modal__title">
                    <div class="header-modal__title-top"><?=db_decrypt(user_data()["email"]);?>,</div>
                    <div class="header-modal__title-text font-apex">MY SETTINGS</div>
                  </div>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    <svg class="icon">
                      <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#close"></use>
                    </svg>

                  </button>
                </div>
                <div class="header-modal__hood">
                  <div class="header-modal__hood-title">general settings</div>
                </div>
                <form action="<?=base_url("api/profile-edit");?>" method="POST" id="edit_form" class="header-modal__form">
                  <?=csrf_form();?>
                  <label class="header-modal__entry">
                    <span class="header-modal__entry-label">email</span>
                    <span class="input-group input-group-sm">
                      <span class="input-group-text">

                        <svg class="icon">
                          <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#mail"></use>
                        </svg>

                      </span>
                      <input type="email" class="form-control" placeholder="<?=db_decrypt(user_data()["email"]);?>" aria-label="email" name="email">
                    </span>
                  </label>
                  <p>If the e-mail address will not be changed, it can be left blank.</p>
                  <label class="header-modal__entry mb-6">
                    <span class="header-modal__entry-label">PASSWORD</span>
                    <span class="input-group input-group-sm">
                      <span class="input-group-text">

                        <svg class="icon">
                          <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#keypad"></use>
                        </svg>

                      </span>
                      <input type="password" class="form-control" placeholder="************" aria-label="password" required name="password">
                    </span>
                  </label>
                  <div class="header-modal__form-actions">
                    <button type="submit" class="btn btn-green btn-icon" id="edit_button">
                      <span>SAVE</span>

                      <svg class="icon">
                        <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#checkmark"></use>
                      </svg>

                    </button>
                  </div>
                </form>
                <div class="header-modal__hood">
                  <div class="header-modal__hood-title">HARDWARE SETTINGS</div>
                </div>
                <div class="header-modal__hardware">
                  <div class="header-modal__hardware-title">HARDWARE ID</div>
                  <div class="header-modal__hardware-value" id="hwid"><?=user_data()["hardware_id"];?></div>
                  <button class="btn btn-red" id="hwid_reset">
                    RESET
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        
        $("#edit_form").submit(function(e) {
            $("#edit_button").attr("disabled", true);
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                dataType: "json",
                data: form.serialize(),
                success: function(data) {
                    $("#edit_button").attr("disabled", false);
                    $("#token").val(data.data.tokens.hash);
                    if (data.status == "false") {
                        alert("error",data.message);
                    } else {
                        alert("success",data.message);
                        window.location.reload();
                    }
                }
            });
        });
        
        $("#hwid_reset").click(function(e) {
            $.ajax({
                type: "GET",
                url: "<?=base_url("api/hwid-reset");?>?hwid=reset",
                dataType: "json",
                success: function(data) {
                    if (data.status == "false") {
                        alert("error",data.message);
                    } else {
                        $("#hwid").html("HWID RESETED");
                        alert("success",data.message);
                        window.location.reload();
                    }
                }
            });
        });

    </script>

      <?php } ?>