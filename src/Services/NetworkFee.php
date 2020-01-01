<?php


namespace Apirone\Services;

use Apirone\Interfaces\NetworkFeeInterface;
use Apirone\Traits\Api;

class NetworkFee implements NetworkFeeInterface
{
    use Api;

    const ENDPOINTS = [
        'fee' => '/%s/fee?blocks=%s'
    ];

    public function fee(string $coin = 'btc', int $blocks = 1): array
    {
        $url = $this->getURL(self::ENDPOINTS['fee'], [trim($coin), $blocks]);
        return $this->get($url);
    }
}