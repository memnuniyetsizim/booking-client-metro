<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 19/07/14
 * Time: 03:47
 */

namespace MetroClient\Type\Error;


class ResponseException extends \Exception {
    const EMPTY_DESTINATION_LIST = 'No destination';
    const EMPTY_RESULT = 'Empty response';
    const GET_RESERVATION_CODE_ERROR = 'Can not get reservation codes';
    const SAVE_SEAT_ERROR = 'Seats can not be saved';
    const SAVE_RESERVATION_ERROR = 'Reservation can not be saved';
    const SALE_ERROR = 'Sale error';
    const SCHEME_ERROR = 'Can not get bus scheme';
} 