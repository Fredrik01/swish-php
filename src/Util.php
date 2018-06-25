<?php

namespace HelmutSchneider\Swish;

use Psr\Http\Message\ResponseInterface;

/**
 * Class Util
 * @package HelmutSchneider\Swish
 */
class Util
{
    /**
     * @param ResponseInterface $response
     * @return string
     */
    public static function getObjectIdFromResponse(ResponseInterface $response)
    {
        $header = $response->getHeaderLine('Location');

        if (preg_match('/\/([^\/]+)$/', $header, $matches) === 1) {
            return $matches[1];
        }

        return '';
    }

    /**
     * @param ResponseInterface $response
     * @return string
     */
    public static function getPaymentRequestTokenFromResponse(ResponseInterface $response)
    {
        return $response->getHeaderLine('PaymentRequestToken');
    }

    /**
     * @param ResponseInterface $response
     * @return string
     */
    public static function getRefundIdFromResponse(ResponseInterface $response)
    {
        $header = $response->getHeaderLine('Location');
        preg_match('/\/refunds\/(\w+)$/', $header, $matches);
        return $matches[1];
    }
}
