<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GitHutController extends Controller
{

	/**
	* @Route("/githut", name="githut")
	*/
	public function githutAction(Request $request)
	{

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/codereviewvideos');

         $data = json_decode($response->getBody()->getContents(), true);

         return $this->render('githut/index.html.twig', [
            'avatar_url'  => $data['avatar_url'],
            'name'        => $data['name'],
            'login'       => $data['login'],
            'details'     => [
                'company'   => $data['company'],
                'location'  => $data['location'],
                'joined_on' => 'Joined on ' . (new \DateTime($data['created_at']))->format('d m Y'),
            ],
            'blog'        => $data['blog'],
            'social_data' => [
                "Public Repos" => $data['public_repos'],
                "Followers"    => $data['followers'],
                "Following"    => $data['following'],
            ]
        ]);

		return $this->render('githut/index.html.twig');
		
	}
}