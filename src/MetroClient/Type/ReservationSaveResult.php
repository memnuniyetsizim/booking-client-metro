<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 03/07/14
 * Time: 10:54
 */

namespace MetroClient\Type;


/**
 * Class ReservationSaveResult
 * @package MetroClient\Type
 */
class ReservationSaveResult {
    /**
     * @var boolean
     */
    protected $is_sale;

    /**
     * @param $result
     */
    function __construct($result)
    {
        $this->setIsSale( ($result)?:false );
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

} 