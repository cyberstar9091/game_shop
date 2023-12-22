<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=3,minimum-scale=0.5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Start Wining</title>
    <link rel="icon" type="image/x-icon" href="<?=base_url("assets/frontend/themes");?>/images/logo-dark.svg" media="(prefers-color-scheme: light)">
    <link rel="icon" type="image/x-icon" href="<?=base_url("assets/frontend/themes");?>/images/logo.svg" media="(prefers-color-scheme: dark)">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  </head>
    <body>
        <iframe style='display:block;top:0;left:0;position:absolute;width:100%;height:100%;' frameborder='0' scrolling='no' src='<?=$pay["url"];?>' allowfullscreen="true"></iframe>
    
    <script>
    
            $.ajax({
                url: "<?=base_url("pay/check/".$pay["uniqid"]);?>",
                type: "GET",
                dataType: "json",
                success: function(data){
                    if(data.data.sellix.status == "COMPLETED"){
                        $.ajax({
                            url: "<?=base_url("pay/complete/".$pay["uniqid"]);?>",
                            type: "GET",
                            dataType: "json",
                        });
                        setTimeout(function(){
                            window.location.href = "<?=base_url("payment-successful");?>";
                        }, 2500);
                    }
                }
            });

        setInterval(function(){
            $.ajax({
                url: "<?=base_url("pay/check/".$pay["uniqid"]);?>",
                type: "GET",
                dataType: "json",
                success: function(data){
                    if(data.data.sellix.status == "COMPLETED"){
                        $.ajax({
                            url: "<?=base_url("pay/complete/".$pay["uniqid"]);?>",
                            type: "GET",
                            dataType: "json",
                        });
                        setTimeout(function(){
                            window.location.href = "<?=base_url("payment-successful");?>";
                        }, 2500);
                    }
                }
            });
        }, 4000);

    </script>
    
    </body>
</html>
