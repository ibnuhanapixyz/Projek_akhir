<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use Illuminate\Http\Request;

class BankController extends Controller
{
    //
    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'balance' => 'required',
            'balanceArchive' => 'required'
        ]);

        // dd($request->all());
        $saldo = new Saldo;
        $saldo->user_id = $request->user_id;
        $saldo->balance = $request->balance;
        $saldo->balanceArchive = $request->balanceArchive;
        $saldo->save();

        return response()->json([
            'message' => 'saldo berhasil ditambhakan',
            'data_saldo' => $saldo
        ], 200);
    }

    public function edit($id)
    {
        $saldo = Saldo::find($id);
        return response()->json([
            'message' => 'success',
            'data_saldo' => $saldo
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $saldo = Saldo::find($id);
        $request->validate([
            'balance' => 'required',
            'balanceArchive' => 'required'
        ]);
        $saldo->update([
            'name' => $request->username,
            'balance' => $request->balance,
            'balanceArchive' => $request->balanceArchive
        ]);
        return response()->json([
            'message' => 'saldo berhasil diupdate',
            'data_saldo' => $saldo
        ], 200);
    }
}
