<?php
namespace Softr\AllInMail\Entity;

/**
 * Error Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Error extends \Softr\AllInMail\Core\Entity\AbstractEntity
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @var int
     */
    protected $totalInvalid;

    /**
     * @var string
     */
    protected $exception;

    /**
     * Gets the value of email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param string $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of Total invalidos.
     *
     * @return string
     */
    public function getTotalInvalid()
    {
        return $this->totalInvalid;
    }

    /**
     * Sets the value of total invalidos.
     *
     * @param string $total Total invalidos
     *
     * @return self
     */
    public function setTotalInvalid($totalInvalid)
    {
        $this->totalInvalid = $totalInvalid;

        return $this;
    }

    /**
     * Gets the value of exception.
     *
     * @return string
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * Sets the value of exception.
     *
     * @param string $exception the exception
     *
     * @return self
     */
    public function setException($exception)
    {
        $this->exception = $exception;

        return $this;
    }
}