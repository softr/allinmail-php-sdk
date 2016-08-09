<?php
namespace Softr\AllInMail\Adapter;

// AllInMail
use Softr\AllInMail\Exception\HttpException;
use Softr\AllInMail\Adapter\BuzzAuthListener;

// Buzz
use Buzz\Browser;
use Buzz\Client\Curl;
use Buzz\Client\FileGetContents;
use Buzz\Message\Response;
use Buzz\Message\Form\FormUpload;
use Buzz\Message\Form\FormRequest;

/**
 * Buzz Adapter
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class BuzzAdapter implements AdapterInterface
{
    /**
     * Browser Instance
     *
     * @var Browser
     */
    protected $browser;

    /**
     * Send files over request?
     *
     * @var array
     */
    protected $files = array();

    /**
     * Constructor
     *
     * @param  string        $token    Access Token
     * @param  Browser|null  $browser  (optional) Browser Instance
     */
    public function __construct($token, Browser $browser = null)
    {
        $this->browser = $browser ?: new Browser(function_exists('curl_exec') ? new Curl() : new FileGetContents());

        $this->browser->getClient()->setTimeout(10);

        $this->browser->getClient()->setVerifyPeer(false);

        $this->browser->addListener(new BuzzAuthListener($token));
    }

    /**
     * {@inheritdoc}
     */
    public function get($url)
    {
        $response = $this->browser->get($url);

        $this->handleResponse($response);

        return $response->getContent();
    }

    /**
     * {@inheritdoc}
     */
    public function delete($url)
    {
        $response = $this->browser->delete($url);

        $this->handleResponse($response);
    }

    /**
     * {@inheritdoc}
     */
    public function put($url, $content = '')
    {
        $response = $this->browser->put($url, [], $content);

        $this->handleResponse($response);

        return $response->getContent();
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, array $content = array())
    {
        if (empty($this->files))
        {
            $response = $this->browser->post($url, [], $content);
        }
        else
        {
            $content = array_merge($content, $this->files);

            $response = $this->browser->submit($url, $content);
        }

        $this->handleResponse($response);

        return $response->getContent();
    }

    /**
     * {@inheritdoc}
     */
    public function addFile($key, $filepath)
    {
        $this->files[$key] = new FormUpload($filepath);
    }

    /**
     * {@inheritdoc}
     */
    public function getLatestResponseHeaders()
    {
        if (null === $response = $this->browser->getLastResponse()) {
            return;
        }

        return [
            'reset' => (int) $response->getHeader('RateLimit-Reset'),
            'remaining' => (int) $response->getHeader('RateLimit-Remaining'),
            'limit' => (int) $response->getHeader('RateLimit-Limit'),
        ];
    }

    /**
     * @param Response $response
     *
     * @throws HttpException
     */
    protected function handleResponse(Response $response)
    {
        if ($response->isSuccessful()) {
            return;
        }

        $this->handleError($response);
    }

    /**
     * @param Response $response
     *
     * @throws HttpException
     */
    protected function handleError(Response $response)
    {
        $body = (string) $response->getContent();
        $code = (int) $response->getStatusCode();

        $content = json_decode($response->getContent());

        throw new HttpException(isset($content->message) ? $content->message : 'Request not processed.', $code);
    }
}