<?php
namespace Softr\AllInMail\Entity;

/**
 * SendList Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class SendList extends \Softr\AllInMail\Core\Entity\AbstractEntity
{
    /**
     * @var string
     */
    protected $nome;

    /**
     * @var string
     */
    protected $subUsuario;

    /**
     * @var string
     */
    protected $exception;

    /**
     * Gets the value of nome.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param string $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

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