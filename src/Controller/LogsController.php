<?php

namespace App\Controller;

use App\Entity\Logs;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/logs")
 */
class LogsController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @Route("/", name="logs_list")
     */
    public function listLogs()
    {
        $repository = $this->getDoctrine()->getRepository(Logs::class);
        $items = $repository->findAll();
        return $this->json([
            'data'=>array_map(function (Logs $item){
                return $this->generateUrl("log_by_id",['log'=>$item->get()]);
            },$items)
        ]);

    }
    /**
     * @Route("/log/{id}", name="log_by_id", requirements={"id"="\d+"})
     */
    public function log_by_id($id){
        return $this->json(
            $this->getDoctrine()->getRepository(Logs::class)->find($id)
        );
    }

}