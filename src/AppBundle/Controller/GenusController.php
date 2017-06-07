<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class GenusController extends Controller
{

    public function showNameAction($name)
    {
        $logger = $this->container->get('logger');
        $requeststack = $this->container->get('request_stack');

        $clientIpHash = md5($requeststack->getCurrentRequest()->getClientIp());
        $requestHeaderHash = md5($requeststack->getCurrentRequest()->headers);
        $uniqueRequestHash = $clientIpHash+$requestHeaderHash;

        $logger->addDebug("RequestId = $uniqueRequestHash; showNameAction called with parameter: $name");
        $logger->addDebug("RequestId = $uniqueRequestHash; Creating template: $name");

        $losSimpsons = [
                'father' => 'Homer',
                'mother' => 'Marge',
                'son' => 'Bart',
                'daughter_1' => 'Lisa',
                'daughter_2' => 'Maggie'];

        $variables =  array('name' => $name,
            'losSimpsons' => $losSimpsons);

        $html = $this->container->get('templating')->render(
            ':genus:show.html.twig',
            $variables);

        return new Response($html) ;
    }

    public function getNotesAction($name)
    {
        $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Aug. 20, 2015'],
        ];

        $data = ['notes' => $notes ];
        $json = json_encode($data);
        return new Response($json);
    }

}
