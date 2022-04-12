<?php
    // echo '<pre>';
    // // print_r($_SERVER);
    // echo '</pre>';

    // returns first forwarded IP match it finds
    function forwarded_ip() {
    $keys = array(
        'HTTP_X_FORWARDED_FOR', 
        'HTTP_X_FORWARDED', 
        'HTTP_FORWARDED_FOR', 
        'HTTP_FORWARDED',
        'HTTP_CLIENT_IP', 
        'HTTP_X_CLUSTER_CLIENT_IP', 
    );
    
    foreach($keys as $key) {
        if(isset($_SERVER[$key])) {
            $ip_array = explode(',', $_SERVER[$key]);
            foreach($ip_array as $ip) {
                $ip = trim($ip);
                if(validate_ip($ip)) {
                return $ip;          
                }
            }
        }
    }
    return '';
    }

    function validate_ip($ip) {
        if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return false;
        } else {
            return true;
        }
    }


    $remote_ip = $_SERVER['REMOTE_ADDR'];
    $forwarded_ip = forwarded_ip();

?>


<!doctype html>
<html lang="en">
  <head>
    <title>What is my IP Address</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class=" bg-light shadow border-rounded container text-center p-3">
          <h1 class="display-4">What is my IP Address</h1>
        
          <hr class="my-4">
        <p>The request came from:</p>
        <div class="badge bg-primary bg-gradient h3">
            <strong><?php echo $remote_ip; ?></strong>
        </div>

        <p>The request was forwarded for:</p>
        <div class="badge bg-primary bg-gradient h3">
            <?php if($forwarded_ip != '') { ?>
                <strong><?php echo $forwarded_ip; ?></strong>
            <?php } ?>
        </div>
        
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  


    <script>
        console.log(window.location);
        
        val = window.navigator;
        val = window.navigator.appName;
        val = window.navigator.appVersion;
        val = window.navigator.userAgent;
        val = window.navigator.platform;
        val = window.navigator.vendor;
        val = window.navigator.language;

        console.log(val);
    </script>
</body>
</html>