<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Enumeration;

final class AdvertiserRole
{
    public const ROLE_ADVERTISER       = 'ROLE_ADVERTISER';         // Standard advertiser (direct customer)
    public const ROLE_CHILD_ADVERTISER = 'ROLE_CHILD_ADVERTISER';   // Standard advertiser (agency sub-account)
    public const ROLE_CHILD_AGENT      = 'ROLE_CHILD_AGENT';        // Secondary agency
    public const ROLE_AGENT            = 'ROLE_AGENT';              // Primary agency
}
