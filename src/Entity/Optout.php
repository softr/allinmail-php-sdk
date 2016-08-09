<?php
namespace Softr\AllInMail\Entity;

/**
 * Optout Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Optout extends \Softr\AllInMail\Core\Entity\AbstractEntity
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $subUsuario;

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
     * Gets the value of subUsuario.
     *
     * @return string
     */
    public function getSubUsuario()
    {
        return $this->subUsuario;
    }

    /**
     * Sets the value of subUsuario.
     *
     * @param string $subUsuario the sub usuario
     *
     * @return self
     */
    public function setSubUsuario($subUsuario)
    {
        $this->subUsuario = $subUsuario;

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