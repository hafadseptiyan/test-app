<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction    = Transaction::all();
        return view('backoffice.transaction',compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = New Transaction();
        $user->transaction_id   = Uuid::uuid4()->getHex();
        $user->name             = $request->get('name');
        $user->category         = $request->get('category');
        $user->price            = $request->get('price');
        $user->qty              = $request->get('qty');
        $user->save();
        return redirect('/transactions')->with('success', 'Data User Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction   = Transaction::find($id);
        return view('backoffice.edit',compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            $transaction = Transaction::find($id);
            $transaction->name           = $request->get('name');
            $transaction->category       = $request->get('category');
            $transaction->price          = $request->get('price');
            $transaction->qty            = $request->get('qty');
            $transaction->save();

        return redirect('/transactions')->with('success', 'Data User Berhasil Terupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        return redirect('/transactions')->with('success', 'Data User Berhasil Dihapus');
    }
}
