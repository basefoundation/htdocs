<?php
if(isset($_SESSION['id'])) {
	echo $_SESSION['id'];
} else {
	echo "You are not logged in!";   
}
?>
<div class="container" style="margin-top:130px">
		<div class="row">
             <h1 class="text-center">Fill In The Blanks</h1>
               <div class="col-md-4 col-md-offset-4">
                     <div class="form-group has-danger">
                           <h4 class="text-center">S <input type="text" style="width: 20px; height: 20px" /> <input type="text" style="width: 20px; height: 20px" /> P C <input type="text" style="width: 20px; height: 20px" /> <input type="text" style="width: 20px; height: 20px" /> T</h4>
		<!--<input class="form-control" type="text" id="inputName" placeholder=""></input> -->
		            </div>
		                   <div class="col-md-24 col-md-offset-0">
		                              <div class="form-group has-danger">
			                                  <a href="matchnow_sql.php"><button class="btn btn-success btn-block" title="LOG IN for match now!">Match Now</button></a>
		                              </div>
		                   </div>
                </div>
       </div>
</div>