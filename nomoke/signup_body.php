<div class="container" style="margin-top:130px">
      <div class="row">
             <div class="center">
                  <h2 class="text-center">Sign Up</h2>
                         <form method="post" action="signup_database.php">
                                <input type="hidden" name ="submitted" value="true" >
                                        <div class="form-group">
                                              <label for="inputName">Name</label>
                                                  <input class="form-control" type="text" name="name"  id="inputName" placeholder="Name" required> </input>
                                        </div>
                                        <div class="form-group">
                                              <label for="inputEmail">Email</label>
                                                   <input class="form-control" type="email" name="email" id="inputEmail"
                                                   placeholder="Email" required=></input>
                                         </div>
                                        <div class="form-group">
                                              <label for="inputPhone">Password</label>
                                                   <input class="form-control" type="password" name="pwd" id="inputPassword" placeholder="********" required></input>
                                        </div>
                                        <div class="checkbox">
                                              <label>
                                                   <input id="inputAddList" type="checkbox" required>
                                                     Agree with <a href="#"> Terms and Condition </a>  
                                                    </input>
                                               </label>
                                        </div>
                                        <div class="form-group">
                                               <input type="submit" value="submit">
                                               </input>
                                        </div>
        
                          </form>
                     </div>
            </div>       
    </div>