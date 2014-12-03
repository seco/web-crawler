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