<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 30/06/14
 * Time: 22:36
 */

namespace MetroClient\Type;

use MetroClient\Service\Client;


/**
 * Class Journey
 * @package MetroClient\Type
 */
class Journey extends AbstractType{
    /**
     * @var array
     */
    private $journeys;
    /**
     * @var Client object
     */
    private $client;
    /**
     * @var
     */
    private $departure;
    /**
     * @var
     */
    private $destination;
    /**
     * @var
     */
    private $journeyDate;

    /**
     * Call method
     */
    const CALL_METHOD = 'getJourneyList';

    /**
     * @param $wsdl
     * @param $credentials
     */
    function __construct($wsdl, $credentials)
    {
        $this->client = new Client($wsdl, $credentials);
    }

    /**
     * @param mixed $departure
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
    }

    /**
     * @param mixed $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @param mixed $journeyDate
     */
    public function setJourneyDate(\DateTime $journeyDate)
    {
        echo $journeyDate->format('Y-m-d');
        $this->journeyDate = $journeyDate->format('Y-m-d');
    }

    private function _getParameters()
    {
        return array('departure' => $this->departure,
            'destination' => $this->destination,
            'journeyDate' => $this->journeyDate
        );
    }

    /**
     * @return mixed
     */
    public function getJourneyList()
    {
        $call_result = $this->client->request($this::CALL_METHOD, $this->_getParameters());
        return $this->parseResult($call_result);
    }

    /**
     * @param $result
     * @return mixed
     */
    public function parseResult($result)
    {
        $this->journeys = new \ArrayObject();
        $xml_result = simplexml_load_string($result->getJourneyListResult->any);
        if($this->_checkResult($xml_result))
        {
            foreach($xml_result->NewDataSet->Table as $item => $branches )
            {
                $this->journeys->append(new JourneyResult($branches));
            }
            return $this->journeys;
        } else {
            return false;
        }
    }

    private function _checkResult($result)
    {
        return count($result)?true:false;
    }
} 