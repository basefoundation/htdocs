<?php include('header.php');
include('./classes/Login.php');
include('nav.php');
?>

<?php
//include('./classes/DB.php');


if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
} else {
        echo 'Not logged in';
}
echo "<h1>Notifcations</h1>";
if (DB::query('SELECT * FROM notifications WHERE receiver=:userid', array(':userid'=>$userid))) {

        $notifications = DB::query('SELECT * FROM notifications WHERE receiver=:userid ORDER BY id DESC', array(':userid'=>$userid));

        foreach($notifications as $n) {

                if ($n['type'] == 1) {
                        $senderName = DB::query('SELECT username FROM users WHERE id=:senderid', array(':senderid'=>$n['sender']))[0]['username'];

                        if ($n['extra'] == "") {
                                echo "You got a notification!<hr />";
                        } else {
                                $extra = json_decode($n['extra']);

                                echo $senderName." mentioned you in a post! - ".$extra->postbody."<hr />";
                        }

                } else if ($n['type'] == 2) {
                        $senderName = DB::query('SELECT username FROM users WHERE id=:senderid', array(':senderid'=>$n['sender']))[0]['username'];
                        echo $senderName." liked your post!<hr />";
                }

        }

}


?>
 <div class="modal fade" role="dialog" tabindex="-1" style="padding-top:100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Comments</h4></div>
                <div class="modal-body" style="max-height: 400px; overflow-y: auto">
                    <p>The content of your modal.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark navbar-fixed-bottom" style="position: relative">
        <footer>
            <div class="container">
                <p class="copyright">memez.in © 2018</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script></body></html>