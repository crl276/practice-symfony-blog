<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class RedditScraper
{
	/**
	* @var EntityManagerInterface
	*/
	private $em;

	public function __construct(EntityManagerInterface $em)
	{
		$this->$em = $em;
	}
}