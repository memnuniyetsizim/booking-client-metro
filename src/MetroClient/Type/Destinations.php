<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 30/06/14
 * Time: 22:35
 */

namespace MetroClient\Type;

use MetroClient\Service\Client;
use MetroClient\Type\Error\ResponseException;

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
     * @var
     */
    protected $service_result;
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
     * @param mixed $service_result
     */
    public function setServiceResult($service_result)
    {
        $this->service_result = $service_result;
    }

    /**
     * @return mixed
     */
    public function getBeginDestinations()
    {
        $call_result = $this->client->request($this::CALL_BEGIN_METHOD);
        $this->setServiceResult($call_result);
    }

    /**
     * @TODO Not implemented on Metro Service
     * @return mixed
     */
    public function getEndDestinations()
    {
        $call_result = $this->client->request($this::CALL_END_METHOD);
        $this->setServiceResult($call_result);
    }

    /**
     * @param mixed $mock_result
     * @throws ResponseException
     */
    public function getBeginDestinationsResult($mock_result = false)
    {
        if(!$mock_result)
        {
            $this->getBeginDestinations();
        } else {
            $this->setServiceResult($mock_result);
        }


        $this->destinations = new \ArrayObject();
        $xml_result = simplexml_load_string($this->service_result->beginTerminalListResult->any);
        try {
            foreach($xml_result->NewDataSet as $table_data)
            {
                foreach($table_data as $item => $branches )
                {
                    $this->destinations->append(new DestinationsResult($branches));
                }
            }
            return $this->destinations;
        } catch (\Exception $e)
        {
            throw new ResponseException(ResponseException::EMPTY_DESTINATION_LIST);
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