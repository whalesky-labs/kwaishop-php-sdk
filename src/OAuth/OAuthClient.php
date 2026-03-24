<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\OAuth;

use Kwaishop\PhpSdk\Config\Config;
use Kwaishop\PhpSdk\Http\TransportInterface;
use Kwaishop\PhpSdk\Response\ResponseParser;
use Kwaishop\PhpSdk\Support\Arr;

final class OAuthClient
{
    public function __construct(
        private readonly Config $config,
        private readonly TransportInterface $transport,
        private readonly ResponseParser $parser,
    ) {
    }

    /**
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

    private function requestToken(string $url, array $params): TokenResponse
    {
        $response = $this->transport->sendForm($url, $params);
        $payload = $this->parser->parse($response['status'], $response['body']);

        $scopes = Arr::first($payload, ['scopes'], []);
        if (is_string($scopes)) {
            $scopes = $scopes === '' ? [] : explode(',', $scopes);
        }

        return new TokenResponse(
            accessToken: (string) Arr::first($payload, ['access_token'], ''),
            refreshToken: Arr::first($payload, ['refresh_token']),
            openId: Arr::first($payload, ['open_id']),
            expiresIn: ($expires = Arr::first($payload, ['expires_in'])) !== null ? (int) $expires : null,
            scopes: array_values(array_filter(array_map('strval', is_array($scopes) ? $scopes : []))),
            raw: $payload,
        );
    }
}
