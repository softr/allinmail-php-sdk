<?php
namespace Softr\AllInMail\Entity;

use Softr\AllInMail\Core\Utils\Time;

/**
 * Opening Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Opening extends \Softr\AllInMail\Core\Entity\AbstractEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $total;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $cidade;

    /**
     * @var string
     */
    protected $estado;

    /**
     * @var string
     */
    protected $pais;

    /**
     * @var \DateTime
     */
    protected $dataView;

    /**
     * @var string
     */
    protected $exception;

    /**
     * Gets the value of id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param int $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * Gets the value of cidade.
     *
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Sets the value of cidade.
     *
     * @param string $cidade the cidade
     *
     * @return self
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Gets the value of estado.
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Sets the value of estado.
     *
     * @param string $estado the estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Gets the value of país.
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Sets the value of país.
     *
     * @param string $país the país
     *
     * @return self
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Gets the value of dataView.
     *
     * @return \DateTime
     */
    public function getDataView()
    {
        return $this->dataView;
    }

    /**
     * Sets the value of dataView.
     *
     * @param string $dataView the data view
     *
     * @return self
     */
    public function setDataView($dataView)
    {
        $this->dataView = Time::stringToDateTime($dataView);

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