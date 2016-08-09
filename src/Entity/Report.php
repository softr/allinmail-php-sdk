<?php
namespace Softr\AllInMail\Entity;

use Softr\AllInMail\Core\Utils\Time;

/**
 * Report Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Report extends \Softr\AllInMail\Core\Entity\AbstractEntity
{
    /**
     * Campaign Id
     *
     * @var int
     */
    protected $id;

    /**
     * Campaign Name
     *
     * @var string
     */
    protected $nome;

    /**
     * Campaign Subject
     *
     * @var string
     */
    protected $assunto;

    /**
     * List name
     *
     * @var string
     */
    protected $lista;

    /**
     * Filter name
     *
     * @var string
     */
    protected $filtro;

    /**
     * @var \DateTime
     */
    protected $dataInicio;

    /**
     * @var \DateTime
     */
    protected $dataEncerramento;

    /**
     * Optout total
     *
     * @var string
     */
    protected $optout;

    /**
     * Total de e-mails do envio
     *
     * @var int
     */
    protected $envios;

    /**
     * Total de e-mails entregues do envio
     *
     * @var int
     */
    protected $entregues;

    /**
     * Percentual de entregues do envio
     *
     * @var float
     */
    protected $percEntregues;

    /**
     * Total de e-mails não entregues
     *
     * @var float
     */
    protected $naoEntregues;

    /**
     * Total de e-mails abertos
     *
     * @var int
     */
    protected $aberturas;

    /**
     * Total de e-mails não abertos
     *
     * @var int
     */
    protected $naoAberturas;

    /**
     * Percentual de e-mails abertos
     *
     * @var int
     */
    protected $percAberturas;

    /**
     * Tamanho Médio por e-mail
     *
     * @var int
     */
    protected $tamEmail;

    /**
     * Tamanho total da campanha
     *
     * @var int
     */
    protected $tamCampanha;

    /**
     * Total de usuários hotmail que classificaram como SPAM
     *
     * @var int
     */
    protected $spamHotmail;

    /**
     * Total de usuários yahoo que classificaram como SPAM
     *
     * @var int
     */
    protected $spamYahoo;

    /**
     * Quantidade de E-mails indicados
     *
     * @var int
     */
    protected $indicados;

    /**
     * Quantidade de Clique do Indicados
     *
     * @var int
     */
    protected $cliqueIndicados;

    /**
     * Total de visualizações no Twitter
     *
     * @var int
     */
    protected $viewTwitter;

    /**
     * Total de cliques no Twitter
     *
     * @var int
     */
    protected $cliquesTwitter;

    /**
     * Quantidade de Erros permanentes do envio
     *
     * @var int
     */
    protected $errosPermanentes;

    /**
     * Percentual de Erros permanentes do envio
     *
     * @var float
     */
    protected $percErrosPermanentes;

    /**
     * Quantidade de Erros temporários do envio
     *
     * @var int
     */
    protected $errosTemporarios;

    /**
     * Percentual de Erros temporários do envio
     *
     * @var int
     */
    protected $percErrosTemporarios;

    /**
     * Total de cliques únicos no e-mail
     *
     * @var int
     */
    protected $cliquesUnicos;

    /**
     * Percentual de cliques únicos no e-mail
     *
     * @var int
     */
    protected $percCliquesUnicos;

    /**
     * Total de cliques
     *
     * @var int
     */
    protected $totalCliques;

    /**
     * Nome do SubCliente utilizado no envio
     *
     * @var int
     */
    protected $subUsuario;

    /**
     * @var string
     */
    protected $exception;

    /**
     * Gets the Campaign Id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the Campaign Id.
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
     * Gets the Campaign Name.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the Campaign Name.
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
     * Gets the Campaign Subject.
     *
     * @return string
     */
    public function getAssunto()
    {
        return $this->assunto;
    }

    /**
     * Sets the Campaign Subject.
     *
     * @param string $assunto the assunto
     *
     * @return self
     */
    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;

        return $this;
    }

    /**
     * Gets the List name.
     *
     * @return string
     */
    public function getLista()
    {
        return $this->lista;
    }

    /**
     * Sets the List name.
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
     * Gets the Filter name.
     *
     * @return string
     */
    public function getFiltro()
    {
        return $this->filtro;
    }

    /**
     * Sets the Filter name.
     *
     * @param string $filtro the filtro
     *
     * @return self
     */
    public function setFiltro($filtro)
    {
        $this->filtro = $filtro;

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
     * @param \DateTime $dataCadastro the data cadastro
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
     * @param \DateTime $dataEncerramento the data encerramento
     *
     * @return self
     */
    public function setDataEncerramento($dataEncerramento)
    {
        $this->dataEncerramento = Time::stringToDateTime($dataEncerramento);

        return $this;
    }

    /**
     * Gets the Optout total.
     *
     * @return string
     */
    public function getOptout()
    {
        return $this->optout;
    }

    /**
     * Sets the Optout total.
     *
     * @param string $optout the optout
     *
     * @return self
     */
    public function setOptout($optout)
    {
        $this->optout = $optout;

        return $this;
    }

    /**
     * Gets the Total de e-mails do envio.
     *
     * @return int
     */
    public function getEnvios()
    {
        return $this->envios;
    }

    /**
     * Sets the Total de e-mails do envio.
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
     * Gets the Total de e-mails entregues do envio.
     *
     * @return int
     */
    public function getEntregues()
    {
        return $this->entregues;
    }

    /**
     * Sets the Total de e-mails entregues do envio.
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
     * Gets the Percentual de entregues do envio.
     *
     * @return float
     */
    public function getPercEntregues()
    {
        return $this->percEntregues;
    }

    /**
     * Sets the Percentual de entregues do envio.
     *
     * @param float $percEntregues the perc entregues
     *
     * @return self
     */
    public function setPercEntregues($percEntregues)
    {
        $this->percEntregues = $percEntregues;

        return $this;
    }

    /**
     * Gets the Total de e-mails não entregues.
     *
     * @return float
     */
    public function getNaoEntregues()
    {
        return $this->naoEntregues;
    }

    /**
     * Sets the Total de e-mails não entregues.
     *
     * @param float $naoEntregues the nao entregues
     *
     * @return self
     */
    public function setNaoEntregues($naoEntregues)
    {
        $this->naoEntregues = $naoEntregues;

        return $this;
    }

    /**
     * Gets the Total de e-mails abertos.
     *
     * @return int
     */
    public function getAberturas()
    {
        return $this->aberturas;
    }

    /**
     * Sets the Total de e-mails abertos.
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
     * Gets the Total de e-mails não abertos.
     *
     * @return int
     */
    public function getNaoAberturas()
    {
        return $this->naoAberturas;
    }

    /**
     * Sets the Total de e-mails não abertos.
     *
     * @param int $naoAberturas the nao aberturas
     *
     * @return self
     */
    public function setNaoAberturas($naoAberturas)
    {
        $this->naoAberturas = $naoAberturas;

        return $this;
    }

    /**
     * Gets the Percentual de e-mails não abertos.
     *
     * @return int
     */
    public function getPercAberturas()
    {
        return $this->percAberturas;
    }

    /**
     * Sets the Percentual de e-mails não abertos.
     *
     * @param int $percAberturas the nao aberturas
     *
     * @return self
     */
    public function setPercAberturas($percAberturas)
    {
        $this->percAberturas = $percAberturas;

        return $this;
    }

    /**
     * Gets the Tamanho Médio por e-mail.
     *
     * @return int
     */
    public function getTamEmail()
    {
        return $this->tamEmail;
    }

    /**
     * Sets the Tamanho Médio por e-mail.
     *
     * @param int $tamEmail the tam email
     *
     * @return self
     */
    public function setTamEmail($tamEmail)
    {
        $this->tamEmail = $tamEmail;

        return $this;
    }

    /**
     * Gets the Tamanho total da campanha.
     *
     * @return int
     */
    public function getTamCampanha()
    {
        return $this->tamCampanha;
    }

    /**
     * Sets the Tamanho total da campanha.
     *
     * @param int $tamCampanha the tam campanha
     *
     * @return self
     */
    public function setTamCampanha($tamCampanha)
    {
        $this->tamCampanha = $tamCampanha;

        return $this;
    }

    /**
     * Gets the Total de usuários hotmail que classificaram como SPAM.
     *
     * @return int
     */
    public function getSpamHotmail()
    {
        return $this->spamHotmail;
    }

    /**
     * Sets the Total de usuários hotmail que classificaram como SPAM.
     *
     * @param int $spamHotmail the spam hotmail
     *
     * @return self
     */
    public function setSpamHotmail($spamHotmail)
    {
        $this->spamHotmail = $spamHotmail;

        return $this;
    }

    /**
     * Gets the Total de usuários yahoo que classificaram como SPAM.
     *
     * @return int
     */
    public function getSpamYahoo()
    {
        return $this->spamYahoo;
    }

    /**
     * Sets the Total de usuários yahoo que classificaram como SPAM.
     *
     * @param int $spamYahoo the spam yahoo
     *
     * @return self
     */
    public function setSpamYahoo($spamYahoo)
    {
        $this->spamYahoo = $spamYahoo;

        return $this;
    }

    /**
     * Gets the Quantidade de E-mails indicados.
     *
     * @return int
     */
    public function getIndicados()
    {
        return $this->indicados;
    }

    /**
     * Sets the Quantidade de E-mails indicados.
     *
     * @param int $indicados the indicados
     *
     * @return self
     */
    public function setIndicados($indicados)
    {
        $this->indicados = $indicados;

        return $this;
    }

    /**
     * Gets the Quantidade de Clique do Indicados.
     *
     * @return int
     */
    public function getCliqueIndicados()
    {
        return $this->cliqueIndicados;
    }

    /**
     * Sets the Quantidade de Clique do Indicados.
     *
     * @param int $cliqueIndicados the clique indicados
     *
     * @return self
     */
    public function setCliqueIndicados($cliqueIndicados)
    {
        $this->cliqueIndicados = $cliqueIndicados;

        return $this;
    }

    /**
     * Gets the Total de visualizações no Twitter.
     *
     * @return int
     */
    public function getViewTwitter()
    {
        return $this->viewTwitter;
    }

    /**
     * Sets the Total de visualizações no Twitter.
     *
     * @param int $viewTwitter the view twitter
     *
     * @return self
     */
    public function setViewTwitter($viewTwitter)
    {
        $this->viewTwitter = $viewTwitter;

        return $this;
    }

    /**
     * Gets the Total de cliques no Twitter.
     *
     * @return int
     */
    public function getCliquesTwitter()
    {
        return $this->cliquesTwitter;
    }

    /**
     * Sets the Total de cliques no Twitter.
     *
     * @param int $cliquesTwitter the cliques twitter
     *
     * @return self
     */
    public function setCliquesTwitter($cliquesTwitter)
    {
        $this->cliquesTwitter = $cliquesTwitter;

        return $this;
    }

    /**
     * Gets the Quantidade de Erros permanentes do envio.
     *
     * @return int
     */
    public function getErrosPermanentes()
    {
        return $this->errosPermanentes;
    }

    /**
     * Sets the Quantidade de Erros permanentes do envio.
     *
     * @param int $errosPermanentes the erros permanentes
     *
     * @return self
     */
    public function setErrosPermanentes($errosPermanentes)
    {
        $this->errosPermanentes = $errosPermanentes;

        return $this;
    }

    /**
     * Gets the Percentual de Erros permanentes do envio.
     *
     * @return float
     */
    public function getPercErrosPermanentes()
    {
        return $this->percErrosPermanentes;
    }

    /**
     * Sets the Percentual de Erros permanentes do envio.
     *
     * @param float $percErrosPermanentes the perc erros permanentes
     *
     * @return self
     */
    public function setPercErrosPermanentes($percErrosPermanentes)
    {
        $this->percErrosPermanentes = $percErrosPermanentes;

        return $this;
    }

    /**
     * Gets the Quantidade de Erros temporarios do envio.
     *
     * @return int
     */
    public function getErrosTemporarios()
    {
        return $this->errosTemporarios;
    }

    /**
     * Sets the Quantidade de Erros temporarios do envio.
     *
     * @param int $errosTemporarios the erros temporarios
     *
     * @return self
     */
    public function setErrosTemporarios($errosTemporarios)
    {
        $this->errosTemporarios = $errosTemporarios;

        return $this;
    }

    /**
     * Gets the Percentual de Erros temporários do envio.
     *
     * @return int
     */
    public function getPercErrosTemporarios()
    {
        return $this->percErrosTemporarios;
    }

    /**
     * Sets the Percentual de Erros temporários do envio.
     *
     * @param int $percErrosTemporarios the perc erros temporarios
     *
     * @return self
     */
    public function setPercErrosTemporarios($percErrosTemporarios)
    {
        $this->percErrosTemporarios = $percErrosTemporarios;

        return $this;
    }

    /**
     * Gets the Total de cliques únicos no e-mail.
     *
     * @return int
     */
    public function getCliquesUnicos()
    {
        return $this->cliquesUnicos;
    }

    /**
     * Sets the Total de cliques únicos no e-mail.
     *
     * @param int $cliquesUnicos the total cliques unicos
     *
     * @return self
     */
    public function setCliquesUnicos($cliquesUnicos)
    {
        $this->cliquesUnicos = $cliquesUnicos;

        return $this;
    }

    /**
     * Gets the Percentual de cliques únicos no e-mail.
     *
     * @return int
     */
    public function getPercCliquesUnicos()
    {
        return $this->percCliquesUnicos;
    }

    /**
     * Sets the Percentual de cliques únicos no e-mail.
     *
     * @param int $percCliquesUnicos the perc cliques unicos
     *
     * @return self
     */
    public function setPercCliquesUnicos($percCliquesUnicos)
    {
        $this->percCliquesUnicos = $percCliquesUnicos;

        return $this;
    }

    /**
     * Gets the Total de cliques.
     *
     * @return int
     */
    public function getTotalCliques()
    {
        return $this->totalCliques;
    }

    /**
     * Sets the Total de cliques.
     *
     * @param int $totalCliques the total cliques
     *
     * @return self
     */
    public function setTotalCliques($totalCliques)
    {
        $this->totalCliques = $totalCliques;

        return $this;
    }

    /**
     * Gets the Nome do SubCliente utilizado no envio.
     *
     * @return int
     */
    public function getSubUsuario()
    {
        return $this->subUsuario;
    }

    /**
     * Sets the Nome do SubCliente utilizado no envio.
     *
     * @param int $subUsuario the sub usuario
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