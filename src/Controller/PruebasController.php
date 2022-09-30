<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PruebasController extends AbstractController
{
    //cremos un logger en el constructor para poderlo reutilizar
    private $logger;
    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }


    //escribimos la función y luego tenemos que definir cómo es el endpoint
    //para poder hacer la petición desde el cliente
    //ENDPOINT
    /**
     * @Route ("/get/usuarios", name="get_users")
     */


    public function getAllUsers(Request $request)
    {
        //llamará a bbdd y se traerá toda la lista de users
        //devolver una respuesta en formato json (esto lo vimos en angular)
        //por tanto tenemos obligatoriamente una response para cada request
        //$response = new Response(); //esto lleva un código de estado, si no le ponemos nada, por defecto sale 200:exito
        //$response->setContent('<div>Hola Mundo</div>');
        // Capturamos los datos que vienen en el Request
        $id = $request->get('id');
        $this->logger->alert('Mensajito');
        $response = new JsonResponse();
        //le pasamos un array que él pasará a JSON
        $response->setData([
            'success' => true,
            'data' => [
                    'id' => $id,
                    'nombre' => 'Pepe',
                    'email' => 'pepe@email.com'
            ]
        ]);
        return $response;
    }

}