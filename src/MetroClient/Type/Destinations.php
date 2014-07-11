<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 30/06/14
 * Time: 22:35
 */

namespace MetroClient\Type;

use MetroClient\Service\Client;

/**
 * Class Destinations
 * @package MetroClient\Type
 */
class Destinations extends AbstractType {
    /**
     * @var array
     */
    private $destinations;
    /**
     * @var Client object
     */
    private $client;
    /**
     * Call method
     */
    const CALL_BEGIN_METHOD = 'beginTerminalList';
    const CALL_END_METHOD = 'endTerminalList';

    function __construct($wsdl, $credentials)
    {
        $this->client = new Client($wsdl, $credentials);
    }

    /**
     * @return mixed
     */
    public function getBeginDestinations()
    {
        $call_result = $this->client->request($this::CALL_BEGIN_METHOD);
        return $this->parseResult($call_result);
    }

    /**
     * @TODO Not implemented on Metro Service
     * @return mixed
     */
    public function getEndDestinations()
    {
        $call_result = $this->client->request($this::CALL_END_METHOD);
        return $this->parseResult($call_result);
    }

    /**
     * @param $destinations
     * @return array|void
     */
    public function parseResult($destinations)
    {
        $this->destinations = new \ArrayObject();
        $xml_result = simplexml_load_string($destinations->beginTerminalListResult->any);
        if($this->_checkResult($xml_result))
        {
            foreach($xml_result->NewDataSet->Table as $item => $branches )
            {
                $this->destinations->append(new DestinationResult($branches));
            }
            return $this->destinations;
        } else {
            return false;
        }
    }

    /**
     * @param $result
     * @return bool
     */
    private function _checkResult($result)
    {
        return count($result)?true:false;
    }
} 