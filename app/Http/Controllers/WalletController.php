<?php

namespace App\Http\Controllers;

use App\Http\Requests\Validation\WalletRequest;
use App\Repositories\IWalletRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    protected $wallet = null;

    public function __construct(IWalletRepository $wallet)
    {
        $this->wallet = $wallet;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id();
        $wallets = $this->wallet->getWalletsByID($id);
        return view('Wallets.index',compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = $this->wallet->createWallet();
        return view('add_wallet',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WalletRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $this->wallet->storeWallet($data);
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return $this->wallet->findWallet($id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wallet = $this->wallet->editWallet($id);
        return view('Wallets.edit',compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        return $this->wallet->updateWallet($data,$id);
    }

    public function destroy($id)
    {
        return $this->wallet->deleteWallet($id);
    }
}
