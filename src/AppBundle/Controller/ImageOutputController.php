<?php
/**
 * @author: Koshkin Alexey <koshkin.alexey@gmail.com>
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ImageOutputController extends Controller
{
	/**
	 * @Route("/nophoto", name="nophoto")
	 * @Route("/pictures/{image}", requirements={"image"=".+"})
	 */
	public function actionNoImage() {

		return new Response(
			file_get_contents("images/header_photo.jpg"),
			200,
			[
				'Content-type'=>'image/jpeg'
			]
		);

	}

}