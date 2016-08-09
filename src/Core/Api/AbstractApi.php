<?php
namespace Softr\AllInMail\Core\Api;

use Softr\AllInMail\Adapter\AdapterInterface;

/**
 * Abstract API
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
abstract class AbstractApi
{
    /**
     * Endpoint Produção
     *
     * @var string
     */
    const ENDPOINT_PRODUCAO = 'https://painel02.allinmail.com.br/allinapi/';

    /**
     * Http Adapter Instance
     *
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * API Last Response
     *
     * @var mixed
     */
    protected $response;

    /**
     * Constructor
     *
     * @param  AdapterInterface  $adapter  Adapter Instance
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Return POST Request
     *
     * @param   string  $method   Endpoint method
     * @param   array   $params   Additional URL Parameters
     * @return  array   Response
     */
    protected function requestGet($method, $params = '')
    {
        $requestUrl = $this->prepareUrl($method, $params);

        $response = $this->adapter->get($requestUrl);

        return json_decode($response, true);
    }

    /**
     * Return POST Request
     *
     * @param   string  $method   Endpoint method
     * @param   array   $params   Additional URL Parameters
     * @param   array   $data     Request data
     * @param   array   $files    Request files
     * @return  array   Response
     */
    protected function requestPost($method, $params = '', array $data = array(), array $files = [])
    {
        $requestUrl = $this->prepareUrl($method, $params);

        $response = $this->adapter->post($requestUrl, $data, $files);

        return json_decode($response, true);
    }

    /**
     * Build base URL
     *
     * @param   string  $url  Endpoint URL
     * @param   string  $url  Additional URL Parameters
     * @return  string
     */
    protected function prepareUrl($method, $params = array())
    {
        $url = sprintf('%s?method=%s', static::ENDPOINT_PRODUCAO, ltrim(trim($method)));

        return empty($params) || is_array($params) == false ? $url : $url . '&' . urldecode(http_build_query($params, '', '&'));
    }

    /**
     * Get API Last Response
     *
     * @return  mixed
     */
    public function getLastResponse()
    {
        return $this->response;
    }
}