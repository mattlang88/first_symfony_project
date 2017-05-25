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
        $html = $this->container->get('templating')->render(':genus:show.html.twig',
            ['name' => $name,
                'father' => 'Homer',
                'mother' => 'Marge',
                'son' => 'Bart',
                'daughter' => 'Lisa',
                'daughter' => 'Maggie']);

        return new Response($html) ;
    }

}
