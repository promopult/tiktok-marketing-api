<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Enumeration;

final class AdvertiserBillingType
{
    public const TRANS_TYPE_TRANSFER = 'TRANS_TYPE_TRANSFER'; // Transfer
    public const TRANS_TYPE_TAX = 'TRANS_TYPE_TAX';           // Consumption
    public const TRANS_TYPE_COST = 'TRANS_TYPE_COST';         // Tax
}
