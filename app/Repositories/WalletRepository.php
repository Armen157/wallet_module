<?php

namespace App\Repositories;

use App\Models\UserWallets;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WalletRepository implements IWalletRepository
{
    protected $model;

    public function __construct(UserWallets $user_wallets)
    {
        $this->model = $user_wallets;
    }

    public function getWalletsByID(int $id)
    {
        return $this->model->where('user_id',$id)
            ->get();
    }

    public function createWallet()
    {
        return $this->model;
    }

    public function storeWallet(array $data)
    {
        return  $this->model->create($data);
    }

    public function editWallet(int $id)
    {
        return $this->model->FindOrFail($id);
    }

    public function updateWallet(array $data, int $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function findWallet(int $id)
    {
        if (null == $wallet = $this->model->find($id)) {
            throw new ModelNotFoundException("Wallet not found");
        }
        return $wallet;
    }

    public function deleteWallet(int $id)
    {
        return $this->model->destroy($id);
    }
}
