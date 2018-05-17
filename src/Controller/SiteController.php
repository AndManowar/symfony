<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 17.05.18
 * Time: 8:57
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SiteController
 * @package App\Controller
 */
class SiteController extends Controller
{
    /**
     * @Route("/site", name="site_main")
     */
    public function indexAction()
    {
        echo '<pre>';
        print_r('test');
        die();
    }
}