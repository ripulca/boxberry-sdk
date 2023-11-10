<?php

namespace RetailCrm\Boxberry;

use RetailCrm\Boxberry\Builders\RequestBuilder;
use RetailCrm\Boxberry\Model\Request\RequestInterface;
use RetailCrm\Boxberry\Traits\Lists;
use RetailCrm\Boxberry\Traits\Order;
use RetailCrm\Boxberry\Traits\Parcel;
use RetailCrm\Boxberry\Traits\Service;
use RetailCrm\Boxberry\Traits\Warehouse;
use InvalidArgumentException;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class Client
{
    use Lists;
    use Order;
    use Parcel;
    use Service;
    use Warehouse;

    /**
     * @var string
     */
    public const API_URL = 'https://api.boxberry.ru/json.php';

    /**
     * @var array<string, string>
     */
    public const HEADERS = [
        'Content-type' => 'application/json',
        'Accept' => 'application/json',
        'Cache-Control' => 'no-cache',
    ];

    /**
     * @var array<string, int>
     */
    protected $params = [
        'connect_timeout' => 10,
        'timeout' => 30,
    ];

    /**
     * @var ClientInterface
     */
    protected $client;
    /**
     * @var string
     */
    protected $token;
    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * Client constructor.
     *
     * @param string $token api key value
     */
    public function __construct(string $token, ClientInterface $client)
    {
        if (empty($token)) {
            throw new InvalidArgumentException('token is required');
        }
        $this->token = $token;
        $this->client = $client;

        $this->serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )
            ->build()
        ;
    }

    /**
     * @param array<string, array<string, array<mixed>|string>> $options
     *
     * @throws ClientExceptionInterface
     */
    public function post(array $options): ResponseInterface
    {
        $builder = new RequestBuilder();
        $request = $builder->buildPostQuery(self::API_URL, self::HEADERS, $options);

        return $this->client->sendRequest($request);
    }

    /**
     * @param array<string, array<string, string>|int> $options
     *
     * @throws ClientExceptionInterface
     */
    public function get(array $options): ResponseInterface
    {
        $builder = new RequestBuilder();
        $request = $builder->buildGetQuery(self::API_URL, self::HEADERS, $options);

        return $this->client->sendRequest($request);
    }

    /**
     * @return array<string, array<string, string>|int>
     */
    public function getQueryParams(string $function, RequestInterface $request = null): array
    {
        return array_merge(
            $this->params,
            array_filter([
                'query' => array_merge(
                    [
                        'token' => $this->token,
                        'method' => $function,
                    ],
                    null !== $request ? $this->serializer->toArray($request) : []
                ),
            ])
        );
    }
}