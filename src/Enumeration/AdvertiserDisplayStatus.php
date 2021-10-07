<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Enumeration;

final class AdvertiserDisplayStatus
{
    public const SHOW_ACCOUNT_STATUS_NOT_APPROVED = 'SHOW_ACCOUNT_STATUS_NOT_APPROVED';  // Failed
    public const SHOW_ACCOUNT_STATUS_APPROVED = 'SHOW_ACCOUNT_STATUS_APPROVED';          // Passed
    public const SHOW_ACCOUNT_STATUS_IN_REVIEW = 'SHOW_ACCOUNT_STATUS_IN_REVIEW';        // Under review
    public const SHOW_ACCOUNT_STATUS_PUNISHED = 'SHOW_ACCOUNT_STATUS_PUNISHED';          // Punishment
}
