<?php

declare(strict_types=1);

/**
 * This file is part of KwaiShopSDK.
 *
 * @link     https://github.com/whalesky-labs/kwaishop-php-sdk
 * @document https://github.com/whalesky-labs/kwaishop-php-sdk
 * @contact  westng
 * @license  https://github.com/whalesky-labs/kwaishop-php-sdk/blob/main/LICENSE
 */

namespace KwaiShopSDK\Auth;

use KwaiShopSDK\Transport\TransportInterface;
use KwaiShopSDK\Client\Pipeline\ResponseParser;
use KwaiShopSDK\Config\Config;
use KwaiShopSDK\Exception\ValidationException;
use KwaiShopSDK\Support\Arr;

final class OAuthClient
{
    /** Create an OAuth client backed by the shared transport pipeline. */
    public function __construct(
        private readonly Config $config,
        private readonly TransportInterface $transport,
        private readonly ResponseParser $parser,
    ) {
    }

    /**
     * Build the platform authorization URL for an OAuth redirect flow.
     *
     * @param list<string> $scopes
     */
    public function buildAuthorizeUrl(string $redirectUri, array $scopes, ?string $state = null): string
    {
        $query = [
            'app_id' => $this->config->appKey(),
            'response_type' => 'code',
            'scope' => implode(',', $scopes),
            'redirect_uri' => $redirectUri,
            'state' => $state,
        ];

        return $this->config->oauthAuthorizeUrl() . '?' . http_build_query(Arr::withoutNulls($query));
    }

    /** Exchange an authorization code for an access token. */
    public function getAccessToken(string $code): TokenResponse
    {
        return $this->requestToken(
            $this->config->oauthAccessTokenUrl(),
            [
                'app_id' => $this->config->appKey(),
                'grant_type' => 'code',
                'code' => $code,
                'app_secret' => $this->config->requiredAppSecret(),
            ]
        );
    }

    /** Refresh an access token using a refresh token. */
    public function refreshAccessToken(string $refreshToken): TokenResponse
    {
        return $this->requestToken(
            $this->config->oauthRefreshTokenUrl(),
            [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
                'app_id' => $this->config->appKey(),
                'app_secret' => $this->config->requiredAppSecret(),
            ]
        );
    }

    /** Request a client-credentials token for app-level access. */
    public function getClientCredentialsToken(): TokenResponse
    {
        return $this->requestToken(
            $this->config->oauthAccessTokenUrl(),
            [
                'app_id' => $this->config->appKey(),
                'grant_type' => 'client_credentials',
                'app_secret' => $this->config->requiredAppSecret(),
            ]
        );
    }

    /**
     * Send an OAuth token request and normalize the response payload.
     *
     * @param array<string, string> $params
     *
     * @throws ValidationException
     */
    private function requestToken(string $url, array $params): TokenResponse
    {
        $response = $this->transport->send('POST', $url, [
            'form_params' => $params,
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
        ]);
        $payload = $this->parser->parse($response['status'], $response['body']);

        $scopes = Arr::first($payload, ['scopes'], []);
        if (is_string($scopes)) {
            $scopes = $scopes === '' ? [] : explode(',', $scopes);
        }

        $accessToken = trim((string) Arr::first($payload, ['access_token'], ''));
        if ($accessToken === '') {
            throw new ValidationException('Missing access_token in OAuth response.');
        }

        return new TokenResponse(
            accessToken: $accessToken,
            refreshToken: Arr::first($payload, ['refresh_token']),
            openId: Arr::first($payload, ['open_id']),
            expiresIn: ($expires = Arr::first($payload, ['expires_in'])) !== null ? (int) $expires : null,
            scopes: array_values(array_filter(array_map('strval', is_array($scopes) ? $scopes : []))),
            raw: $payload,
        );
    }
}
