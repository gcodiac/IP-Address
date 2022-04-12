<?php
echo '<pre>';
print_r($_SERVER);
print_r($_SERVER['SERVER_ADDR']);
echo '</pre>';


?>


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