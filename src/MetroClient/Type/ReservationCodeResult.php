<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 03/07/14
 * Time: 03:31
 */

namespace MetroClient\Type;


/**
 * Class ReservationCodeResult
 * @package MetroClient\Type
 */
class ReservationCodeResult {
    /**
     * @var
     */
    protected $reservation_code;

    function __construct($code)
    {
        $this->setReservationCode( isset($code->COLUMN_VALUE)? $code->COLUMN_VALUE:null );
    }

    /**
     * @return mixed
     */
    public function getReservationCode()
    {
        return $this->reservation_code;
    }

    /**
     * @param mixed $reservation_code
     */
    public function setReservationCode($reservation_code)
    {
        $this->reservation_code = $reservation_code;
    }
} 