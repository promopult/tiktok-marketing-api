<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

use Psr\Http\Client\ClientInterface;

/**
 * Class Client
 *
 * @property Service\Ad $ad
 * @property Service\AdGroup $adGroup
 * @property Service\Advertiser $advertiser
 * @property Service\Bc $bc
 * @property Service\Campaign $campaign
 * @property Service\Report $report
 * @property Service\Tools $tools
 * @property Service\User $user
 * @property Service\Leads $leads
 * @property Service\Pages $pages
 * @property Service\Creatives $creatives
 * @property Service\Images $images
 * @property Service\Video $video
 */
final class Client implements ServiceFactoryInterface
{
    private CredentialsInterface $credentials;
    private ClientInterface $httpClient;
    /**
     * @var ServiceInterface[]
     */
    private array $services = [];

    public function __construct(
        CredentialsInterface $credentials,
        ClientInterface $httpClient
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
    public function createService(string $serviceName): ServiceInterface
    {
        if (empty($this->services[$serviceName])) {
            $serviceClass = __NAMESPACE__ . '\\Service\\' . ucfirst($serviceName);

            if (!class_exists($serviceClass)) {
                throw new \InvalidArgumentException("Service {$serviceName} is not found.");
            }
            /**
             * @var ServiceInterface $instance
             * @psalm-suppress MixedMethodCall
             */
            $instance = new $serviceClass($this->credentials, $this->httpClient);

            $this->services[$serviceName] = $instance;
        }

        return $this->services[$serviceName];
    }
}
