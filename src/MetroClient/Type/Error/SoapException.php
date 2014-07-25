<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 19/07/14
 * Time: 03:44
 */

namespace MetroClient\Type\Error;


class SoapException extends \Exception {
    const SERVICE_ERROR = 'There is a problem at service, please try again later.';
} 