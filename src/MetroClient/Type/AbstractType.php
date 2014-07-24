<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 02/07/14
 * Time: 03:11
 */

namespace MetroClient\Type;

abstract class AbstractType {

    private $client;
    private $wsdl_url;
    private $credentials = array();

    public function __construct($wsdl, $credentials){}
    public function parseResult($result){}
    private function _getParameters(){}
    private function _checkResult($result){}
}