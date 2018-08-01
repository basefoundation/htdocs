<?php
    require '../vendor/autoload.php';

    $instagram = new Andreyco\Instagram\Client(array(
      'apiKey'      => 'YOUR_APP_KEY',
      'apiSecret'   => 'YOUR_APP_SECRET',
      'apiCallback' => 'YOUR_APP_CALLBACK',
      'scope'       => array('basic'),
    ));

    echo "<a href='{$instagram->getLoginUrl()}'>Login with Instagram</a>";
?>