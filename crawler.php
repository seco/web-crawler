<?php

abstract class AbstractResource
{
	private $document;

	protected $url;

	public function prepareDocument($content)
	{
		libxml_use_internal_errors(true);
		$doc = new DOMDocument();
		$doc->loadHTML($content);
		$xpathDoc = new DOMXPath($doc);
		$this->document = $xpathDoc;
	}

	protected function getDocument()
	{
		return $this->document;
	}

	private function getItem($xpath)
	{
		$item = $this->getDocument()->query($xpath);
		if(!$item->length) {
			throw new EmptyResultError('Empty result in :' . $xpath);
		}
		return $item->item(0);
	}

	public function getUrl()
	{
		return $this->url;
	}

	protected function getBaseUrl()
	{
		$parsedUrl = parse_url($this->url);
		return sprintf('%s://%s', $parsedUrl['scheme'], $parsedUrl['host']);
	}

	protected function getNodeValue($xpath)
	{
		return $this->getItem($xpath)->textContent;
	}

	protected function getAttributeValue($xpath, $attribute)
	{
		return $this->getItem($xpath)->attributes->getNamedItem($attribute)->textContent;
	}

	public function __construct($url)
	{
		$this->url = $url;
	}
}

class VatanBilgisayarResource extends AbstractResource 
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

class Crawler
{
	private function buildCurlOptions($curlHandler)
	{
		curl_setopt_array($curlHandler, array(
	        CURLOPT_HEADER => false,
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_HTTPHEADER => array('Content-Type: text/html; charset=utf-8'),
	        CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 ' .
	        					 '(KHTML, like Gecko) Chrome/38.0.2125.122 Safari/537.36',
		));
	}

	private function sendRequest($url)
	{
		$curlHandler = curl_init($url);
		$this->buildCurlOptions($curlHandler);
		$response = curl_exec($curlHandler);
		$error = curl_error($curlHandler);
		if($error) {
			throw new ConnectionError($error);
		}
		return $response;
	}

	public function crawleResource(AbstractResource $resource)
	{
		$url = $resource->getUrl();
		$response = $this->sendRequest($url);
		$resource->prepareDocument($response);
		return $resource;
	}
}

$crawler = new Crawler();
$resource = new VatanBilgisayarResource('http://www.vatanbilgisayar.com/iphone-6-16-gb-akilli-telefon-silver.html');
$crawler->crawleResource($resource);
print_r($resource->getImageUrl());
