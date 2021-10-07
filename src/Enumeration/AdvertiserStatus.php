<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Enumeration;

final class AdvertiserStatus
{
    public const STATUS_DISABLE = 'STATUS_DISABLE';                                 // Disabled
    public const STATUS_PENDING_CONFIRM = 'STATUS_PENDING_CONFIRM';                 // Application pending review
    public const STATUS_PENDING_VERIFIED = 'STATUS_PENDING_VERIFIED';               // Pending verification
    public const STATUS_CONFIRM_FAIL = 'STATUS_CONFIRM_FAIL';                       // Review failed
    public const STATUS_ENABLE = 'STATUS_ENABLE';                                   // Approved
    public const STATUS_CONFIRM_FAIL_END = 'STATUS_CONFIRM_FAIL_END';               // CRM system review failed
    public const STATUS_PENDING_CONFIRM_MODIFY = 'STATUS_PENDING_CONFIRM_MODIFY';   // Modifications pending review
    public const STATUS_CONFIRM_MODIFY_FAIL = 'STATUS_CONFIRM_MODIFY_FAIL';         // Review of modifications failed
    public const STATUS_LIMIT = 'STATUS_LIMIT';                                     // Restricted
    public const STATUS_WAIT_FOR_BPM_AUDIT = 'STATUS_WAIT_FOR_BPM_AUDIT';           // Pending CRM system review
    public const STATUS_WAIT_FOR_PUBLIC_AUTH = 'STATUS_WAIT_FOR_PUBLIC_AUTH';       // Pending corporate bank account authentication
    public const STATUS_SELF_SERVICE_UNAUDITED = 'STATUS_SELF_SERVICE_UNAUDITED';   // Pending verification of qualifications for self-service account
    public const STATUS_CONTRACT_PENDING = 'STATUS_CONTRACT_PENDING';               // Contract has not taken effect
}
