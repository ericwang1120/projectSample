<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
require_once("welcomeHeader.php");
?>
    <form action="../User/login" method="post">
        <div class="row top-buffer-20">
            <div class="col-md-1 col-md-offset-4">Username:</div>
            <div class="col-md-2 "><input type="text" class="form-control" name="userName" placeholder="Enter username"></div>
        </div>

        <div class="row top-buffer-20">
            <div class="col-md-1 col-md-offset-4 ">Password:</div>
            <div class="col-md-2 "><input type="password" class="form-control" name="userPassword" placeholder="Enter password"></div>
        </div>

        <div class="row top-buffer-20">
            <div class="col-md-1 col-md-offset-4">
                <input type="submit" class="btn btn-link" value="Login">
            </div>
            <div class="col-md-1 ">
                <a class="btn btn-link" href="../User/registerPage">Register</a>
            </div>
        </div>
    </form>
<?php
require_once("footer.php");
