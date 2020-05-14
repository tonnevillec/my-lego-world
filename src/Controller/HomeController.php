<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    protected $apiKey   = '3-KyMs-6px5-ulmdu';
    protected $base_url = 'https://brickset.com/api/v3.asmx/';

    /**
     * @var HttpClientInterface
     */
    protected $client;

    /**
     * BricksetController constructor.
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
        ]);
    }

    /**
     * @Route("/legosets", name="legosets")
     */
    public function legosets()
    {
        return $this->render('home/legosets.html.twig', [
        ]);
    }

    /**
     * @Route("/legotheque", name="legotheque")
     */
    public function legotheque()
    {
        return $this->render('user/legotheque.html.twig', [
        ]);
    }
}
