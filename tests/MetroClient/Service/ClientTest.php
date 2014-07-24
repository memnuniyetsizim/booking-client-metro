<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 20/07/14
 * Time: 23:11
 */

namespace MetroClient\Service;

use \MetroClient\Type\Destinations;
use \MetroClient\Type\Bus;
use \MetroClient\Type\Journey;
use \MetroClient\Type\Reservation;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    const FAKE_SERVICE = 'fake://wsdl';
    public $credentials = array('username' => null, 'password' => null, 'company' => null);


    public function test_is_instance_of_destinations_result()
    {
        $destination_object = new Destinations(self::FAKE_SERVICE, $this->credentials);
        $service_result = $destination_object->getBeginDestinationsResult(self::createDummyDestinationsResponseObject());
        $this->assertGreaterThan(0, count($service_result));

        foreach ( $service_result as $destination)
        {
            $this->assertInstanceOf('\MetroClient\Type\DestinationsResult', $destination);
        }
    }

    public function test_is_instance_of_bus_result()
    {
        $bus_object = new Bus(self::FAKE_SERVICE, $this->credentials);
        $service_result = $bus_object->getBusSchemaResult(self::createDummyBusResponseObject());

        $this->assertGreaterThan(0, count($service_result));

        foreach ( $service_result as $bus_seat)
        {
            $this->assertInstanceOf('\MetroClient\Type\BusResult', $bus_seat);
        }

    }

    public function test_is_instance_of_journey_result()
    {
        $journey_object = new Journey(self::FAKE_SERVICE, $this->credentials);
        $service_result = $journey_object->getJourneyResult(self::createDummyJourneyResponseObject());

        $this->assertGreaterThan(0, count($service_result));

        foreach ( $service_result as $journey)
        {
            $this->assertInstanceOf('\MetroClient\Type\JourneyResult', $journey);
        }
    }

    public function test_is_instance_of_reservation_codes_result()
    {
        $reservation_object = new Reservation(self::FAKE_SERVICE, $this->credentials);
        $service_result = $reservation_object->getReservationCodeResult(self::createDummyGetReservationCodesResponseObject());

        $this->assertGreaterThan(0, count($service_result));

        foreach ( $service_result as $reservation_code)
        {
            $this->assertInstanceOf('\MetroClient\Type\ReservationCodeResult', $reservation_code);
        }

    }

    public function test_is_instance_of_save_seats_result()
    {
        $reservation_object = new Reservation(self::FAKE_SERVICE, $this->credentials);
        $service_result = $reservation_object->saveSeatsResult(self::createDummySaveSeatsResponseObject());

        $this->assertInstanceOf('\MetroClient\Type\ReservationSaveResult', $service_result);
        $this->assertTrue($service_result->getIsSale());
    }

    /**
     * @expectedException \MetroClient\Type\Error\ResponseException
     */
    public function test_exception_is_thrown_if_make_reservation_result_has_error_message()
    {
        $reservation_object = new Reservation(self::FAKE_SERVICE, $this->credentials);
        $service_result = $reservation_object->makeSaleResult(self::createDummyMakeSaleResponseObject());
        $this->assertInstanceOf('\MetroClient\Type\ReservationSaleResult', $service_result);
    }

    static public function createDummyDestinationsResponseObject()
    {
        return json_decode('{"beginTerminalListResult":{"schema":"<xs:schema xmlns:xs=\"http:\/\/www.w3.org\/2001\/XMLSchema\" xmlns=\"\" xmlns:msdata=\"urn:schemas-microsoft-com:xml-msdata\" xmlns:msprop=\"urn:schemas-microsoft-com:xml-msprop\" id=\"NewDataSet\"><xs:element name=\"NewDataSet\" msdata:IsDataSet=\"true\" msdata:UseCurrentLocale=\"true\"><xs:complexType><xs:choice minOccurs=\"0\" maxOccurs=\"unbounded\"><xs:element name=\"Table\" msprop:REFCursorName=\"REFCursor\"><xs:complexType><xs:sequence><xs:element name=\"BRANCHCODE\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"BRANCHNAME\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"CITY\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><\/xs:sequence><\/xs:complexType><\/xs:element><\/xs:choice><\/xs:complexType><\/xs:element><\/xs:schema>","any":"<diffgr:diffgram xmlns:diffgr=\"urn:schemas-microsoft-com:xml-diffgram-v1\" xmlns:msdata=\"urn:schemas-microsoft-com:xml-msdata\"><NewDataSet xmlns=\"\"><Table diffgr:id=\"Table1\" msdata:rowOrder=\"0\"><BRANCHCODE>ISTANBUL<\/BRANCHCODE><BRANCHNAME>ISTANBUL<\/BRANCHNAME><CITY>ISTANBUL<\/CITY><\/Table><Table diffgr:id=\"Table2\" msdata:rowOrder=\"1\"><BRANCHCODE>BAYRAMPASA<\/BRANCHCODE><BRANCHNAME>ISTANBUL (BAYRAMPASA)<\/BRANCHNAME><CITY>ISTANBUL<\/CITY><\/Table><Table diffgr:id=\"Table3\" msdata:rowOrder=\"2\"><BRANCHCODE>ALIBEYKOY TESIS<\/BRANCHCODE><BRANCHNAME>ISTANBUL (ALIBEYKOY)<\/BRANCHNAME><CITY>ISTANBUL<\/CITY><\/Table><Table diffgr:id=\"Table4\" msdata:rowOrder=\"3\"><BRANCHCODE>4.LEVENT<\/BRANCHCODE><BRANCHNAME>ISTANBUL (4.LEVENT)<\/BRANCHNAME><CITY>ISTANBUL<\/CITY><\/Table><\/NewDataSet><\/diffgr:diffgram>"}}');
    }

    static public function createDummyBusResponseObject()
    {
        return json_decode('{"getBusSchemaResult":{"models.busSeats":[{"colNum":0,"floorNum":1,"gender":"Bos","isSold":false,"rowNum":0,"seatNum":1,"seatType":"KOLTUK"},{"colNum":1,"floorNum":1,"gender":"Bos","isSold":false,"rowNum":0,"seatNum":2,"seatType":"KOLTUK"},{"colNum":3,"floorNum":1,"gender":"Erkek","isSold":true,"rowNum":0,"seatNum":3,"seatType":"KOLTUK"}]}}');
    }

    static public function createDummyJourneyResponseObject()
    {
        return json_decode('{"getJourneyListResult":{"schema":"<xs:schema xmlns:xs=\"http:\/\/www.w3.org\/2001\/XMLSchema\" xmlns=\"\" xmlns:msdata=\"urn:schemas-microsoft-com:xml-msdata\" xmlns:msprop=\"urn:schemas-microsoft-com:xml-msprop\" id=\"NewDataSet\"><xs:element name=\"NewDataSet\" msdata:IsDataSet=\"true\" msdata:UseCurrentLocale=\"true\"><xs:complexType><xs:choice minOccurs=\"0\" maxOccurs=\"unbounded\"><xs:element name=\"Table\" msprop:REFCursorName=\"REFCursor\"><xs:complexType><xs:sequence><xs:element name=\"SEFERNO\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"GUZERGAH\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"JOURNEYDSC\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"STOPHOUR\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"ENDHOUR\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"KALANKOLTUK\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"EXTRASEFER\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"BUSTYPE\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"MULTITYPE\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"SIRANO1\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"SIRANO2\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"BUSDESCRIPTION\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"LINKOK\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"FIYAT\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"BEGINID\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"ENDID\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"BEGINARAYOLID\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"ENDARAYOLID\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"BUSDESCRIPTIONID\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"INTPRICE\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"CARDPRICE\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"DISCOUNTPRICE\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><xs:element name=\"TARIH\" msprop:OraDbType=\"106\" type=\"xs:dateTime\" minOccurs=\"0\"\/><xs:element name=\"BINIS\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"INIS\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><xs:element name=\"SATILABLE\" msprop:OraDbType=\"107\" type=\"xs:decimal\" minOccurs=\"0\"\/><\/xs:sequence><\/xs:complexType><\/xs:element><\/xs:choice><\/xs:complexType><\/xs:element><\/xs:schema>","any":"<diffgr:diffgram xmlns:diffgr=\"urn:schemas-microsoft-com:xml-diffgram-v1\" xmlns:msdata=\"urn:schemas-microsoft-com:xml-msdata\"><NewDataSet xmlns=\"\"><Table diffgr:id=\"Table1\" msdata:rowOrder=\"0\"><SEFERNO>223406<\/SEFERNO><GUZERGAH>EDIRNE-ISTANBUL<\/GUZERGAH><JOURNEYDSC xml:space=\"preserve\"> <\/JOURNEYDSC><STOPHOUR>05:15<\/STOPHOUR><ENDHOUR>07:45<\/ENDHOUR><KALANKOLTUK>47<\/KALANKOLTUK><EXTRASEFER xml:space=\"preserve\"> <\/EXTRASEFER><BUSTYPE>SUIT<\/BUSTYPE><MULTITYPE>LIGTV|TV|INT<\/MULTITYPE><SIRANO1>3<\/SIRANO1><SIRANO2>6<\/SIRANO2><BUSDESCRIPTION>184,255,170<\/BUSDESCRIPTION><LINKOK>0<\/LINKOK><FIYAT>60<\/FIYAT><BEGINID>80381534<\/BEGINID><ENDID>80381536<\/ENDID><BEGINARAYOLID>11519319<\/BEGINARAYOLID><ENDARAYOLID>11519321<\/ENDARAYOLID><BUSDESCRIPTIONID>3988506<\/BUSDESCRIPTIONID><INTPRICE>30<\/INTPRICE><CARDPRICE>30<\/CARDPRICE><DISCOUNTPRICE>28.50<\/DISCOUNTPRICE><TARIH>2014-07-29T00:00:00+03:00<\/TARIH><BINIS>EDIRNE<\/BINIS><INIS>ISTANBUL<\/INIS><SATILABLE>22<\/SATILABLE><\/Table><\/NewDataSet><\/diffgr:diffgram>"}}');
    }

    static public function createDummySaveSeatsResponseObject()
    {
        return json_decode('{"saveSeatsInfoResult":true}');
    }

    static public function createDummyGetReservationCodesResponseObject()
    {
        return json_decode('{"getReservationCodesResult":{"schema":"<xs:schema xmlns:xs=\"http:\/\/www.w3.org\/2001\/XMLSchema\" xmlns=\"\" xmlns:msdata=\"urn:schemas-microsoft-com:xml-msdata\" xmlns:msprop=\"urn:schemas-microsoft-com:xml-msprop\" id=\"NewDataSet\"><xs:element name=\"NewDataSet\" msdata:IsDataSet=\"true\" msdata:UseCurrentLocale=\"true\"><xs:complexType><xs:choice minOccurs=\"0\" maxOccurs=\"unbounded\"><xs:element name=\"Table\" msprop:REFCursorName=\"REFCursor\"><xs:complexType><xs:sequence><xs:element name=\"COLUMN_VALUE\" msprop:OraDbType=\"126\" type=\"xs:string\" minOccurs=\"0\"\/><\/xs:sequence><\/xs:complexType><\/xs:element><\/xs:choice><\/xs:complexType><\/xs:element><\/xs:schema>","any":"<diffgr:diffgram xmlns:diffgr=\"urn:schemas-microsoft-com:xml-diffgram-v1\" xmlns:msdata=\"urn:schemas-microsoft-com:xml-msdata\"><NewDataSet xmlns=\"\"><Table diffgr:id=\"Table1\" msdata:rowOrder=\"0\"><COLUMN_VALUE>PCJHRP5<\/COLUMN_VALUE><\/Table><Table diffgr:id=\"Table2\" msdata:rowOrder=\"1\"><COLUMN_VALUE>PCJHRP6<\/COLUMN_VALUE><\/Table><\/NewDataSet><\/diffgr:diffgram>"}}');
    }

    static public function createDummyMakeSaleResponseObject()
    {
        return json_decode('{"soldSeatsResult":false,"errorMessage":"AUTH-58: Yetkisiz bir i\u015flem yap\u0131ld\u0131. \u00d6rn: Kredi kart\u0131n\u0131z\u0131n ait oldu\u011fu banka d\u0131\u015f\u0131nda bir bankadan taksitlendirme yap\u0131yor olabilirsiniz. Ba\u015fka bir kredi kart\u0131 ile i\u015flem yapmay\u0131 deneyiniz."}');
    }
} 