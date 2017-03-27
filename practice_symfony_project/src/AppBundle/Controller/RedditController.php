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

//Fetch the EntityManager from Doctrine ->getManager()
		$em = $this->getDoctrine()->getManager();
//create a new instance of the RedditPost entity that we created. An entity is a plan old PHP object class with
//specific Doctrine metadata (the annotations that we use in RedditPost.php) telling Doctrine how the db tables
//fields match up to the class properties.
		$post = new RedditPost();
//Once we new'd up the RedditPost, we can access the setTitle method we added. This sets the $title to hello . $test
		$post->setTitle('hello' . $test);
//This uses the persist method on getManager() to save (or persist) the data to the db.
		$em->persist($post);
//persist just tells Doctrine that they want to queue up the change. Flush is what you need to do to
//actually save these changes. flush is what actually changes it
		$em->flush();

//Redirct to our previous defined route
		return $this->redirectToRoute('list');
	}

	public function updateAction($id, $text)
	{
		$em = $this->getDoctrine()->getManager();

		$post = $em->getRepository('AppBundle:RedditPost')->find($id);

		if(!$post) {
			throw $this->createNotFoundException('that\'s not a record');
		}

		/** @var $post RedditPost */
		$post->setTitle('updated title ' . $text);

		$em->flush();

		return $this->redirectToRoute('list');
	}
}