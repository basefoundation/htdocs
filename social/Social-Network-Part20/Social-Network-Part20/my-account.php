<?php

if (isset($_POST['uploadprofileimg'])) {

        $image = base64_encode(file_get_contents($_FILES['profileimg']['tmp_name']));

        $options = array('http'=>array(
                'method'=>"POST",
                'header'=>"Authorization: Bearer cbde1aa32cdf3e9f5956f0126cf41ade51021d47\n".
                "Content-Type: application/x-www-form-urlencoded",
                'content'=>$image
        ));

        $context = stream_context_create($options);

        $imgurURL = "https://api.imgur.com/3/image";

        $response = file_get_contents($imgurURL, false, $context);
}
?>
<h1>My Account</h1>
<form action="my-account.php" method="post" enctype="multipart/form-data">
        Upload a profile image:
        <input type="file" name="profileimg">
        <input type="submit" name="uploadprofileimg" value="Upload Image">
</form>
