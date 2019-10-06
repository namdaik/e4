<?php

    class UrlRedirectController {

        public function accesstrade($url){
            $redirect_to = 'https://fast.accesstrade.com.vn/deep_link/4724097529828107456?url=' . $url;
            $redirect_name = $url;
            $wait_time    = 5000; // thời gian tự động chuyển hướng (tính bằng millisecond - ở đây là 30000 ml = 30s).
            $wait_seconds = $wait_time / 1000;
            require('containers/views/commons/redirect.php');
        }
    }