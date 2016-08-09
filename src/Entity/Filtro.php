<?php
namespace Softr\AllInMail\Entity;

/**
 * Filtro Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Filtro extends \Softr\AllInMail\Core\Entity\AbstractEntity
{
    /**
     * @var string
     */
    protected $nome;

    /**
     * @var string
     */
    protected $lista;

    /**
     * @var int
     */
    protected $total;

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
     * Gets the value of lista.
     *
     * @return string
     */
    public function getLista()
    {
        return $this->lista;
    }

    /**
     * Sets the value of lista.
     *
     * @param string $lista the lista
     *
     * @return self
     */
    public function setLista($lista)
    {
        $this->lista = $lista;

        return $this;
    }

    /**
     * Gets the value of total.
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Sets the value of total.
     *
     * @param int $total the total
     *
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;

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