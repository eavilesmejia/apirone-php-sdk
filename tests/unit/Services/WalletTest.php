<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Apirone\Services\Wallet;

class WalletTest extends TestCase
{
    public function testCreateWallet()
    {
        $walletService = new Wallet();
        $wallet_result = $walletService->create('saving');
        print_r($wallet_result);
        $this->assertArrayHasKey('transfer_key', $wallet_result);
    }
}