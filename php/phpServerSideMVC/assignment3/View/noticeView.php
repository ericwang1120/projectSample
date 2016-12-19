<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
require_once("topMenu.php");
if ($data['URL'] != "") {
    echo $data["msg"];
    header('refresh:2;url=' . $data['URL']);
}
require_once("footer.php");
