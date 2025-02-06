<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Appendix;

/**
 * Class CampaignSecondaryStatus
 *
 * @discard
 * @psalm-suppress UnusedClass
 */
final class CampaignSecondaryStatus
{
    // Deleted
    public const CAMPAIGN_STATUS_DELETE = 'CAMPAIGN_STATUS_DELETE';
    // Advertiser review failed
    public const CAMPAIGN_STATUS_ADVERTISER_AUDIT_DENY = 'CAMPAIGN_STATUS_ADVERTISER_AUDIT_DENY';
    // Advertiser review in progress
    public const CAMPAIGN_STATUS_ADVERTISER_AUDIT = 'CAMPAIGN_STATUS_ADVERTISER_AUDIT';
    // Advertiser contract has not taken effect
    public const ADVERTISER_CONTRACT_PENDING = 'ADVERTISER_CONTRACT_PENDING';
    // Over budget
    public const CAMPAIGN_STATUS_BUDGET_EXCEED = 'CAMPAIGN_STATUS_BUDGET_EXCEED';
    // Suspended
    public const CAMPAIGN_STATUS_DISABLE = 'CAMPAIGN_STATUS_DISABLE';
    // Advertising in delivery
    public const CAMPAIGN_STATUS_ENABLE = 'CAMPAIGN_STATUS_ENABLE';
    // All statuses (including "Deleted")
    public const CAMPAIGN_STATUS_ALL = 'CAMPAIGN_STATUS_ALL';
    // All statuses (excluding "Deleted")
    public const CAMPAIGN_STATUS_NOT_DELETE = 'CAMPAIGN_STATUS_NOT_DELETE';
}
