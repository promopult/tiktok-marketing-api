<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

interface ServiceFactoryInterface
{
    public function createService(string $serviceName): \Promopult\TikTokMarketingApi\ServiceInterface;
}
