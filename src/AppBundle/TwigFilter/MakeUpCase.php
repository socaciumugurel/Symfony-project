<?php
/**
 * Created by PhpStorm.
 * User: Mugurel
 * Date: 12/6/2016
 * Time: 3:05 PM
 */

namespace AppBundle\TwigFilter;


class MakeUpCase extends \Twig_Extension
{
    public function getFilters()
    {
        return[
            new \Twig_SimpleFilter("makeBig", array($this, 'makeBig'))
        ];
    }

    public function makeBig($str)
    {
        return strtoupper($str);
    }

}