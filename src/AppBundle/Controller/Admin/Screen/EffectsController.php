<?php

namespace AppBundle\Controller\Admin\Screen;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Screen\Effect\EffectsRepository;

/**
 * @Route("/admin/screen/effects")
 */
class EffectsController extends Controller
{
    /**
     * @Route("", name="admin.screen.effects")
     * @param EffectsRepository $repository
     * @return Response
     */
    public function effectsAction(EffectsRepository $repository)
    {
        return $this->render('admin/screen/effects.html.twig', [
            'effects' => $repository->getAll()
        ]);
    }

    /**
     * @Route("/activate/{effect}", name="admin.screen.effects.activate", methods={"POST"})
     * @param string $effect
     * @param Request $request
     * @param EffectsRepository $repository
     * @return Response
     */
    public function effectsActivateAction($effect, Request $request, EffectsRepository $repository)
    {
        $repository->setEffect($effect, $request->get('data', []));
        return $this->redirect($this->generateUrl('admin.screen.effects'));
    }
}
