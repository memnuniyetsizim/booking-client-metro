<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 03/07/14
 * Time: 03:24
 */

namespace MetroClient\Type;

use MetroClient\Service\Client;

/**
 * Class Reservation
 * @package MetroClient\Type
 */
class Reservation extends AbstractType
{
    /**
     * @var array
     */
    private $reservation_code_list;
    /**
     * @var Client object
     */
    private $client;

    private $journey_no;
    private $journey_date;
    private $seat_no;
    private $order_no_01;
    private $order_no_02;

    private $reservation_codes;
    private $company_code = 'METRO';
    private $customer_code;
    private $journey_path;
    private $journey_hour;
    private $stop_hour;
    private $end_hour;
    private $customer_name;
    private $customer_surname;
    private $customer_tel;
    private $customer_email;
    private $customer_gender;
    private $amount;
    private $terminal_begin_id;
    private $terminal_end_id;
    private $begin_crossroad_id;
    private $end_crossroad_id;
    private $departure_station;
    private $destination_station;
    private $departure_service;
    private $destination_service;
    private $extra_message;
    private $card_info;

    /**
     * Call methods
     */
    const CALL_CODE_METHOD = 'getReservationCodes';
    const CALL_SAVE_METHOD = 'saveSeatsInfo';
    const CALL_SOLD_METHOD = 'soldSeats';

    /**
     * @param $wsdl
     * @param $credentials
     */
    function __construct($wsdl, $credentials)
    {
        $this->client = new Client($wsdl, $credentials);
    }

    /**
     * @param mixed $journey_no
     */
    public function setJourneyNo($journey_no)
    {
        $this->journey_no = $journey_no;
    }

    /**
     * @param mixed $order_no_01
     */
    public function setOrderNo01($order_no_01)
    {
        $this->order_no_01 = $order_no_01;
    }

    /**
     * @param mixed $order_no_02
     */
    public function setOrderNo02($order_no_02)
    {
        $this->order_no_02 = $order_no_02;
    }

    /**
     * @param mixed $seat_no
     * can be array or integer
     */
    public function setSeatNo($seat_no)
    {
        $this->seat_no = $seat_no;
    }

    /**
     * @param mixed $journey_date
     */
    public function setJourneyDate(\DateTime $journey_date)
    {
        $this->journey_date = $journey_date->format('Y-m-d');
    }

    /**
     * @param mixed $begin_crossroad_id
     */
    public function setBeginCrossroadId($begin_crossroad_id)
    {
        $this->begin_crossroad_id = $begin_crossroad_id;
    }

    /**
     * @param mixed $company_code
     */
    public function setCompanyCode($company_code)
    {
        $this->company_code = $company_code;
    }

    /**
     * @param mixed $customer_code
     */
    public function setCustomerCode($customer_code)
    {
        $this->customer_code = $customer_code;
    }

    /**
     * @param mixed $customer_email
     */
    public function setCustomerEmail($customer_email)
    {
        $this->customer_email = $customer_email;
    }

    /**
     * @param mixed $customer_gender
     */
    public function setCustomerGender($customer_gender)
    {
        $this->customer_gender = $customer_gender;
    }

    /**
     * @param mixed $customer_name
     */
    public function setCustomerName($customer_name)
    {
        $this->customer_name = $customer_name;
    }

    /**
     * @param mixed $customer_surname
     */
    public function setCustomerSurname($customer_surname)
    {
        $this->customer_surname = $customer_surname;
    }

    /**
     * @param mixed $customer_tel
     */
    public function setCustomerTel($customer_tel)
    {
        $this->customer_tel = $customer_tel;
    }

    /**
     * @param mixed $departure_service
     */
    public function setDepartureService($departure_service)
    {
        $this->departure_service = $departure_service;
    }

    /**
     * @param mixed $departure_station
     */
    public function setDepartureStation($departure_station)
    {
        $this->departure_station = $departure_station;
    }

    /**
     * @param mixed $destination_service
     */
    public function setDestinationService($destination_service)
    {
        $this->destination_service = $destination_service;
    }

    /**
     * @param mixed $destination_station
     */
    public function setDestinationStation($destination_station)
    {
        $this->destination_station = $destination_station;
    }

    /**
     * @param mixed $end_crossroad_id
     */
    public function setEndCrossroadId($end_crossroad_id)
    {
        $this->end_crossroad_id = $end_crossroad_id;
    }

    /**
     * @param mixed $end_hour
     */
    public function setEndHour($end_hour)
    {
        $this->end_hour = $end_hour;
    }

    /**
     * @param mixed $extra_message
     */
    public function setExtraMessage($extra_message)
    {
        $this->extra_message = $extra_message;
    }

    /**
     * @param mixed $journey_hour
     */
    public function setJourneyHour($journey_hour)
    {
        $this->journey_hour = $journey_hour;
    }

    /**
     * @param mixed $journey_path
     */
    public function setJourneyPath($journey_path)
    {
        $this->journey_path = $journey_path;
    }

    /**
     * @param mixed $reservation_codes
     */
    public function setReservationCodes($reservation_codes)
    {
        $this->reservation_codes = $reservation_codes;
    }

    /**
     * @param mixed $stop_hour
     */
    public function setStopHour($stop_hour)
    {
        $this->stop_hour = $stop_hour;
    }

    /**
     * @param mixed $terminal_begin_id
     */
    public function setTerminalBeginId($terminal_begin_id)
    {
        $this->terminal_begin_id = $terminal_begin_id;
    }

    /**
     * @param mixed $terminal_end_id
     */
    public function setTerminalEndId($terminal_end_id)
    {
        $this->terminal_end_id = $terminal_end_id;
    }

    /**
     * @param mixed $amount
     * array('amount' => array(
     *     'amount'=> must,
     *     'discountDefId' => null,
     *     'firstAmount' => must,
     *     'seasonTicketId' => null,
     *     'usedPoint' => null,
     *     'usedSeason' => null,
     * ));
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param mixed $card_info
     * array('client_ip' => must,
     *      'holder' => must,
     *      'number' => must,
     *      'expMonth' => must,
     *      'expYear' => must,
     *      'cvv' => must,
     *      'vkn' => must,
     *      'tckn' => must,
     *      'title' => must,
     * );
     */
    public function setCardInfo($card_info)
    {
        $this->card_info = $card_info;
    }

    /**
     * @return array
     */
    private function _getReservationCodeParameters()
    {
        return array(
            'journeyNo' => $this->journey_no,
            'journeyDate' => $this->journey_date,
            'seatNo' => $this->seat_no,
            'journeySiraNo1' => $this->order_no_01,
            'journeySiraNo2' => $this->order_no_02
        );
    }

    /**
     * @return array
     */
    private function _getSaveParameters()
    {
        return array(
            'PKRESERVATIONCODE' => $this->reservation_codes,
            'COMPANYCODE' => $this->company_code,
            'CUSTOMERCODE' => $this->customer_code,
            'SEATNO' => $this->seat_no,
            'SEFERNO' => $this->journey_no,
            'SEFERNAME' => $this->journey_path,
            'SIRANO1' => $this->order_no_01,
            'SIRANO2' => $this->order_no_02,
            'SEFERDATE' => $this->journey_date,
            'SEFERHOUR' => $this->journey_hour,
            'BINISTERMINALHOUR' => $this->stop_hour,
            'INISTERMINALHOUR' => $this->end_hour,
            'CUSTOMERNAME' => $this->customer_name,
            'CUSTOMERSURNAME' => $this->customer_surname,
            'CUSTOMERTEL' => $this->customer_tel,
            'CUSTOMERMAIL' => $this->customer_email,
            'CUSTOMERGENDER' => $this->customer_gender,
            'AMOUNT' => $this->amount,
            'FKTERMINALBEGINID' => $this->terminal_begin_id,
            'FKTERMINALENDID' => $this->terminal_end_id,
            'FKSEFERARAYOLBEGINID' => $this->begin_crossroad_id,
            'FKSEFERARAYOLENDID' => $this->end_crossroad_id,
            'BINISTERMINAL' => $this->departure_station,
            'INISTERMINAL' => $this->destination_station,
            'BINISSERVIS' => $this->departure_service,
            'BINISSERVISHOUR' => $this->destination_service,
            'SALESTERMINAL' => $this->extra_message
        );
    }


    /**
     * @return array
     */
    private function _getSaleParameters()
    {
        return array(
            'amount' => $this->amount,
            'cardInfo' => $this->card_info
        );
    }

    /**
     * @return mixed
     */
    public function getReservationCode()
    {
        $this->reservation_code_list = new \ArrayObject();
        $call_result = $this->client->request($this::CALL_CODE_METHOD, $this->_getReservationCodeParameters());
        $xml_result = simplexml_load_string($call_result->getReservationCodesResult->any);

        if($this->_checkResult($xml_result->NewDataSet->Table1))
        {
            foreach($xml_result->NewDataSet->Table1 as $key => $codes)
            {
                $this->reservation_code_list->append( new ReservationCodeResult($codes) );
            }
            return $this->reservation_code_list;
        } else {
            return false;
        }
    }

    /**
     * @return array|bool
     * @throws \Exception
     */
    public function saveSeats()
    {
        $call_result = $this->client->request($this::CALL_SAVE_METHOD, $this->_getSaveParameters());
        $xml_result = $call_result->saveSeatsInfoResult;
        return new ReservationSaleResult($xml_result);
    }

    /**
     * @return array|bool
     * @throws \Exception
     */
    public function makeSale()
    {
        $call_result = $this->client->request($this::CALL_SOLD_METHOD, $this->_getSaleParameters());
        print_r($call_result);
        $xml_result = $call_result->soldSeatsResponse;
        print_r($xml_result);die();
        return new ReservationSaveResult($xml_result);
    }

    /**
     * @param $result
     * @return mixed
     */
    public function parseResult($result)
    {
        return;
    }

    /**
     * @param $result
     * @return bool
     */
    private function _checkResult($result)
    {
        return ($result)?true:false;
    }
} 