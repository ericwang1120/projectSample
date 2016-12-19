<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
require_once("welcomeHeader.php");
?>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/registerCheck.js"></script>
    <div class="row top-buffer-20">
        <div class="col-md-4 col-md-offset-4"><h3> Registration Form</h3></div>
    </div>

    <Form action="../User/register" method="post">
        <div class="row top-buffer-20">
            <div class="col-md-1 col-md-offset-4">Name:</div>
            <div class="col-md-3"><input type="text" name="userFullName" class="form-control"></div>
        </div>

        <div class="row top-buffer-20">
            <div class="col-md-1 col-md-offset-4">Username:</div>
            <div class="col-md-3"><input type="text" name="userName" class="form-control" id="userName"></div>
            <label id="userLabel"></label>
        </div>

        <div class="row top-buffer-20">
            <div class="col-md-1 col-md-offset-4">Password:</div>
            <div class="col-md-3"><input type="password" name="userPassword" class="form-control"></div>
            <label id="passwordLabel"></label>

        </div>

        <div class="row top-buffer-20">
            <div class="col-md-1 col-md-offset-4">Repeat:</div>
            <div class="col-md-3"><input type="password" name="passwordRepeat" class="form-control"></div>
            <label id="passwordRepeatLabel"></label>
        </div>

        <div class="row top-buffer-20">
            <div class="col-md-1 col-md-offset-4">Email:</div>
            <div class="col-md-3"><input type="text" name="userEmail" class="form-control"></div>
            <label id="emailLabel"></label>
        </div>

        <div class="row top-buffer-20">
            <div class="col-md-1 col-md-offset-5">
                <input type="submit" value="Submit" class="btn btn-primary" id="registerSubmit">
            </div>

            <div class="col-md-1 ">
                <a class="btn btn-primary" href="../User/loginPage">Go Back</a>
            </div>
        </div>
    </Form>
<?php
require_once("footer.php");
