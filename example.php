<?php
require('vendor/autoload.php');

use WebCrawler\Crawler;
use WebCrawler\Resource\SampleResource;

$crawler = new Crawler();
$resource = new SampleResource(
	'http://www.vatanbilgisayar.com/' .
	'iphone-6-16-gb-akilli-telefon-silver.html#genel-bakis'
);
$crawler->crawleResource($resource);

print $resource->getPrice() . PHP_EOL;
print $resource->getImageUrl() . PHP_EOL;

