<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RedditController extends Controller
{
	/**
	* @Route("/", name="list")
	*/
	public function listAction()
	{

//retrieve all RedditPost entities and set it equal to var $posts
		$posts = $this->getDoctrine()->getRepository('AppBundle:RedditPost')->findAll();
//Render this objject rendered with an array with the posts 
		return $this->render('/reddit/index.html.twig', [
			'posts' => $posts
		]);
	}

	/**
	* @Route("/create/{text}", name="create")
	*/
	public function createAction($test)
	{
		
	}
}