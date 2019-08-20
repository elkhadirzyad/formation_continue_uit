<?php

namespace App\Controller;

use App\Entity\CalendarMus;
use App\Form\CalendarMusType;
use App\Repository\CalendarMusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("resp/calendar")
 */
class CalendarMusController extends AbstractController
{

     /**
     * @Route("/", name="calendar_mus", methods={"GET"})
     */
    public function calendar(): Response
    {
        return $this->render('calendar_mus/calendar.html.twig');
    }
    

    /**
     * @Route("/new", name="calendar_mus_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $calendarMus = new CalendarMus();
        $form = $this->createForm(CalendarMusType::class, $calendarMus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($calendarMus);
            $entityManager->flush();

            return $this->redirectToRoute('calendar_mus');
        }

        return $this->render('calendar_mus/new.html.twig', [
            'calendar_mus' => $calendarMus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="calendar_mus_show", methods={"GET"})
     */
    public function show(CalendarMus $calendarMus): Response
    {
        return $this->render('calendar_mus/show.html.twig', ['calendar_mus' => $calendarMus]);
    }

    /**
     * @Route("/{id}/edit", name="calendar_mus_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CalendarMus $calendarMus): Response
    {
        $form = $this->createForm(CalendarMusType::class, $calendarMus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('calendar_mus', ['id' => $calendarMus->getId()]);
        }

        return $this->render('calendar_mus/edit.html.twig', [
            'calendar_mus' => $calendarMus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="calendar_mus_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CalendarMus $calendarMus): Response
    {
        if ($this->isCsrfTokenValid('delete'.$calendarMus->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($calendarMus);
            $entityManager->flush();
        }

        return $this->redirectToRoute('calendar_mus');
    }
}
