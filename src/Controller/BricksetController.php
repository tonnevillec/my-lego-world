<?php

namespace App\Controller;

use App\Entity\LegoSets;
use App\Entity\LegoSubthemes;
use App\Entity\LegoThemes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception;

/**
 * Class BricksetController
 * @package App\Controller
 * @Route("/api")
 */
class BricksetController extends AbstractController
{

    protected $apiKey   = '3-KyMs-6px5-ulmdu';
    protected $base_url = 'https://brickset.com/api/v3.asmx/';

    /**
     * @var HttpClientInterface
     */
    protected $client;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * BricksetController constructor.
     * @param HttpClientInterface $client
     * @param EntityManagerInterface $em
     */
    public function __construct(HttpClientInterface $client, EntityManagerInterface $em)
    {
        $this->client = $client;
        $this->em = $em;
    }

    /**
     * @Route("/getThemes", name="api.getThemes")
     * @param Request $request
     * @return JsonResponse
     */
    public function getThemes(Request $request): JsonResponse
    {

//        * @throws Exception\ClientExceptionInterface
//        * @throws Exception\DecodingExceptionInterface
//        * @throws Exception\RedirectionExceptionInterface
//        * @throws Exception\ServerExceptionInterface
//        * @throws Exception\TransportExceptionInterface

//        $url = $this->base_url . 'getThemes?apiKey='.$this->apiKey;
//        $response = $this->client->request('GET', $url);
//        return $this->json($response->toArray(),200);

        /**
         * @todo : gestion des exceptions
         */

        $themes = $this->em->getRepository(LegoThemes::class)->findAll();

        return $this->json([
            'status'    => 'success',
            'matches'   => count($themes),
            'themes'    => $themes
        ],200);
    }

    /**
     * @Route("/getSubthemes", name="api.getSubthemes")
     * @param Request $request
     * @return JsonResponse
     * @throws Exception\ClientExceptionInterface
     * @throws Exception\DecodingExceptionInterface
     * @throws Exception\RedirectionExceptionInterface
     * @throws Exception\ServerExceptionInterface
     * @throws Exception\TransportExceptionInterface
     */
    public function getSubthemes(Request $request): JsonResponse
    {
        $theme = $request->request->get('theme');

        $legotheme = $this->em->getRepository(LegoThemes::class)->findOneBy(['theme' => $theme]);
        if($legotheme){
            if(!$legotheme->getIsSubthemesScrap()){
                $url = $this->base_url . 'getSubthemes?apiKey='.$this->apiKey;
                $url .= '&theme='.$theme;
                $response = $this->client->request('GET', $url);
                $tab = $response->toArray();

                /**
                 * @todo : gestion des exceptions
                 */

                foreach ($tab['subthemes'] as $k){
                    $subtheme = $this->em->getRepository(LegoSubthemes::class)->findOneBy(['theme' => $theme, 'subtheme' => $k['subtheme']]);
                    if(!$subtheme){
                        $sub = new LegoSubthemes();
                        $sub->setTheme($theme);
                        $sub->setSubtheme($k['subtheme']);
                        $sub->setYearFrom($k['yearFrom']);
                        $sub->setYearTo($k['yearTo']);
                        $this->em->persist($sub);
                        $this->em->flush();
                    }
                }

                $legotheme->setIsSubthemesScrap(true);
                $this->em->persist($legotheme);
                $this->em->flush();
            } else {
                $tab = $this->em->getRepository(LegoSubthemes::class)->findBy(['theme' => $theme]);
            }
        } else {
            $tab = [];
        }

        return $this->json([
            'status'        => 'success',
            'matches'       => count($tab),
            'subthemes'    => $tab
        ],200);
    }

    /**
     * @Route("/getSets", name="api.getSets")
     * @param Request $request
     * @return JsonResponse
     * @throws Exception\ClientExceptionInterface
     * @throws Exception\DecodingExceptionInterface
     * @throws Exception\RedirectionExceptionInterface
     * @throws Exception\ServerExceptionInterface
     * @throws Exception\TransportExceptionInterface
     */
    public function getSets(Request $request): JsonResponse
    {
        $url = $this->base_url . 'getSets?apiKey='.$this->apiKey.'&userHash=';
        $url .= '&params='.$request->request->get('params');
//        $url .= '&extendedData=1';
//      eg:  $url .= "&params={'theme':'Ninjago'}";
        $response = $this->client->request('GET', $url);

        /**
         * @todo : gestion des exceptions
         */

        $tab = $response->toArray();
        foreach($tab['sets'] as $k){
            $legosets = $this->em->getRepository(LegoSets::class)->findOneBy(['setID' => $k['setID']]);
            if(!$legosets){
                $lsets = new LegoSets();
                $lsets->setSetID($k['setID']);
                $lsets->setNumber($k['number']);
                $lsets->setNumberVariant($k['numberVariant']);
                $lsets->setName($k['name']);
                $lsets->setYear($k['year']);
                $lsets->setTheme($k['theme']);
                $lsets->setThemeGroup($k['themeGroup']);
                $lsets->setCategory($k['category']);
                $lsets->setReleased($k['released']);
                $lsets->setPieces($k['pieces']);
                $lsets->setMinifigs($k['minifigs']);
                if(array_key_exists('thumbnailURL', $k['image'])){
                    $lsets->setThumbnailURL($k['image']['thumbnailURL']);
                }
                if(array_key_exists('imageURL', $k['image'])) {
                    $lsets->setImageURL($k['image']['imageURL']);
                }
                $lsets->setRating($k['rating']);
                $lsets->setInstructionsCount($k['instructionsCount']);
                $lsets->setAdditionalImageCount($k['additionalImageCount']);
                if(array_key_exists('EAN', $k['barcode'])) {
                    $lsets->setEANCode($k['barcode']['EAN']);
                }
                $lsets->setLastUpdated($k['setID']);

                $this->em->persist($lsets);
                $this->em->flush();
            }
        }

        return $this->json($tab,200);
    }

    /**
     * @Route("/getAdditionalImages", name="api.getAdditionalImages")
     * @param Request $request
     * @return JsonResponse
     * @throws Exception\ClientExceptionInterface
     * @throws Exception\DecodingExceptionInterface
     * @throws Exception\RedirectionExceptionInterface
     * @throws Exception\ServerExceptionInterface
     * @throws Exception\TransportExceptionInterface
     */
    public function getAdditionalImages(Request $request): JsonResponse
    {
        $url = $this->base_url . 'getAdditionalImages?apiKey='.$this->apiKey;
        $url .= '&setID='.$request->request->get('setID');
        $response = $this->client->request('GET', $url);

        /**
         * @todo : gestion des exceptions
         */

        return $this->json($response->toArray(),200);
    }

//    /**
//     * @Route("/scrap", name="api.scrap")
//     * @return \Symfony\Component\HttpFoundation\Response
//     * @throws Exception\ClientExceptionInterface
//     * @throws Exception\DecodingExceptionInterface
//     * @throws Exception\RedirectionExceptionInterface
//     * @throws Exception\ServerExceptionInterface
//     * @throws Exception\TransportExceptionInterface
//     */
//    public function scrap(EntityManagerInterface $em)
//    {
//        $url = $this->base_url . 'getThemes?apiKey='.$this->apiKey;
//        $response = $this->client->request('GET', $url);
//
//        $tab = $response->toArray();
//        foreach($tab['themes'] as $k){
//            $theme = new LegoThemes();
//            $theme->setTheme($k['theme']);
//            $theme->setYearTo($k['yearTo']);
//            $theme->setYearFrom($k['yearFrom']);
//            $em->persist($theme);
//            $em->flush();
//        }
//        $themes = [
//            ''
//        ];
//
//        return $this->render('home/scrap.html.twig', [
//            'response'  => 'OK',
//            'result'    => $response->toArray()
//        ]);
//    }
}
