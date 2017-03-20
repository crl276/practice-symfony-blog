<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GitHutController extends Controller
{

	/**
	* @Route("/", name="githut")
	*/
	public function githutAction(Request $request)
	{
		$templateData = [
			'avatar_url' 	=> 'https://avatars.githubusercontent.com/u/12968163?v=3',
			'name' 			=> 'Code Review Videos',
			'login' 		=> 'codereviewvideos',
			'details'		=> [
				'company'		=> 'Code Review Views',
				'location'		=> 'Preston, Lancs, UK',
				'joined_on'		=> 'Joined on Fake Date For Now',
			],
			'blog'			=> 'https://codereviewvideos.com/',
			'social_data'	=> [
				'followers'		=> 11,
				'following'		=> 23,
				'public_repos'	=> 33,
			]
		];

		return $this->render('githut/index.html.twig', templateData);

		
	}
}