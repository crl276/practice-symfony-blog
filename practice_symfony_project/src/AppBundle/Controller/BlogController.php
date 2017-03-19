<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
	/**
	* @Route("/blog", name="blog_list", requirements={"page": "\d+"})
	*/
	public function listAction($page)
	{

	}

	/**
	* @Route("/blog/{slug}", name="blog_show")
	*/
	public function showAction($slug)
	{

	}
}