<?php
namespace Softr\AllInMail\Adapter;

// Buzz
use Buzz\Listener\ListenerInterface;
use Buzz\Message\MessageInterface;
use Buzz\Message\RequestInterface;

/**
 * Buzz Auth Listener
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class BuzzAuthListener implements ListenerInterface
{
    /**
     * Access Token
     *
     * @var  string
     */
    private $token;

    /**
     * Constructor
     *
     * @param  string  $token  Access Token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Execute before send request
     *
     * @param   RequestInterface  $request  Request instance
     */
    public function preSend(RequestInterface $request)
    {
        list($url, $query) = array_pad(explode('?', $request->getResource(), 2), -2, null);

        parse_str($query, $params);

        $params['token'] = $this->token;
        $params['output'] = 'json';

        $request->setResource($url . '?' . http_build_query($params));
    }

    /**
     * Execute after request
     *
     * @param   RequestInterface  $request   Request Instance
     * @param   MessageInterface  $response  Response Instance
     */
    public function postSend(RequestInterface $request, MessageInterface $response)
    {
        // Nothing here
    }
}
