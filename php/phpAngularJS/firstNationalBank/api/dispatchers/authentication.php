<?php
/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
//Login request
$app->post('/login', function ($request, $response) {
    //Create object of dbHandler
    $db = new dbHandler("user");
    $sql = 'select * from user t where t.user_Name="' . $request->getParam('userName') . '" and t.user_password="' . md5($request->getParam('userPassword')) . '"';
    $result = $db->query($sql);
    if ($result != "[]") {
        $response->write('success');
        $user = json_decode($result, true);
        $_SESSION['userID'] = $user[0]['ID'];
        $_SESSION['userName'] = $user[0]['USER_PASSWORD'];
    } else {
        $response->write('fail');
    }
    return $response;
});

//get session
$app->get('/session', function ($request, $response, $args) {
    if (isset($_SESSION['userID'])) {
        $response->write('success');
    } else {
        $response->write('fail');
    }
    return $response;
});

//logout
$app->get('/logout', function ($request, $response, $args) {
    if(isset($_SESSION['userID'])){
        unset($_SESSION['userID']);
        unset($_SESSION['userName']);
        $response->write('success');
    }
    else{
        $response->write('fail');
    }
    return $response;
});