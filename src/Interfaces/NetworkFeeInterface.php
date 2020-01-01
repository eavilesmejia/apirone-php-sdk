<?php
declare(strict_types=1);

namespace Apirone\Interfaces;


interface NetworkFeeInterface
{
    public function fee(string $coin, int $blocks): array;

}