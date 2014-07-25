## Metro Tourism SOAP Service
======

Sample Code

```php

$destinations = new \MetroClient\Type\Destinations(string $wsdl_url, array $auth);
$destination_list = $destinations->getBeginDestinationsResult();

```