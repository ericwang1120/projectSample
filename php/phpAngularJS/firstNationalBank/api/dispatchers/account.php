<?php
/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
//account request
$app->get('/accountList', function ($request, $response) {
    //Create object of dbHandler
    $db = new dbHandler("account");
    $condition = array();
    $condition["USER"] = $_SESSION['userID'];
    $result = $db->selectAll($condition);
    $response->write($result);
    return $response;
});

//search by id
$app->get('/account/{id}', function ($request, $response) {
    //Create object of dbHandler
    $db = new dbHandler("account");
    if (checkUserByAccount($request->getAttribute('id'))) {
        $result = $db->selectByID($request->getAttribute('id'));
        $response->write($result);
    } else {
        $response->write("fail");
    }
    return $response;
});

//open account
$app->post('/account', function ($request, $response) {
    //Create object of dbHandler
    $db = new dbHandler("account");
    $account = array();
    $account['USER_ID'] = $_SESSION['userID'];
    $account['CARD_NUM'] = $request->getParam('cardNum');
    $account['ACCOUNT_NAME'] = $request->getParam('accountName');
    $account['ACCOUNT_BALANCE'] = "0";
    $result = $db->add($account);
    if ($result) {
        $response->write('success');
    } else {
        $response->write('fail');
    }
    return $response;
});

//update account by id
$app->post('/account/{id}', function ($request, $response) {
    //if contains body, update
    if ($request->getParam('balance')) {
        if (checkUserByAccount($request->getAttribute('id'))) {
            //Update account
            $dbAccount = new dbHandler("account");
            $account = array();
            $account['ACCOUNT_BALANCE'] = $request->getParam('balance');
            $resultAccount = $dbAccount->update($request->getAttribute('id'), $account);

            //Add transaction
            $dbTransaction = new dbHandler("transaction");
            $transaction = array();
            $transaction['ACCOUNT_ID'] = $request->getAttribute('id');
            $transaction['TRANSACTION_AMOUNT'] = $request->getParam('transactionAmount');
            $transaction['TRANSACTION_TYPE'] = $request->getParam('transactionType');
            $resultTransaction = $dbTransaction->add($transaction);

            if ($resultAccount && $resultTransaction) {
                $response->write('success');
            } else {
                $response->write('fail');
            }
        } else {
            $response->write('fail');
        }
    //if not, delete
    } else {
        //Create object of dbHandler
        $db = new dbHandler("account");
        $result = $db->delete($request->getAttribute('id'));
        if ($result) {
            $response->write('success');
        } else {
            $response->write('fail');
        }
    }
    return $response;
});
