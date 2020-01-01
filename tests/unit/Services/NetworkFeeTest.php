<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Apirone\Services\NetworkFee;

class NetworkFeeTest extends TestCase
{
    public function testBTCFee()
    {
        $network_fee = new NetworkFee();
        $result = $network_fee->fee();
        $this->assertArrayHasKey('economical', $result);
    }
}