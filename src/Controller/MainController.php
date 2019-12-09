<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Validator\Constraints\Json;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index()
    {
        $client = new Client(['base_uri' => 'https://swapi.co/api/people/']);
        $response=$client->request('GET');
        // version1
        // return $this->render('welcome.html.twig', array('name' => json_decode($response->getBody()->getContents())));

        //version2
         return new Response(json_encode($response->getBody()->getContents()));

    }
}
?>
<script>
    $(document).ready(function() {
        $.ajax({
            ajax: true,
            url: "{{ path('/main') }}"
        });
    });
</script>
