<?php

namespace App\Repositories;

interface IWalletRepository
{
    public function getWalletsByID(int $id);
    public function createWallet();
    public function storeWallet(array $data);
    public function editWallet(int $id);
    public function updateWallet(array $data,int $id);
    public function deleteWallet(int $id);
    public function findWallet(int $id);
}
