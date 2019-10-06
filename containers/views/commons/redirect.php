<!DOCTYPE html>
<html>
<head>
  <title>Đang chuyển hướng</title>
    <meta name="robots" content="noindex, follow">
    <base href="<?php echo $GLOBALS['configs']['app_url']?>">
    <link rel="stylesheet" type="text/css" href="public/groups/redirect/chuyen-huong.css">
</head>
<body>
   <div class="container">
        <div class="bird-container bird-container--one">
            <div class="bird bird--one"></div>
        </div>

        <div class="bird-container bird-container--two">
            <div class="bird bird--two"></div>
        </div>

        <div class="bird-container bird-container--three">
            <div class="bird bird--three"></div>
        </div>

        <div class="bird-container bird-container--four">
            <div class="bird bird--four"></div>
        </div>
    </div>
 <div id="redirect-page-content"  style="width: 100%; background:#fff; height: 100%; margin: 50px 0px 30px 0px; text-align: center; font-size: 18px;">
        <div class="redirect-message">
        <?php if (!empty($redirect_to)) { ?>
        <img src="public/groups/redirect/chuyen-huong.png" alt="" />
        <p style="font-size: 95%;margin: 8px !important; color: #191919;">Bạn đang chuyển hướng đến:</p>
        <strong style="margin: 8px !important;"><?php echo $redirect_name ?></strong>
         <p style="font-size: 90%;margin: 8px 0px 15px 0px !important;color: #191919;">(Tự động chuyển sau <span style="color: red" id="timer"></span> giây) </p> 
          <button class="chuyenhuong" style="margin: 0px 10px 0px 0px;background: #009966; border: 1px solid #009966; color: #fff; cursor: pointer; font-family: 'Oswald', arial, serif !important;
            font-size: 13px ;  font-weight: bold ; padding: 5px 15px;text-decoration: none;text-transform: uppercase;text-shadow: none;
        "onclick="window.location.href='<?php  echo $redirect_to; ?>'">✓ CHUYỂN TỚI LUÔN</button>
        <!-- <button class="chuyenhuong" style="background: #033; border: 1px solid #033; color: #fff; cursor: pointer; font-family: 'Oswald', arial, serif !important;
            font-size: 13px ;  font-weight: bold ; margin-bottom: 10px;padding: 5px 15px;text-decoration: none;text-transform: uppercase;text-shadow: none;
        " onclick="self.close()">✘ Hủy bỏ</button> <br />  -->
        
        <?php
        } else {
          echo ('Link chuyển hướng bị lỗi');
        }
        ?>
        </div>
 </div>

<script>
  var wait_time = <?php echo $wait_time; ?>;
  var wait_seconds = <?php echo $wait_seconds; ?>;
    var redirect = window.setTimeout(function(){
     // window.location.href='<?php echo $redirect_to; ?>'
  },wait_time);

document.getElementById('timer').innerHTML = wait_seconds;
var timer = wait_seconds;
var interval = setInterval(function() {
   var seconds = timer;
   if (seconds > 0) {
    --seconds; 
    document.getElementById('timer').innerHTML = seconds + "";
    timer = seconds;
   }
   else {
   }
 }, 1000);
</script>

</body>
</html>