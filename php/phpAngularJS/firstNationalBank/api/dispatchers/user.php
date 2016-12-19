<?php
/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
//account request
$app->post('/user', function ($request, $response) {
    //Create object of dbHandler
    $user = array();
    $user['USER_NAME'] = $request->getParam('userName');
    $user['USER_PASSWORD'] = md5($request->getParam('userPassword'));
    $user['USER_FNAME'] = $request->getParam('userFName');
    $user['USER_LNAME'] = $request->getParam('userLName');
    $user['USER_EMAIL'] = $request->getParam('userEmail');
    $db = new dbHandler("user");
    $result = $db->add($user);
    if ($result) {
        $response->write('success');
    } else {
        $response->write('fail');
    }
    return $response;
});