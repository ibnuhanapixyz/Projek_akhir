<?php

namespace App\Http\Controllers;

use App\Models\User;
Use App\Models\Transfer;
use App\Models\Saldo;
use Illuminate\Http\Request;


class TransferController extends Controller
{
    
    public function create(Request $request)
    {
        
        $saldo = new Saldo;
        $saldo->user_id = $request->user_id;
        $saldo->balance = $request->balance;
        $saldo->balanceArchive = $request->balanceArchive;
        $saldo->save();

        foreach ($request->list_balance as $key => $value) {
            $transfer = array(
                'saldo_id' => 2,
                'balanceBefore' => $value['balanceBefore'],
                'balanceAfter' => $value['balanceAfter'],
                'location' => $value['location'],
            );
            $transfer = Transfer::create($transfer);
        }
        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
