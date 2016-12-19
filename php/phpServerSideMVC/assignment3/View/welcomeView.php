<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
require_once("topMenu.php");
?>
    <div class="panel panel-default">
        <h3 class="panel-title"></h3>
        <div class="panel-body" style="padding:0;border:0px;height:700px">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2>Welcome!<?php echo ' ' . $_SESSION["userFullName"] ?></h2>
                    <h3>You can search products in search page!</h3>
                    <h3>Unfortunately, the brose page isn't finished yet.</h3>
                </div>
            </div>
        </div>
    </div>
<?php
require_once("footer.php");