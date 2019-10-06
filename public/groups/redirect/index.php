<?php
// get the redirection url from GET variable
$redirect_to = !empty($_GET['url']) ? trim(strip_tags(stripslashes($_GET['url']))) : '';
$wait_time    = 30000; // thời gian tự động chuyển hướng (tính bằng millisecond - ở đây là 30000 ml = 30s).
$wait_seconds = $wait_time / 1000;
  global $redirect_to, $wait_seconds, $wait_time;
  if (empty($redirect_to) || empty($wait_time)) return;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Đang chuyển hướng</title>
    <meta name="robots" content="noindex, follow">
      <link rel="stylesheet" type="text/css" href="css/chuyen-huong.css">
      <noscript><meta http-equiv="refresh" content="<?php echo $wait_seconds; ?>;url=<?php echo $redirect_to; ?>"></noscript>
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
        <img src="images/chuyen-huong.png" alt="" />
        <p style="font-size: 95%;margin: 8px !important; color: #191919;">Bạn đang chuyển hướng đến:</p>
        <strong style="margin: 8px !important;"><?php echo $redirect_to ?></strong>
         <p style="font-size: 90%;margin: 8px 0px 15px 0px !important;color: #191919;">(Tự động chuyển sau <span style="color: red" id="timer"></span> giây) </p> 
          <button class="chuyenhuong" style="margin: 0px 10px 0px 0px;background: #009966; border: 1px solid #009966; color: #fff; cursor: pointer; font-family: 'Oswald', arial, serif !important;
            font-size: 13px ;  font-weight: bold ; padding: 5px 15px;text-decoration: none;text-transform: uppercase;text-shadow: none;
        "onclick="window.location.href='<?php  echo $redirect_to; ?>'">✓ CHUYỂN TỚI LUÔN</button>
        <!-- <button class="chuyenhuong" style="background: #033; border: 1px solid #033; color: #fff; cursor: pointer; font-family: 'Oswald', arial, serif !important;
            font-size: 13px ;  font-weight: bold ; margin-bottom: 10px;padding: 5px 15px;text-decoration: none;text-transform: uppercase;text-shadow: none;
        " onclick="self.close()">✘ Hủy bỏ</button> <br />  -->
        
         <?php
        } else {
        _echo ('Link chuyển hướng bị lỗi');
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
  </script>
    
<script>

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