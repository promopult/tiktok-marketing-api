<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

/**
 * Class Client
 *
 * @property Service\AdGroup $adGroup
 * @property Service\Advertiser $advertiser
 * @property Service\Bc $bc
 * @property Service\Campaign $campaign
 * @property Service\Report $report
 * @property Service\Tools $tools
 * @property Service\User $user
 *
 * @author Dmitry Gladyshev <gladyshevd@icloud.com>
 */
final class Client implements \Promopult\TikTokMarketingApi\ServiceFactoryInterface
{
    /**
     * @var CredentialsInterface
     */
    private $credentials;

    /**
     * @var \Psr\Http\Client\ClientInterface
     */
    private $httpClient;

    /**
     * @var ServiceInterface[]
     */
    private $services = [];

    public function __construct(
        \Promopult\TikTokMarketingApi\CredentialsInterface $credentials,
        \Psr\Http\Client\ClientInterface $httpClient
    ) {
        $this->credentials = $credentials;
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $serviceName
     * @return ServiceInterface
     */
    public function __get(string $serviceName): ServiceInterface
    {
        return $this->createService($serviceName);
    }

    /**
     * @inheritdoc
     */
    public function createService(string $serviceName): \Promopult\TikTokMarketingApi\ServiceInterface
    {
        if (empty($this->services[$serviceName])) {

            $serviceClass = __NAMESPACE__ . '\\Service\\' . ucfirst($serviceName);

            if (!class_exists($serviceClass)) {
                throw new \InvalidArgumentException("Service {$serviceName} is not found.");
            }

            $this->services[$serviceName] = new $serviceClass($this->credentials, $this->httpClient);
        }

        return $this->services[$serviceName];
    }
}
