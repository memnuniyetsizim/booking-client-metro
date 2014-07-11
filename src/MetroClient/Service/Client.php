<?php

/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 30/06/14
 * Time: 21:47
 */

namespace MetroClient\Service;

class Client {

    protected $wsdl = null;
    protected $credentials = array();
    protected $soap_client;
    protected $ns = 'http://schemas.datacontract.org/2004/07/busTicketService';
    protected $sub_ns = 'http://schemas.xmlsoap.org/soap/envelope/';
    protected $login_ns = 'affiliateApprover';
    protected $login_parameters = array('company', 'password', 'username');

    function __construct($wsdl, $credentials)
    {
        $this->wsdl = $wsdl;
        $this->credentials = $credentials;
    }

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

    public function request($method, $params = array())
    {
        $this->soap_client = new \SoapClient($this->wsdl);

        $auth_header = $this->setHeaderXML();
        $this->soap_client->__setSoapHeaders(array($auth_header));

        try {
            return $this->soap_client->__soapCall($method, array('parameters' => $params));
        } catch (\SoapFault $e)
        {
            throw new \Exception('SOAP Call error: '.$e->getMessage());
        }

    }
}