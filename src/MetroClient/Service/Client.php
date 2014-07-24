<?php

/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 30/06/14
 * Time: 21:47
 */

namespace MetroClient\Service;

use MetroClient\Type\Error\SoapException;

/**
 * Class Client
 * @package MetroClient\Service
 */
class Client {

    /**
     * @var null
     */
    protected $wsdl = null;
    /**
     * @var array
     */
    protected $credentials = array();
    /**
     * @var
     */
    protected $soap_client;
    /**
     * @var string
     */
    protected $ns = 'http://schemas.datacontract.org/2004/07/busTicketService';
    /**
     * @var string
     */
    protected $sub_ns = 'http://schemas.xmlsoap.org/soap/envelope/';
    /**
     * @var string
     */
    protected $login_ns = 'affiliateApprover';
    /**
     * @var array
     */
    protected $login_parameters = array('company', 'password', 'username');

    /**
     * @param $wsdl
     * @param $credentials
     */
    function __construct($wsdl, $credentials)
    {
        $this->wsdl = $wsdl;
        $this->credentials = $credentials;
    }

    /**
     * @return \SoapHeader
     */
    private function setHeaderXML()
    {
        $xml_header_template = "<affiliateApprover xmlns=\"http://ticketservice.atlasyazilim.com.tr\">
         <company xmlns=\"$this->ns\">" . $this->credentials['company'] . "</company>
         <password xmlns=\"$this->ns\">" . $this->credentials['password'] . "</password>
         <userName xmlns=\"$this->ns\">" . $this->credentials['username'] . "</userName>
      </affiliateApprover>";

        $soap_var = new \SoapVar($xml_header_template, XSD_ANYXML, null, null, null);
        return new \SoapHeader($this->sub_ns, $this->login_ns, $soap_var);
    }

    /**
     * @param $method
     * @param array $params
     * @throws SoapException
     */
    public function request($method, $params = array())
    {
        $this->soap_client = new \SoapClient($this->wsdl, array('trace'=>1));

        $auth_header = $this->setHeaderXML();
        $this->soap_client->__setSoapHeaders(array($auth_header));
        try {
            $a = $this->soap_client->__soapCall($method, array('parameters' => $params));
            file_put_contents('/var/www/mock.xml',$this->soap_client->__getLastResponse(), FILE_APPEND);
            return $a;
        } catch (\Exception $e)
        {
            throw new SoapException(SoapException::SERVICE_ERROR);
        }

    }
}