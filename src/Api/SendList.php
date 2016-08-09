<?php
namespace Softr\AllInMail\Api;

use Softr\AllInMail\Core\Collection;
use Softr\AllInMail\Entity\Filtro as FiltroModel;
use Softr\AllInMail\Entity\SendList as SendListModel;

/**
 * SendList Endpoint
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class SendList extends \Softr\AllInMail\Core\Api\AbstractApi
{
    /**
     * Return all Lists
     *
     * @return  array
     */
    public function getAll()
    {
        $response = $this->requestGet('getlistas');

        $collection = new Collection();

        if (isset($response['itensConteudo']) && is_array($response['itensConteudo'])) {

            foreach ($response['itensConteudo'] as $value) {
                $item = new SendListModel();

                $item->setNome($value['itensConteudo_nm_lista'])
                     ->setSubUsuario($value['itensConteudo_nm_usuario_sub'])
                     ->setException($value['exception']);

                $collection->addItem($item);
            }
        }

        return $collection;
    }

    /**
     * Create new list
     *
     * @param   string  $name    List name
     * @param   array   $fields  Fields array
     * @return  mixed
     */
    public function create($name, array $fields)
    {
        $data = array('nm_lista' => $name, 'campos' => $fields);

        $response = $this->requestPost('criarLista', null, array('dados' => json_encode($data)));

        // Return List Id
        if (isset($response['output']['success']) && isset($response['output']['id_lista'])) {
            return $response['output']['id_lista'];
        }

        return false;
    }

    /**
     * Insert email on List
     *
     * @param   string  $name    List name
     * @param   array   $fields  Fields array
     * @param   array   $values  Data array
     * @return  bool
     */
    public function insertEmail($name, array $fields, array $values)
    {
        $data = array(
            'nm_lista' => $name,
            'campos'   => implode(';', $fields),
            'valor'    => implode(';', $values),
        );

        $response = $this->requestPost('inserir_email_base', null, array('dados_email' => json_encode($data)));

        if ($response == 'Email inserido na base!') {
            return true;
        }

        return false;
    }

    /**
     * Remove email from list
     *
     * @param   string  $name   List name
     * @param   string  $email  Target email
     * @return  bool
     */
    public function removeEmail($name, $email)
    {
        $response = $this->requestGet('remover_email_base', array('nm_lista' => $name, 'email' => $email));

        if ($response == 'Email removido da lista!') {
            return true;
        }

        return false;
    }

    /**
     * Return all filters
     *
     * @return  array
     */
    public function getFilters()
    {
        $response = $this->requestGet('getfiltros');

        $collection = new Collection();

        if (is_array($response)) {
            foreach ($response as $filtro) {
                $item = new FiltroModel();

                $item->setNome($filtro['itensConteudo_nm_filtro'])
                     ->setLista($filtro['itensConteudo_nm_lista'])
                     ->setTotal($filtro['itensConteudo_total'])
                     ->setException($filtro['exception']);

                $collection->addItem($item);
            }
        }

        return $collection;
    }

    /**
     * Test filter
     *
     * @param   string  $name    List name
     * @param   string  $filter  Filter name
     * @return  bool
     */
    public function testFilter($name, $filter)
    {
        $response = $this->requestGet('testarfiltro', array('nm_lista' => $name, 'nm_filtro' => $filter));

        return isset($response['total']) ? $response['total'] : false;
    }

    /**
     * Upload list file
     *
     * @param   string  $name          List name
     * @param   string  $action        List action
     * @param   string  $separator     Fields separator
     * @param   string  $qualifier     File qualifier
     * @param   string  $saveExcluded  Save excluded emails?
     * @param   array   $fields        Fields array
     * @param   string  $filepath      File path
     * @return  bool
     */
    public function uploadFile($name, $action, $separator, $qualifier, $saveExcluded, array $fields, $filepath)
    {
        // Avoid empty file
        if(is_file($filepath) == false)
        {
            return false;
        }

        // Append file
        $this->adapter->addFile('arquivo', $filepath);

        // Fields separator
        switch ($separator) {
            case '1': $fields = implode(';', $fields); break;

            case '2': $fields = implode(',', $fields); break;

            case '3': $fields = implode("\t", $fields); break;

            default: $fields = implode(';', $fields); break;
        }

        $data = array(
            'nm_lista'       => $name,
            'acao_arquivo'   => $action,
            'separador'      => $separator,
            'qualificador'   => $qualifier,
            'excluidos'      => $saveExcluded,
            'campos_arquivo' => $fields,
        );

        $this->response = $this->requestPost('uploadLista', null, array('dados' => json_encode($data)));

        // Return Log Id
        if (isset($this->response['output']['success'])) {
            return $this->response['output']['id_log'];
        }

        return false;
    }

    /**
     * Get upload status
     *
     * @param   string  $logId  Log Id
     * @return  mixed
     */
    public function getUploadStatus($logId)
    {
        $this->response = $this->requestPost('getStatusUploadLista', null, array('id_log' => $name));

        // Return Log Id
        if (isset($this->response['output']['success'])) {
            return $this->response['output'];
        }

        return false;
    }
}