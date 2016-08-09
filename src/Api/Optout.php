<?php
namespace Softr\AllInMail\Api;

use Softr\AllInMail\Core\Collection;
use Softr\AllInMail\Entity\Optout as OptoutModel;

/**
 * Optout Endpoint
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class Optout extends \Softr\AllInMail\Core\Api\AbstractApi
{
    /**
     * Return all optouts
     *
     * @param   string  $dataInicio  Start date
     * @param   string  $dataFim     End date
     * @return  mixed
     */
    public function getAll($dataInicio = '', $dataFim = '')
    {
        $dataInicio = empty($dataInicio) ? date('Y-m-d', strtotime('-30 days')) : $dataInicio;

        $dataFim = empty($dataFim) ? date('Y-m-d') : $dataFim;

        $response = $this->requestGet('getOptout', array('dt_inicio' => $dataInicio, 'dt_fim' => $dataFim));

        $collection = new Collection();

        if (isset($response['itensConteudo']) && is_array($response['itensConteudo'])) {
            foreach ($response['itensConteudo'] as $value) {
                $item = new OptoutModel();

                $item->setEmail($value['itensConteudo_email'])
                     ->setSubUsuario($value['itensConteudo_sub'])
                     ->setException($value['exception']);

                $collection->addItem($item);
            }
        }

        return $collection;
    }

    /**
     * Insert email on optout
     *
     * @param   string  $name        Target email
     * @param   array   $subcliente  Subclient?
     * @return  mixed
     */
    public function insertEmail($email, $subcliente = '')
    {
        $response = $this->requestGet('inserir_email_optout', array('email' => $email, 'subcliente' => $subcliente));

        if ($response == 'Email inserido no optout!') {
            return true;
        }

        return false;
    }

    /**
     * Remove email from optout
     *
     * @param   string  $name        Target email
     * @param   array   $subcliente  Subclient?
     * @return  mixed
     */
    public function removeEmail($email, $subcliente = '')
    {
        $response = $this->requestGet('remover_email_optout', array('email' => $email, 'subcliente' => $subcliente));

        if ($response == 'Email removido do optout!') {
            return true;
        }

        return false;
    }
}