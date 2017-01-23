<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $accountId
     * @param  \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request, $accountId)
    {
        $account = Account::find($accountId);
        $transaction = $account->transactions()->create($request->all());
        return (string)$this->transfer($account, $transaction);
    }

    /**
     * calculate balance
     */
    private function transfer(Account $account, Transaction $transaction)
    {
        if ($transaction['transaction_type'] == 'withdraw') {
            $account->account_balance = $account['account_balance'] - $transaction['transaction_amount'];
        } else {
            $account->account_balance = $account['account_balance'] + $transaction['transaction_amount'];
        }
        return $account->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
