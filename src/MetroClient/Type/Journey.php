<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 30/06/14
 * Time: 22:36
 */

namespace MetroClient\Type;

use MetroClient\Service\Client;
use MetroClient\Type\Error\ResponseException;


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
     * @var
     */
    protected $service_result;
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
        $this->journeyDate = $journeyDate->format('Y-m-d');
    }

    public function setServiceResult($result)
    {
        $this->service_result = $result;
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
        $this->setServiceResult($call_result);
    }

    /**
     * @param mixed $mock_result
     * @throws ResponseException
     */
    public function getJourneyResult($mock_result = false)
    {
        if(!$mock_result) {
            $this->getJourneyList();
        } else {
            $this->setServiceResult($mock_result);
        }

        $this->journeys = new \ArrayObject();
        $xml_result = simplexml_load_string($this->service_result->getJourneyListResult->any);
        try
        {
            foreach($xml_result->NewDataSet as $table_data )
            {
                foreach($table_data as $item => $branches )
                {
                    $branches = json_decode(json_encode($branches, JSON_FORCE_OBJECT));
                    $this->journeys->append(new JourneyResult($branches));
                }
            }

            return $this->journeys;

        } catch (\Exception $e) {
            throw new ResponseException(ResponseException::EMPTY_RESULT);
        }
    }

    private function _checkResult($result)
    {
        return count($result)?true:false;
    }
} 