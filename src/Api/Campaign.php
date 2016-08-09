<?php
namespace Softr\AllInMail\Api;

use Softr\AllInMail\Core\Collection;
use Softr\AllInMail\Entity\Click as ClickModel;
use Softr\AllInMail\Entity\Campaign as CampaignModel;
use Softr\AllInMail\Entity\Opening as OpeningModel;
use Softr\AllInMail\Entity\Report as ReportModel;

/**
 * Campaign Endpoint
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class Campaign extends \Softr\AllInMail\Core\Api\AbstractApi
{
    /**
     * Return draft campaigns
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  int
     */
    public function getAll($campaign_id)
    {
        $response = $this->requestGet('get_rascunhos_info', array('campanha_id' => $campaign_id));print_r($response);

        if (is_array($response) && isset($response['itensConteudo_id_campanha'])) {
            $item = new CampaignModel();

            $item->setId($response['itensConteudo_id_campanha'])
                 ->setNome($response['itensConteudo_nm_campanha'])
                 ->setDataInicio($response['itensConteudo_dt_inicio'] . ' ' . $response['itensConteudo_hr_inicio'])
                 ->setException($response['exception']);

            return $item;
        }
    }

    /**
     * Create new campaign
     *
     * @param   array  $data  Campaign data
     * @return  int
     */
    public function create(array $data)
    {
        $response = $this->requestPost('criar_envio', null, array('dados_envio' => json_encode($data)));

        // Return Campaign Id
        if (is_array($response) && isset($response['campanha_id'])) {
            return (int)$response['campanha_id'];
        }

        return false;
    }

    /**
     * Update campaign
     *
     * @param   int    $campaign_id  Campaign Id
     * @param   array  $data         Campaign data
     * @return  bool
     */
    public function update($campaign_id, array $data)
    {
        $response = $this->requestPost('alterar_envio', array('campanha_id' => $campaign_id), array('dados_envio' => json_encode($data)));

        if ($response == 'Campanha Alterada com sucesso!') {
            return true;
        }

        return false;
    }

    /**
     * Delete Campaign
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  array
     */
    public function delete($campaign_id)
    {
        $response = $this->requestGet('excluir_envio', array('campanha_id' => $campaign_id));

        if ($response == 'Envio excluido com sucesso!') {
            return true;
        }

        return false;
    }

    /**
     * Delete Campaign
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  array
     */
    public function duplicate($campaign_id)
    {
        $response = $this->requestGet('copiar_envio', array('campanha_id' => $campaign_id));

        if ($response == 'Envio copiado e disponibilizado em Rascunhos!') {
            return true;
        }

        return false;
    }

    /**
     * Test campaign dispatch
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  array
     */
    public function testSend($campaign_id)
    {
        $response = $this->requestGet('enviar_teste', array('campanha_id' => $campaign_id));

        if ($response == 'Teste enviado com sucesso!') {
            return true;
        }

        return false;
    }

    /**
     * Send Campaign
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  array
     */
    public function send($campaign_id)
    {
        $response = $this->requestGet('enviar_final', array('campanha_id' => $campaign_id));

        if (trim(html_entity_decode($response)) == "Aguarde. Em instantes iniciará o disparo.") {
            return true;
        }

        return false;
    }

    /**
     * Pause Campaign
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  array
     */
    public function pause($campaign_id)
    {
        $response = $this->requestGet('pausar', array('campanha_id' => $campaign_id));

        if ($response == 'Campanha Pausada!') {
            return true;
        }

        return false;
    }

    /**
     * Continue Campaign
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  array
     */
    public function unpause($campaign_id)
    {
        $response = $this->requestGet('despausar', array('campanha_id' => $campaign_id));

        if ($response == 'Envio em processo de disparo.') {
            return true;
        }

        return false;
    }

    /**
     * Get scheduled campaign
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  array
     */
    public function getScheduled($campaign_id)
    {
        $response = $this->requestGet('get_agendadas_info', array('campanha_id' => $campaign_id));

        if (is_array($response) && isset($response['itensConteudo_id_campanha'])) {
            $item = new CampaignModel();

            $item->setId($response['itensConteudo_id_campanha'])
                 ->setNome($response['itensConteudo_nm_campanha'])
                 ->setDataCadastro($response['itensConteudo_dt_cadastro'])
                 ->setDataInicio($response['itensConteudo_dt_inicio'] . ' ' . $response['itensConteudo_hr_inicio'])
                 ->setEnvios($response['itensConteudo_total_envio'])
                 ->setEntregues($response['itensConteudo_total_enviado'])
                 ->setStatus($response['itensConteudo_status'])
                 ->setException($response['exception']);

            return $item;
        }
    }

    /**
     * Get finished campaign
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  array
     */
    public function getFinished($campaign_id)
    {
        $response = $this->requestGet('get_encerradas_info', array('campanha_id' => $campaign_id));

        if (is_array($response) && isset($response['itensConteudo_id_campanha'])) {
            $item = new CampaignModel();

            $item->setId($response['itensConteudo_id_campanha'])
                 ->setNome($response['itensConteudo_nm_campanha'])
                 ->setDataInicio($response['itensConteudo_dt_inicio'] . ' ' . $response['itensConteudo_hr_inicio'])
                 ->setDataEncerramento($response['itensConteudo_dt_encerramento'])
                 ->setEnvios($response['itensConteudo_total_envio'])
                 ->setEntregues($response['itensConteudo_total_entregues'])
                 ->setAberturas($response['itensConteudo_total_abertura'])
                 ->setCliques($response['itensConteudo_total_clique'])
                 ->setException($response['exception']);

            return $item;
        }
    }

    /**
     * Get campaign report
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  array
     */
    public function getReport($campaign_id)
    {
        $response = $this->requestGet('relatorio_envio', array('campanha_id' => $campaign_id));

        if (is_array($response) && isset($response['itensConteudo_id_campanha'])) {
            $item = new ReportModel();

            $item->setId($response['itensConteudo_id_campanha'])
                 ->setNome($response['itensConteudo_nm_campanha'])
                 ->setAssunto($response['itensConteudo_nm_subject'])
                 ->setLista($response['itensConteudo_nm_lista'])
                 ->setFiltro($response['itensConteudo_nm_filter'])
                 ->setOptout($response['itensConteudo_total_optout'])
                 ->setDataInicio($response['itensConteudo_dt_inicio'] . ' ' . $response['itensConteudo_hr_inicio'])
                 ->setDataEncerramento($response['itensConteudo_dt_encerramento'])
                 ->setEnvios($response['itensConteudo_tot_envio'])
                 ->setEntregues($response['itensConteudo_tot_entregues'])
                 ->setPercEntregues($response['itensConteudo_per_entregues'])
                 ->setNaoEntregues($response['itensConteudo_nao_entregues'])
                 ->setAberturas($response['itensConteudo_tot_aberto'])
                 ->setNaoAberturas($response['itensConteudo_nao_aberto'])
                 ->setPercAberturas($response['itensConteudo_per_total_aberto'])
                 ->setTamEmail($response['itensConteudo_tamanho_email'])
                 ->setTamCampanha($response['itensConteudo_tamanho_total_campanha'])
                 ->setSpamHotmail($response['itensConteudo_tot_spam_hotmail'])
                 ->setSpamYahoo($response['itensConteudo_tot_spam_yahoo'])
                 ->setIndicados($response['itensConteudo_totIndike'])
                 ->setCliqueIndicados($response['itensConteudo_totClikIndike'])
                 ->setViewTwitter($response['itensConteudo_totViewTwitter'])
                 ->setCliquesTwitter($response['itensConteudo_totClikTwitter'])
                 ->setErrosPermanentes($response['itensConteudo_erro_permanente'])
                 ->setPercErrosPermanentes($response['itensConteudo_per_permanente'])
                 ->setErrosTemporarios($response['itensConteudo_erro_temporario'])
                 ->setPercErrosTemporarios($response['itensConteudo_per_temporario'])
                 ->setCliquesUnicos($response['itensConteudo_nr_total_click_unicos'])
                 ->setPercCliquesUnicos($response['itensConteudo_per_total_click_unicos'])
                 ->setTotalCliques($response['itensConteudo_nr_total_click'])
                 ->setSubUsuario($response['itensConteudo_nm_usuario_sub'])
                 ->setException($response['exception']);

            return $item;
        }
    }

    /**
     * List email openings by campaign
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  Collection
     */
    public function getOpenings($campaign_id, $start = 1, $end = 1000)
    {
        $start = max(1, $start);

        $end = ($end - $start) > 1000 ? 1000 : $end;

        $response = $this->requestGet('get_abertura_envio', array('campanha_id' => $campaign_id, 'range' => ($start . ',' . $end)));

        $collection = new Collection();

        if (isset($response['itensConteudo']) && is_array($response['itensConteudo'])) {
            foreach ($response['itensConteudo'] as $value) {
                $item = new OpeningModel();

                $item->setId($value['itensConteudo_id_campanha'])
                     ->setTotal($value['itensConteudo_total'])
                     ->setEmail($value['itensConteudo_nm_email'])
                     ->setCidade($value['itensConteudo_nm_cidade'])
                     ->setEstado($value['itensConteudo_nm_estado'])
                     ->setPais($value['itensConteudo_pais'])
                     ->setDataView($value['itensConteudo_dt_view'])
                     ->setException($value['exception']);

                $collection->addItem($item);
            }
        }

        return $collection;
    }

    /**
     * List clicks by campaign
     *
     * @param   int  $campaign_id  Campaign Id
     * @return  array
     */
    public function getClicks($campaign_id, $start = 1, $end = 1000)
    {
        $start = max(1, $start);

        $end = ($end - $start) > 1000 ? 1000 : $end;

        $response = $this->requestGet('get_clique_envio', array('campanha_id' => $campaign_id, 'range' => ($start . ',' . $end)));

        $collection = new Collection();

        if (isset($response['itensConteudo']) && is_array($response['itensConteudo'])) {
            foreach ($response['itensConteudo'] as $value) {
                $item = new ClickModel();

                $item->setId($value['itensConteudo_id_campanha'])
                     ->setTotal($value['itensConteudo_total'])
                     ->setEmail($value['itensConteudo_nm_email'])
                     ->setLink($value['itensConteudo_nm_link'])
                     ->setCidade($value['itensConteudo_nm_cidade'])
                     ->setEstado($value['itensConteudo_nm_estado'])
                     ->setPais($value['itensConteudo_pais'])
                     ->setDataClick($value['itensConteudo_dt_click'])
                     ->setException($value['exception']);

                $collection->addItem($item);
            }
        }

        return $collection;
    }
}