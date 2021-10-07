<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Enumeration;

final class BusinessCenterStatus
{
    public const REVIEWING = 'REVIEWING'; // Under review
    public const DENY = 'DENY'; // Rejected
    public const ENABLE = 'ENABLE'; // Passed
    public const PUNISH = 'PUNISH'; // Disabled
}
