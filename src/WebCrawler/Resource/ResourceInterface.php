<?php
namespace WebCrawler\Resource;

interface ResourceInterface
{
	public function getImageUrl();
	public function getPrice();
	public function getCurrency();
}