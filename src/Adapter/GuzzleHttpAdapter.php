<?php
namespace Softr\AllInMail\Adapter;

// GuzzleHttp
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Softr\AllInMail\Exception\HttpException;

/**
 * Guzzle Http Adapter
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class GuzzleHttpAdapter implements AdapterInterface
{
    /**
     * Client Instance
     *
     * @var ClientInterface
     */
    protected $client;

    /**
     * Command Response
     *
     * @var Response|GuzzleHttp\Message\ResponseInterface
     */
    protected $response;

    /**
     * Constructor
     *
     * @param  string                $token   Access Token
     * @param  ClientInterface|null  $client  Client Instance
     */
    public function __construct($token, ClientInterface $client = null)
    {
        $this->token = $token;

        $this->client = $client ?: new Client();
    }

    /**
     * {@inheritdoc}
     */
    public function get($url)
    {
        try
        {
            $url = $this->prepareUrl($url);

            $this->response = $this->client->get($url);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function delete($url)
    {
        try
        {
            $url = $this->prepareUrl($url);

            $this->response = $this->client->delete($url);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function put($url, $content = '')
    {
        $options = [];
        $options['body'] = $content;

        try
        {
            $url = $this->prepareUrl($url);

            $this->response = $this->client->put($url, $options);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, $content = '')
    {
        $options = [];
        $options['form_params'] = $content;

        try
        {
            $url = $this->prepareUrl($url);

            $this->response = $this->client->post($url, $options);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function getLatestResponseHeaders()
    {
        if (null === $this->response) {
            return;
        }

        return [
            'reset' => (int) (string) $this->response->getHeader('RateLimit-Reset'),
            'remaining' => (int) (string) $this->response->getHeader('RateLimit-Remaining'),
            'limit' => (int) (string) $this->response->getHeader('RateLimit-Limit'),
        ];
    }

    /**
     * @throws HttpException
     */
    protected function handleError()
    {
        $body = (string) $this->response->getBody();
        $code = (int) $this->response->getStatusCode();

        $content = json_decode($body);

        throw new HttpException(isset($content->message) ? $content->message : 'Request not processed.', $code);
    }

    /**
     * Append default url parameters
     *
     * @param   string  $url  Original url
     * @return  string
     */
    private function prepareUrl($url)
    {
        list($url, $query) = array_pad(explode('?', $url, 2), -2, null);

        parse_str($query, $params);

        $params['token'] = $this->token;
        $params['output'] = 'json';

        return $url . '?' . http_build_query($params);
    }
}