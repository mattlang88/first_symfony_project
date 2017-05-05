<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class LuckyController extends Controller
{

    public function smallNumberAction($max)
    {
        $number = mt_rand(0, $max);
        return new Response("$max is smaller than 10!", 200);

    }

    public function bigNumberAction($max)
    {
        $number = mt_rand(0, $max);
        return new Response("$max is bigger than 10!", 200);

    }


}
