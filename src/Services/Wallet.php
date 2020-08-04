<?php
declare(strict_types=1);

namespace Apirone\Services;

use Apirone\Interfaces\WalletInterface;
use Apirone\Traits\Api;

class Wallet implements WalletInterface
{

    use Api;

    const ENDPOINTS = [
        'create' => '/wallet',
        'generateAddress' => '/wallet/%s/address',
        'getBalance' => '/wallet/%s/balance',
        'transfer' => '/wallet/%s/transfer'
    ];

    /**
     * @param string $type : saving|forwarding
     * @param string $currency : btc|ltc
     * @param string $callback_url
     * @param array $callback_data
     * @param array $destinations
     * @return array
     */
    public function create(string $type, string $currency, string $callback_url = '', array $callback_data = [], array $destinations = []): array
    {
        $payload = [
            "type" => $type,
            "currency" => $currency
        ];

        if (!empty($callback_url)) {
            $payload["callback"] = [
                "url" => $callback_url
            ];

            if (empty($callback_data)) {
                $payload["callback"]["data"] = $callback_data;
            }
        }
        if ($type == 'forwarding') {
            $payload['destinations'] = $destinations;
        }

        $url = $this->getURL(self::ENDPOINTS['create']);

        return $this->post($url, $payload);
    }

    /**
     * @param string $wallet_id
     * @param string $callback_url
     * @param array $callback_data
     * @return array
     */
    public function generateAddress(string $wallet_id, string $callback_url = '', array $callback_data = []): array
    {

        $payload = [];
        if (!empty($callback_url)) {
            $payload = [
                "callback" => [
                    "url" => $callback_url
                ]
            ];

            if (!empty($callback_data)) {
                $payload["callback"]["data"] = $callback_data;
            }
        }
        $url = $this->getURL(self::ENDPOINTS['generateAddress'], [trim($wallet_id)]);
        return $this->post($url, $payload);
    }

    /**
     * @param string $wallet_id
     * @return array
     */
    public function getBalance(string $wallet_id): array
    {
        $url = $this->getURL(self::ENDPOINTS['getBalance'], [trim($wallet_id)]);
        return $this->get($url);
    }

    /**
     * @param string $wallet_id
     * @param string $transfer_key
     * @param array $destinations
     * @return array
     */
    public function transfer(string $wallet_id, string $transfer_key, array $destinations): array
    {
        $payload = [
            "transfer_key" => $transfer_key,
            "destinations" => $destinations
        ];
        $url = $this->getURL(self::ENDPOINTS['transfer'], [trim($wallet_id)]);
        return $this->post($url, $payload);
    }
}
