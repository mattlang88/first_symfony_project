<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{


    //Request $request

    public function numberAction(Request $request)
    {
        $number = mt_rand(0, 100);
        return $this->render('lucky/number.html.twig', array('number' => $number));
    }
}
