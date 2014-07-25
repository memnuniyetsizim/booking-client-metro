<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 03/07/14
 * Time: 09:31
 */

namespace MetroClient\Type;


/**
 * Class ReservationSaleResult
 * @package MetroClient\Type
 */
class ReservationSaleResult {
    /**
     * @var boolean
     */
    protected $is_sale;
    /**
     * @var
     */
    protected $error_message;

    /**
     * @param $result
     */
    function __construct($result)
    {
        $this->setIsSale( isset($result->soldSeatsResult)? $result->soldSeatsResult:null );
        $this->setErrorMessage( isset($result->errorMessage)? $result->errorMessage:null );
    }

    /**
     * @return mixed
     */
    public function getIsSale()
    {
        return $this->is_sale;
    }

    /**
     * @param $is_sale
     */
    public function setIsSale($is_sale)
    {
        $this->is_sale = $is_sale;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->error_message;
    }

    /**
     * @param mixed $error_message
     */
    public function setErrorMessage($error_message)
    {
        $this->error_message = $error_message;
    }

} 