<?php

namespace Tests\Unit;

use App\Models\UserWallets;
use App\Repositories\WalletRepository;
use Database\Factories\UserFactory;
use Database\Factories\UserWalletsFactory;
use PHPUnit\Framework\TestCase;

class WalletTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function createWallet(){

        $data = [
            'user_id' => 1,
            'name' => "Wallet",
            'type' => "Credit"
        ];

        $wallet_repo = new WalletRepository(new UserWallets());
        $wallet = $wallet_repo->storeWallet($data);

        $this->assertInstanceOf(UserWallets::class, $wallet);
        $this->assertEquals($data['user_id'], $wallet->user_id);
        $this->assertEquals($data['name'], $wallet->name);
        $this->assertEquals($data['type'], $wallet->type);

    }

    public function UpdateWallet(){

        $wallet = UserWallets::factory()->create();

        $data = [
            'name' => "Wallet 1",
            'type' => "Cash"
        ];

        $wallet_repo = new WalletRepository($wallet);
        $update = $wallet_repo->updateWallet($data,$wallet->id);

        $this->assertTrue($update);
        $this->assertEquals($data['name'], $wallet->name);
        $this->assertEquals($data['type'], $wallet->type);

    }

    public function showWallet(){

        $wallet = UserWallets::factory()->create();
        $wallet_repo = new WalletRepository(new UserWallets());
        $found = $wallet_repo->findWallet($wallet->id);

        $this->assertInstanceOf(UserWallets::class, $found);
        $this->assertEquals($found->name,$wallet->name);
        $this->assertEquals($found->type,$wallet->type);

    }

    public function deleteWallet()
    {
        $wallet = UserWallets::factory()->create();
        $wallet_repo = new WalletRepository($wallet);
        $delete = $wallet_repo->deleteWallet($wallet->id);

        $this->assertTrue($delete);
    }



}
