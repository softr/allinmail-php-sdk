<?php
namespace Softr\AllInMail\Entity;

use Softr\AllInMail\Core\Utils\Time;

/**
 * Campaign Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Campaign extends \Softr\AllInMail\Core\Entity\AbstractEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $nome;

    /**
     * @var \DateTime
     */
    protected $dataCadastro;

    /**
     * @var \DateTime
     */
    protected $dataInicio;

    /**
     * @var \DateTime
     */
    protected $dataEncerramento;

    /**
     * @var int
     */
    protected $envios;

    /**
     * @var int
     */
    protected $entregues;

    /**
     * @var int
     */
    protected $aberturas;

    /**
     * @var int
     */
    protected $cliques;

    /**
     * @var string
     */
    protected $status;

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
     * Gets the value of dataCadastro.
     *
     * @return \DateTime
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Sets the value of dataCadastro.
     *
     * @param \DateTime $dataCadastro the data inicio
     *
     * @return self
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = Time::stringToDateTime($dataCadastro);

        return $this;
    }

    /**
     * Gets the value of dataInicio.
     *
     * @return \DateTime
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * Sets the value of dataInicio.
     *
     * @param \DateTime $dataInicio the data inicio
     *
     * @return self
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = Time::stringToDateTime($dataInicio);

        return $this;
    }

    /**
     * Gets the value of dataEncerramento.
     *
     * @return \DateTime
     */
    public function getDataEncerramento()
    {
        return $this->dataEncerramento;
    }

    /**
     * Sets the value of dataEncerramento.
     *
     * @param string  $dataEncerramento  Data encerramento
     *
     * @return self
     */
    public function setDataEncerramento($dataEncerramento)
    {
        $this->dataEncerramento = Time::stringToDateTime($dataEncerramento);

        return $this;
    }

    /**
     * Gets the value of envios.
     *
     * @return int
     */
    public function getEnvios()
    {
        return $this->envios;
    }

    /**
     * Sets the value of envios.
     *
     * @param int $envios the envios
     *
     * @return self
     */
    public function setEnvios($envios)
    {
        $this->envios = $envios;

        return $this;
    }

    /**
     * Gets the value of entregues.
     *
     * @return int
     */
    public function getEntregues()
    {
        return $this->entregues;
    }

    /**
     * Sets the value of entregues.
     *
     * @param int $entregues the entregues
     *
     * @return self
     */
    public function setEntregues($entregues)
    {
        $this->entregues = $entregues;

        return $this;
    }

    /**
     * Gets the value of aberturas.
     *
     * @return int
     */
    public function getAberturas()
    {
        return $this->aberturas;
    }

    /**
     * Sets the value of aberturas.
     *
     * @param int $aberturas the aberturas
     *
     * @return self
     */
    public function setAberturas($aberturas)
    {
        $this->aberturas = $aberturas;

        return $this;
    }

    /**
     * Gets the value of cliques.
     *
     * @return int
     */
    public function getCliques()
    {
        return $this->cliques;
    }

    /**
     * Sets the value of cliques.
     *
     * @param int $cliques the cliques
     *
     * @return self
     */
    public function setCliques($cliques)
    {
        $this->cliques = $cliques;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param string $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

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