<?php 
 
// Google reCAPTCHA API keys settings 
$secretKey  = 'Your_reCaptcha_Secret_Key'; 
 
// Email settings 
$recipientEmail = 'admin@example.com'; 
 
 
// If the form is submitted 
$postData = $statusMsg = ''; 
$status = 'error'; 
if(isset($_POST['submit'])){ 
    $postData = $_POST; 
     
    // Validate form input fields 
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){ 
         
        // Validate reCAPTCHA checkbox 
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
 
            // Verify the reCAPTCHA API response 
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
             
            // Decode JSON data of API response 
            $responseData = json_decode($verifyResponse); 
             
            // If the reCAPTCHA API response is valid 
            if($responseData->success){ 
                // Retrieve value from the form input fields 
                $name = !empty($_POST['name'])?$_POST['name']:''; 
                $email = !empty($_POST['email'])?$_POST['email']:''; 
                $message = !empty($_POST['message'])?$_POST['message']:''; 
                 
                // Send email notification to the site admin 
                $to = $recipientEmail; 
                $subject = 'New Contact Request Submitted'; 
                $htmlContent = " 
                    <h4>Contact request details</h4> 
                    <p><b>Name: </b>".$name."</p> 
                    <p><b>Email: </b>".$email."</p> 
                    <p><b>Message: </b>".$message."</p> 
                "; 
                 
                // Always set content-type when sending HTML email 
                $headers = "MIME-Version: 1.0" . "\r\n"; 
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                // More headers 
                $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n"; 
                 
                // Send email 
                mail($to, $subject, $htmlContent, $headers); 
                 
                $status = 'success'; 
                $statusMsg = 'Thank you! Your contact request has been submitted successfully.'; 
                $postData = ''; 
            }else{ 
                $statusMsg = 'Robot verification failed, please try again.'; 
            } 
        }else{ 
            $statusMsg = 'Please check the reCAPTCHA checkbox.'; 
        } 
    }else{ 
        $statusMsg = 'Please fill all the mandatory fields.'; 
    } 
} 
 
?>


<div class="auth">

<div class="container">
  <div class="auth-card" data-aos="fade-up">
    <div class="auth-card__heading">

      <div class="auth-card__heading-logo">
        <img width="686" height="80" src="<?=base_url("assets/frontend/themes");?>/images/logo-text.svg" alt="logo text">
      </div>

      <div class="auth-card__heading-title font-apex">CREATE AN ACCOUNT</div>
    </div>
    <div class="auth-card__inner">

    <form action="<?=base_url("api/register");?>" method="POST" id="register_form" class="auth-card__form">
                  <?=csrf_form();?>
        <?php if(@$affilate) { ?>
        <input type="hidden" name="affilate" value="<?=@$affilate;?>">
        <?php } ?>
        <label class="input-group mb-5-5">
          <span class="input-group-text">

            <svg class="icon">
              <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#mail"></use>
            </svg>

          </span>
          <input type="email" class="form-control" name="email" placeholder="PLEASE INSERT YOUR EMAIL" aria-label="Email" required>
        </label>
        <label class="input-group mb-5-5">
          <span class="input-group-text">

            <svg class="icon">
              <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#keypad"></use>
            </svg>

          </span>
          <input type="password" class="form-control" name="password" placeholder="PLEASE INSERT YOUR PASSWORD" aria-label="password" required title="The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one special character.">
        </label>
        <label class="input-group mb-12">
          <span class="input-group-text">

            <svg class="icon">
              <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#keypad"></use>
            </svg>

          </span>
          <input type="password" class="form-control" name="confirmPassword" placeholder="PLEASE CONFIRM YOUR PASSWORD" aria-label="confirmPassword" required title="The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one special character.">
        </label>
        <label class="input-group mb-12">
          <div class="g-recaptcha" data-sitekey="6LeaUDkpAAAAANMAbIyKvOCsfi-czsqfsvvUQQW3"></div>
        </label>
        <p>The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one special character.</p>
        <button type="submit" id="register_button" class="btn btn-sm btn-red btn-icon btn-shine">
          <span>CREATE ACCOUNT</span>

          <svg class="icon">
            <use xlink:href="<?=base_url("assets/frontend/themes");?>/images/icons.svg#checkmark"></use>
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
        
        $("#register_form").submit(function(e) {
            $("#register_button").attr("disabled", true);
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                dataType: "json",
                data: form.serialize(),
                success: function(data) {
                    $("#register_button").attr("disabled", false);
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>