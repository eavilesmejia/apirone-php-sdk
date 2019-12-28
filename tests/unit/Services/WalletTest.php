<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Apirone\Services\Wallet;

class WalletTest extends TestCase
{
    public function testCreateWallet()
    {
        $walletService = new Wallet();
        $wallet_result = $walletService->create('saving', 'btc');
        $this->assertArrayHasKey('transfer_key', $wallet_result);
    }

    public function testGenerateAddress()
    {
        $wallet_id = ' btc-35792d71cd48b19dc155ce7e25f221aa';
        $walletService = new Wallet();
        $address_result = $walletService->generateAddress($wallet_id, 'http://requestbin.net/r/v6uefsv6');
        $this->assertArrayHasKey('address', $address_result);
    }

    public function testTransfer()
    {
        $wallet_id = 'btc-35792d71cd48b19dc155ce7e25f221aa';
        $transfer_id = '8cjMi1jU0cD4o12Vuyvs8jB9bOBpkC4u';
    }
}