<?php
/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
//transaction request
$app->get('/transaction/all/account/{accountID}', function ($request, $response) {
    //Create object of dbHandler
    $db = new dbHandler("transaction");
    $condition = array();
    $condition["account"] = $request->getAttribute('accountID');
    $result = $db->selectAll($condition);

    //check userID
    if(checkUserByAccount($request->getAttribute('accountID'))){
        $response->write($result);
    }
    else{
        $response->write("fail");
    }
    return $response;
});