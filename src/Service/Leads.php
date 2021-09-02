<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

final class Leads extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     * Create test lead
     *
     * After the subscription, you can use the endpoints below to perform an end-to-end testing for leads generation,
     * and clear the testing lead.
     *
     * @param int $advertiserId
     * @param int $pageId
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1701890943400962
     */
    public function createTestLead(
        int $advertiserId,
        int $pageId
    ): array {
        return $this->requestApi(
            'POST',
            '/open_api/v1.2/pages/leads/mock/create/',
            [
                'advertiser_id' => $advertiserId,
                'page_id' => $pageId
            ]
        );
    }

    /**
     * Get test leads
     *
     * You can use this endpoint to get a test lead.
     *
     * @param int $advertiserId
     * @param int $pageId
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1709486980307969
     */
    public function getTestLeads(
        int $advertiserId,
        int $pageId
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.2/pages/leads/mock/get/',
            [
                'advertiser_id' => $advertiserId,
                'page_id' => $pageId
            ]
        );
    }

    /**
     * Delete a test lead
     *
     * You can use this endpoint to delete an existing test lead.
     *
     * @param int $advertiserId
     * @param int $leadId
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1709487026425858
     */
    public function deleteTestLead(
        int $advertiserId,
        int $leadId
    ): array {
        return $this->requestApi(
            'POST',
            '/open_api/v1.2/pages/leads/mock/delete/',
            [
                'advertiser_id' => $advertiserId,
                'lead_id' => $leadId
            ]
        );
    }

    /**
     * Create lead download task
     *
     * @param int $advertiserId
     * @param int|null $adId
     * @param int|null $pageId
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1701890942344193
     */
    public function createLeadDownloadTask(
        int $advertiserId,
        ?int $adId = null,
        ?int $pageId = null
    ): array {
        return $this->requestApi(
            'POST',
            '/open_api/v1.2/pages/leads/task/',
            [
                'advertiser_id' => $advertiserId,
                'ad_id' => $adId,
                'page_id' => $pageId,
            ]
        );
    }

    /**
     * Get lead download task for status check
     *
     * Please note that the leads file will expire in 10 minutes after it was generated. You will get a file not exist
     * error if the file has expired.
     *
     * @param int $advertiserId
     * @param int $taskId
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1701890942344193
     */
    public function getLeadDownloadTask(
        int $advertiserId,
        int $taskId
    ): array {
        return $this->requestApi(
            'POST',
            '/open_api/v1.2/pages/leads/task/',
            [
                'advertiser_id' => $advertiserId,
                'task_id' => $taskId
            ]
        );
    }

    /**
     * Download leads
     *
     * @param int $advertiserId
     * @param int $taskId
     * @return array | string
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1709486183758850
     */
    public function downloadLeads(
        int $advertiserId,
        int $taskId
    ) {
        $url = $this->credentials->getApiBaseUrl()
            . '/open_api/v1.2/pages/leads/task/download/'
            . '?' . $this->prepareGetParams([
                'advertiser_id' => $advertiserId,
                'task_id' => $taskId
            ]);

        $headers = [
            'Access-Token' => $this->credentials->getAccessToken(),
        ];

        $request = new \GuzzleHttp\Psr7\Request(
            'GET',
            $url,
            $headers,
            null
        );

        $response = $this->httpClient->sendRequest($request);

        $decodedJson = \json_decode(
            (string) $response->getBody(),
            true
        );

        if (
            isset($decodedJson['code'])
            && $decodedJson['code'] != 0
        ) {
            throw new \Promopult\TikTokMarketingApi\Exception\ErrorResponse(
                (int) $decodedJson['code'],
                $decodedJson['message'],
                $request,
                $response
            );
        }

        return $decodedJson;
    }

    /**
     * Subscribe to leads
     *
     * You can subscribe to a page (instant form) to get leads generated from the page. If you do not want to receive
     * leads from a page any more, you can cancel the subscription.
     *
     * You can also get all subscriptions for an advertiser.
     *
     * You can subscribe to leads that are generated from a lead ad (instant form). Subscriptions are organized based on
     * Subcription IDs (subscription_id), not page IDs (page_id). Subscriptions are independent. A page can be included
     * in multiple subscriptions. Subscription status changes of a page in one subscription do not affect the
     * subscription status of this page in another subscription.
     *
     * @param string $appId
     * @param string $secret
     * @param array $subscriptionDetail
     * @param string $url
     * @param string $object
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1701890942854146
     */
    public function subscribeToLeads(
        int $appId,
        string $secret,
        array $subscriptionDetail,
        string $url,
        string $object = 'LEAD'
    ): array {
        return $this->requestApi(
            'POST',
            '/open_api/v1.2/subscription/subscribe/',
            [
                'app_id' => $appId,
                'secret' => $secret,
                'subscription_detail' => $subscriptionDetail,
                'object' => $object,
                'url' => $url
            ]
        );
    }

    /**
     * Cancel subscription
     *
     * @param int $appId
     * @param string $secret
     * @param int $subscriptionId
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1709486460752897
     */
    public function cancelSubscription(
        int $appId,
        string $secret,
        int $subscriptionId
    ): array {
        return $this->requestApi(
            'POST',
            '/open_api/v1.2/subscription/unsubscribe/',
            [
                'app_id' => $appId,
                'secret' => $secret,
                'subscription_id' => $subscriptionId,
            ]
        );
    }
}
