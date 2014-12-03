# What is WebCrawler ?
WebCrawler is simple xpath based crawler library for PHP developers.

# How to use it ?

-  Install autoloader with composer.

```shell
	$ composer install
```

- Create your own resource to be crawle.

```php
	<?php
	namespace WebCrawler\Resource;

	class SampleResource extends AbstractResource 
								  implements ResourceInterface
	{
		public function getImageUrl()
		{
			$xpath = '//*[@class="slider"]/li[1]/a/img';
			return sprintf('%s%s', $this->getBaseUrl(), 
						   $this->getAttributeValue($xpath, 'src'));
		}

		public function getPrice()
		{
			$xpath = '//*[@id="ctl00_u14_ascUrunDetay_dtUrunD'. 
					 'etay_ctl00_lblSatisFiyat"]/text()[1]';
			return $this->getNodeValue($xpath);
		}

		public function getCurrency()
		{
			return 'TRL';
		}
	}

```

-  Use it!

```php
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

```

Output:

```
	2.349
	http://www.vatanbilgisayar.com/UPLOAD/PRODUCT/APPLE/Thumb/v2-74694-4_medium.jpg

```