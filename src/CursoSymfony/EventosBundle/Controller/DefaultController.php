<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as contraint;
//use Symfony\Component\Validator\Constraints\Length;
//use Symfony\Component\Validator\Constraints\NotBlank;
//use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use CursoSymfony\EventosBundle\Controller\AbstractBaseController;
use CursoSymfony\EventosBundle\Entity\Consulta;

class DefaultController extends Controller {

    public function indexAction() {
        //return new Response("holaaaa");
    }

    public function estaticaAction($pagina) {
        return $this->render('@CursoSymfonyEventos/Default/' . $pagina . '.html.twig');
    }

    public function portadaAction() {
        $em = $this->getDoctrine()->getManager();
        $eventos = $em->getRepository('CursoSymfonyEventosBundle:Evento')->findAll();
        $total = count($eventos);
        $n = ($total >= 8) ? 8 : ($total < 8 && $total > 0) ? $total : 0;
        $eventosCol = $eventosCol1 = $eventosCol2 = array();
        for ($i = 0; $i < $n; $i++) {
            $evento = $eventos[\rand(0, $total - 1)];
            while (in_array($evento, $eventosCol)) {
                $evento = $eventos[\rand(0, $total - 1)];
            }
            $eventosCol[] = $evento;
        }
        return $this->render('@CursoSymfonyEventos/Default/portada.html.twig', array(
                    'eventosCol1' => array_slice($eventosCol, 0, 4),
                    'eventosCol2' => array_slice($eventosCol, 4, 4)
        ));
    }

    public function consultaAction(Request $request) {
        $defaultData = array('consulta' => 'Escriba aquí su consulta ...');
        $collectionConstraints = new contraint\Collection(array(
            'nombre' => new contraint\Length(array('min' => 3)),
            'email' => new contraint\Email(array('message' => 'Dirección de email inválida')),
        ));
        $collectionConstraints->allowExtraFields = true;
        $form = $this->createFormBuilder($defaultData, array('constraints' => $collectionConstraints))
                ->add('nombre', TextType::class)
                ->add('email', EmailType::class)
                ->add('consulta', TextareaType::class)
                ->add('Enviar', SubmitType::class)
                ->getForm();
        $form->handleRequest($request);
        $consulta = new Consulta();
        $consulta->setConsulta("Escriba su consulta aquí...");
        if ($form->isValid()) {
// Se obtiene un arreglo con claves "nombre", "email" y "consulta"
// En este punto del código se podría hacer algo con esta
// información, como enviar un correo a los responsables del
// evento o guardar la consulta en la base de datos o cualquier
// otra cosa.

            $dia = date('d');
            $mes = date('m');
            $anio = date('Y');
            $fecha = new \DateTime();
            $fecha->setDate($anio, $mes, $dia);
            // Aca se hidrata el objeto con los datos del formulario  y para luego persistirlo en la base de datos


            $tarea = $form->getData();
            $em = $this->getDoctrine()->getManager();
            //dump($tarea['nombre']);die;

            $consulta->setNombre($tarea['nombre']);
            $consulta->setMail($tarea['email']);
            $consulta->setFecha($fecha);
            $consulta->setConsulta($tarea['consulta']);
            $em = $this->getDoctrine()->getManager();
            $em->persist($consulta);
            $em->flush();

            AbstractBaseController::addInfoMessage('¡Gracias por su consulta! en breve nos podremos en contacto usted.');
            return $this->redirect($this->generateUrl('portada'));
            //return new Response($data['nombre']);
        }
        return $this->render('@CursoSymfonyEventos/Default/consulta.html.twig'
                        , array('form' => $form->createView(),
        ));
    }

}
