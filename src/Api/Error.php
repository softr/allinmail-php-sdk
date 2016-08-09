<?php
namespace Softr\AllInMail\Api;

use Softr\AllInMail\Core\Collection;
use Softr\AllInMail\Entity\Error as ErrorModel;

/**
 * Error Endpoint
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class Error extends \Softr\AllInMail\Core\Api\AbstractApi
{
    /**
     * Return total of errors by campaign
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  int
     */
    public function countErrorsByCampaign($campaign_id)
    {
        $response = $this->requestGet('get_erros_permanentes', array('campanha_id' => $campaign_id));

        if ($response == 'Essa campanha nao possui emails bounced.') {
            return 0;
        }

        return $response;
    }

    /**
     * Return total of errors by campaign
     *
     * @param   int    $campaign_id  Campaign Id
     * @param   int    $start        Start Offset
     * @param   int    $end          Ending Offset
     * @return  array
     */
    public function getErrorsByCampaign($campaign_id, $start = 0, $end = 1000)
    {
        $start = max(1, $start);

        $end = ($end - $start) > 1000 ? 1000 : $end;

        $response = $this->requestGet('get_erros_permanentes', array('campanha_id' => $campaign_id, 'range' => ($start . ',' . $end)));

        $collection = new Collection();

        if (isset($response['itensConteudo']) && is_array($response['itensConteudo'])) {
            foreach ($response['itensConteudo'] as $value) {
                $item = new ErrorModel();

                $item->setEmail($value['itensConteudo_nm_email'])
                     ->setTotalInvalid($value['itensConteudo_totalinvalidos'])
                     ->setException($value['exception']);

                $collection->addItem($item);
            }
        }

        return $collection;
    }

    /**
     * Return total of errors by campaign
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  int
     */
    public function countInvalids()
    {
        return $this->requestGet('get_erros_permanentes');
    }

    /**
     * Return invalid emails
     *
     * @param   int  $start  Start Offset
     * @param   int  $end    Ending Offset
     * @return  int
     */
    public function getInvalids($start = 0, $end = 1000)
    {
        $start = max(1, $start);

        $end = ($end - $start) > 1000 ? 1000 : $end;

        $response = $this->requestGet('get_invalidos', array('range' => ($start . ',' . $end)));

        $collection = new Collection();

        if (isset($response['itensConteudo']) && is_array($response['itensConteudo'])) {
            foreach ($response['itensConteudo'] as $value) {
                $item = new ErrorModel();

                $item->setEmail($value['itensConteudo_nm_email'])
                     ->setTotalInvalid($value['itensConteudo_totalinvalidos'])
                     ->setException($value['exception']);

                $collection->addItem($item);
            }
        }

        return $collection;
    }

    /**
     * Return invalid emails by campaign
     *
     * @param   int    $campaign_id  Campaign Id
     * @param   int    $start        Start Offset
     * @param   int    $end          Ending Offset
     * @return  array
     */
    public function getInvalidsByCampaign($campaign_id, $start = 0, $end = 1000)
    {
        $start = max(1, $start);

        $end = ($end - $start) > 1000 ? 1000 : $end;

        $response = $this->requestGet('get_invalidos', array('campanha_id' => $campaign_id, 'range' => ($start . ',' . $end)));

        $collection = new Collection();

        if (isset($response['itensConteudo']) && is_array($response['itensConteudo'])) {
            foreach ($response['itensConteudo'] as $value) {
                $item = new ErrorModel();

                $item->setEmail($value['itensConteudo_nm_email'])
                     ->setTotalInvalid($value['itensConteudo_totalinvalidos'])
                     ->setException($value['exception']);

                $collection->addItem($item);
            }
        }

        return $collection;
    }
}