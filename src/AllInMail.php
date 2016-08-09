<?php
namespace Softr\AllInMail;

// API's
use Softr\AllInMail\Adapter\AdapterInterface;
use Softr\AllInMail\Api\Campaign;
use Softr\AllInMail\Api\Error;
use Softr\AllInMail\Api\Optout;
use Softr\AllInMail\Api\SendList;

/**
 * AllInMail API Wrapper
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class AllInMail
{
    /**
     * Adapter Interface
     *
     * @var  AdapterInterface
     */
    protected $adapter;

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
     * Get list endpoint
     *
     * @return  SendList
     */
    public function sendList()
    {
        return new SendList($this->adapter);
    }

    /**
     * Get campaign endpoint
     *
     * @return  Campaign
     */
    public function campaign()
    {
        return new Campaign($this->adapter);
    }

    /**
     * Get optout endpoint
     *
     * @return  Optout
     */
    public function optout()
    {
        return new Optout($this->adapter);
    }

    /**
     * Get error endpoint
     *
     * @return  Error
     */
    public function error()
    {
        return new Error($this->adapter);
    }
}