<?php

namespace CursoSymfony\EventosBundle\DataFixtures\ORM;

use CursoSymfony\EventosBundle\Entity\Evento;
use CursoSymfony\EventosBundle\Entity\Disertante;
use CursoSymfony\EventosBundle\Entity\Usuario;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

/**
 * DatosIniciales
 *
 * @author Alejandro Azario <alejandroazario@gmail.com>
 */
class DatosIniciales extends AbstractFixture implements FixtureInterface, ContainerAwareInterface
{

    protected $manager;
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $nombres = array('Martina', 'Adolfo', 'Agustin', 'Felipe', 'Alberto',
            'Andrés', 'Agustin', 'Ariel', 'Benjamin', 'Matias', 'Diego',
            'Carlos', 'Pablo', 'César', 'Cristian', 'Luis', 'David',
            'Diego', 'Belén', 'Eduardo', 'Antonela', 'Esteban', 'Fernando',
            'Francisco', 'Gonzalo', 'Constanza', 'Guillermo', 'Sofia', 'Pia',
            'Ignacio', 'Evangelina', 'Julieta', 'Laura', 'Iván', 'Julian',
            'Gariela', 'Emilia', 'Jorge', 'Jose', 'Juan', 'Gaspar', 'Luis',
            'Marta', 'Miguel', 'Rodrigo', 'Mateo', 'Oscar', 'Pablo', 'Pedro',
            'Josefina', 'Rafael', 'Raúl', 'Rebeca', 'Renata', 'Rubén', 'Salvador',
            'Santiago', 'Sergio', 'Susana', 'Verónica', 'Vicente', 'Víctor',
            'Victoria', 'Paula', 'Alejandro', 'Javier', 'Tomás', 'Romina',
            'Lorena', 'Gabriel', 'Juan Pablo', 'Omar', 'Julia');

        $apellidos = array('González', 'Rodríguez', 'Gómez', 'Fernández',
            'Martínez', 'Pérez', 'García', 'Sánchez', 'Romero', 'Sosa',
            'Álvarez', 'Torres', 'Ruiz', 'Ramírez', 'Flores', 'Acosta',
            'Benítez', 'Medina', 'Suárez', 'Herrera', 'Aguirre', 'Pereyra ',
            'Gutiérrez', 'Giménez', 'Molina', 'Silva', 'Castro', 'Rojas',
            'Ortíz', 'Núñez', 'Luna', 'Juárez', 'Cabrera', 'Ríos',
            'Ferreyra', 'Godoy', 'Morales', 'Domínguez', 'Moreno', 'Peralta',
            'Vega', 'Carrizo', 'Quiroga', 'Castillo', 'Ledesma', 'Muñoz',
            'Ojeda', 'Ponce', 'Vera', 'Vázquez', 'Villalba', 'Cardozo',
            'Navarro', 'Ramos', 'Arias', 'Coronel', 'Córdoba', 'Figueroa',
            'Correa', 'Cáceres', 'Vargas', 'Maldonado', 'Mansilla', 'Farías',
            'Rivero', 'Paz', 'Miranda', 'Roldán', 'Méndez', 'Lucero',
            'Cruz', 'Hernández', 'Agüero', 'Páez', 'Blanco', 'Mendoza',
            'Barrios', 'Escobar', 'Ávila', 'Soria', 'Leiva', 'Acuña',
            'Martin', 'Maidana', 'Moyano', 'Campos', 'Olivera', 'Duarte',
            'Soto', 'Franco', 'Bravo', 'Valdéz', 'Toledo', 'Andrada-Andrade',
            'Montenegro', 'Leguizamón', 'Chávez', 'Arce', 'López', 'Díaz');

        $calles = array('9 de Julio', '4 de Enero', 'San Jerónimo', '1 de Mayo',
            'Córdoba', 'Corrientes', 'Moreno', 'San Martin', 'Entre Rios',
            'San Lorenzo', 'Urquiza', 'La Rioja', 'Salta', 'Mendoza', 'Cruz Roja',
            'Suipacha', 'Mariano Comas', 'Iturraspe', 'Maipú', 'Zenteno',
            'Junin', 'Santiago del Estero', 'Rivadavia', 'Las Heras', 'Francia',
            'Alvear', 'Mitre', 'Lavalle', 'Primera Junta', 'Juan de Garay',
            'Candioti', 'Necochea', 'Gral. Paz', 'Pedro Ferre', 'Saavedra',
            'Catamarca', 'Tucumán');

        $emails = array('gmail.local', 'yahoo.local', 'msn.local',
            'hotmail.local', 'aol.local');

        // Generación de disertantes
        $disertantes = array(
            'javierLopez' => array(
                'nombre' => 'Javier',
                'apellidos' => 'López',
                'biografia' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mollis cursus lobortis. Quisque ornare aliquet nunc, ut fringilla sem molestie eget.',
                'telefono' => '342-156433443',
                'url' => 'http://www.javierlopez.local/',
                'email' => 'javier.lopez@gmail.local',
                'linkedin' => 'http://es.linkedin.local/in/javier.lopez',
                'twitter' => 'http://www.twitter.local/javier.lopez'
            ),
            'ignacioBlanco' => array(
                'nombre' => 'Ignacio',
                'apellidos' => 'Blanco',
                'biografia' => 'Aenean consequat iaculis tellus et ultrices. Aliquam erat volutpat. Nam scelerisque imperdiet iaculis. Morbi dolor orci, ornare quis tempor vitae, ultrices ac augue.',
                'telefono' => '342-154435643',
                'url' => 'http://www.ignacioblanco.local/',
                'email' => 'ignacio.blanco@hotmail.local',
                'linkedin' => 'http://es.linkedin.local/in/ignacio.blanco',
                'twitter' => 'http://www.twitter.local/ignacio.blanco'
            ),
            'marcosRojas' => array(
                'nombre' => 'Marcos',
                'apellidos' => 'Rojas',
                'biografia' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'telefono' => '342-156776654',
                'url' => 'http://www.marcosrojas.com/',
                'email' => 'marcos.rojas@yahoo.local',
                'linkedin' => 'http://es.linkedin.local/in/marcos.rojas',
                'twitter' => 'http://www.twitter.local/marcos.rojas'
            ),
            'antonelaToledo' => array(
                'nombre' => 'Antonela',
                'apellidos' => 'Toledo',
                'biografia' => 'Ras varius est ac mi aliquet consectetur. Morbi et massa vel felis malesuada placerat molestie ac est. Integer posuere, nulla et condimentum consequat, velit eros ullamcorper mi, ac pulvinar lorem magna sollicitudin libero.',
                'telefono' => '342-156456773',
                'url' => 'http://www.antonela.toledo.com/',
                'email' => 'antonela.toledo@gmail.local',
                'linkedin' => 'http://es.linkedin.local/in/antonela.toledo',
                'twitter' => 'http://www.twitter.local/antonela.toledo'
            ),
            'pabloMontenegro' => array(
                'nombre' => 'Pablo',
                'apellidos' => 'Montenegro',
                'biografia' => 'Onec blandit ligula sit amet tortor accumsan vestibulum. Nullam accumsan ipsum sit amet nunc sagittis lacinia. Morbi vitae sapien mi. Etiam non nulla gravida turpis feugiat molestie eu quis lacus.',
                'telefono' => '342-155230980',
                'url' => 'http://www.pablo.montenegro.com/',
                'email' => 'pablo.montenegro@gmail.local',
                'linkedin' => 'http://es.linkedin.local/in/pablo.montenegro',
                'twitter' => 'http://www.twitter.local/pablo.montenegro'
            ),
            'pabloMolina' => array(
                'nombre' => 'Pablo',
                'apellidos' => 'Molina',
                'biografia' => 'Aenean consequat iaculis tellus et ultrices. Aliquam erat volutpat. Nam scelerisque imperdiet iaculis. Morbi dolor orci, ornare quis tempor vitae, ultrices ac augue. In hac habitasse platea dictumst.',
                'telefono' => '0341-155455667',
                'url' => 'http://www.pablo.molina.com/',
                'email' => 'pablo.molina@yahoo.local',
                'linkedin' => 'http://es.linkedin.local/in/pablo.molina',
                'twitter' => 'http://www.twitter.local/pablo.molina'
            ),
            'alvaroTorres' => array(
                'nombre' => 'Álvaro',
                'apellidos' => 'Torres',
                'biografia' => 'Vivamus ornare congue hendrerit. Fusce accumsan gravida rutrum. Suspendisse potenti. Integer ut lorem massa. In hac habitasse platea dictumst. Donec at tellus massa. Etiam et velit arcu.',
                'telefono' => '342-156763342',
                'url' => 'http://www.alvaro.torres.com/',
                'email' => 'alvaro.torres@curso-symfony.local',
                'linkedin' => 'http://es.linkedin.local/in/alvaro.torres',
                'twitter' => 'http://www.twitter.local/alvaro.torres'
            ),
            'tomasMarques' => array(
                'nombre' => 'Tomas',
                'apellidos' => 'Marqués',
                'biografia' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec commodo fringilla dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris non risus sit amet libero vehicula pharetra.',
                'telefono' => '348-156787890',
                'url' => 'http://www.tomas.marques.com/',
                'email' => 'tomas.marques@msn.local',
                'linkedin' => 'http://es.linkedin.local/in/tomas.marques',
                'twitter' => 'http://www.twitter.local/tomas.marques'
            ),
            'julietaHerrera' => array(
                'nombre' => 'Julieta',
                'apellidos' => 'Herrera',
                'biografia' => 'Vivamus fermentum ultrices tellus, sit amet auctor erat semper ut. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras vulputate pretium nibh, vehicula dignissim lorem auctor.',
                'telefono' => '347-154322312',
                'url' => 'http://www.julieta.herrera.com/',
                'email' => 'julieta.herrera@msn.local',
                'linkedin' => 'http://es.linkedin.local/in/julieta.herrera',
                'twitter' => 'http://www.twitter.local/julieta.herrera'
            ),
            'joseantonioPaz' => array(
                'nombre' => 'Jose Antonio',
                'apellidos' => 'Paz',
                'biografia' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'telefono' => '343-156789845',
                'url' => 'http://www.joseantonio.paz.com/',
                'email' => 'joseantonio.paz@yahoo.local',
                'linkedin' => 'http://es.linkedin.local/in/joseantonio.paz',
                'twitter' => 'http://www.twitter.local/joseantonio.paz'
            ),
            'javierFernandez' => array(
                'nombre' => 'Javier',
                'apellidos' => 'Fernández',
                'biografia' => 'Curabitur non velit in risus placerat semper. Suspendisse sed quam id tortor posuere molestie. Maecenas nulla felis, varius eget congue in, condimentum sed lectus.',
                'telefono' => '341-154457811',
                'url' => 'http://www.javier.fernandez.com/',
                'email' => 'javier.fernandez@gmail.local',
                'linkedin' => 'http://es.linkedin.local/in/javier.fernandez',
                'twitter' => 'http://www.twitter.local/javier.fernandez'
            )
        );

        foreach ($disertantes as $referencia => $datosDisertante) {
            $disertante = new Disertante();

            foreach ($datosDisertante as $propiedad => $valor) {
                $disertante->{'set' . ucfirst($propiedad)}($valor);
            }
            $disertante->setDireccion($calles[rand(0, count($calles) - 1)] . ' ' . rand(100, 4000));

            $this->addReference($referencia, $disertante);


            $manager->persist($disertante);
        }

        $manager->flush();

        // Generación de usuarios
        $factory = $this->container->get('security.encoder_factory');
        foreach (range(1, 400) as $i) {
            $usuario = new Usuario();

            $usuario->setNombre($nombres[rand(0, count($nombres) - 1)]);
            $usuario->setApellidos($apellidos[rand(0, count($apellidos) - 1)]);

            $dni = substr(rand(20000000, 30000000), 0, 8);
            $usuario->setDni($dni);

            // CONFIGURAR NOTIFICACIONES AQUÍ

            $usuario->setDireccion($calles[rand(0, count($calles) - 1)] . ' ' . rand(100, 4000));
            $usuario->setTelefono('0' . rand(340, 347) . '-' . rand(4600000, 4900000));
            $usuario->setEmail('usuario' . $i . '@' . $emails[rand(0, count($emails) - 1)]);

            $password = 'usuario' . $i;
            // Descomentar para generar las contraseñas encriptadas
            //$codificador = $factory->getEncoder($usuario);
            //$password = $codificador->encodePassword($password, $usuario->getSalt());
            $usuario->setPassword($password);

            $manager->persist($usuario);
        }
        $manager->flush();

        // Generación de eventos
        $evento = new Evento();
        $evento->setTitulo('Configuración del entorno de desarrollo');
        $evento->setDescripcion('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $evento->setFecha(new \DateTime('2013-05-01'));
        $evento->setHora(new \DateTime('9:45:00'));
        $evento->setDuracion(45);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('javierFernandez'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Introducción a Symfony 2');
        $evento->setDescripcion('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $evento->setFecha(new \DateTime('2013-05-01'));
        $evento->setHora(new \DateTime('10:30:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('ignacioBlanco'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Creación y Configuración de un Proyecto Symfony 2');
        $evento->setDescripcion('Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.');
        $evento->setFecha(new \DateTime('2013-05-01'));
        $evento->setHora(new \DateTime('12:00:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('marcosRojas'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Bundles');
        $evento->setDescripcion('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $evento->setFecha(new \DateTime('2013-05-01'));
        $evento->setHora(new \DateTime('13:00:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('javierLopez'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Comprendiendo el Concepto de Ruteo');
        $evento->setDescripcion('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $evento->setFecha(new \DateTime('2013-05-01'));
        $evento->setHora(new \DateTime('15:30:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('javierFernandez'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Acceso a Base de Datos');
        $evento->setDescripcion('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $evento->setFecha(new \DateTime('2013-05-01'));
        $evento->setHora(new \DateTime('16:30:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('antonelaToledo'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Motor de Plantillas Twig');
        $evento->setDescripcion('Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $evento->setFecha(new \DateTime('2013-05-01'));
        $evento->setHora(new \DateTime('17:30:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('pabloMontenegro'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Formularios');
        $evento->setDescripcion('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $evento->setFecha(new \DateTime('2013-05-02'));
        $evento->setHora(new \DateTime('09:00:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('javierFernandez'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Optimización y Depuración de Errores');
        $evento->setDescripcion('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $evento->setFecha(new \DateTime('2013-05-02'));
        $evento->setHora(new \DateTime('10:00:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('joseantonioPaz'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Contenedor de Servicios');
        $evento->setDescripcion('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $evento->setFecha(new \DateTime('2013-05-02'));
        $evento->setHora(new \DateTime('11:30:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('ignacioBlanco'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Rendimiento en Aplicaciones Web con Symfony 2');
        $evento->setDescripcion('Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $evento->setFecha(new \DateTime('2013-05-02'));
        $evento->setHora(new \DateTime('12:30:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('tomasMarques'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Seguridad');
        $evento->setDescripcion('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $evento->setFecha(new \DateTime('2013-05-02'));
        $evento->setHora(new \DateTime('15:00:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('pabloMolina'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Desplegando la Aplicación en un Entorno de Producción');
        $evento->setDescripcion('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
        $evento->setFecha(new \DateTime('2013-05-02'));
        $evento->setHora(new \DateTime('16:00:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('alvaroTorres'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('El Controlador');
        $evento->setDescripcion('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $evento->setFecha(new \DateTime('2013-05-02'));
        $evento->setHora(new \DateTime('17:00:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('julietaHerrera'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $evento = new Evento();
        $evento->setTitulo('Nuevos Conceptos Introducidos en PHP 5.3');
        $evento->setDescripcion('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        $evento->setFecha(new \DateTime('2013-05-02'));
        $evento->setHora(new \DateTime('18:00:00'));
        $evento->setDuracion(60);
        $evento->setIdioma('es');
        $evento->setDisertante(
                $manager->merge($this->getReference('antonelaToledo'))
        );
        $evento = $this->addUsuarios($evento);

        $manager->persist($evento);

        $manager->flush();
    }

    /**
     * Añade usuarios aleatoriamente a un evento asegurándose de que no se 
     * repita un mismo usuario.
     *
     * @param $entidad Entidad a la que se añaden los usuarios
     * @param string $num Número de usuarios que se añade en cada evento
     * @return La misma entidad pero con los usuarios añadidos
     */
    private function addUsuarios($entidad, $num = null)
    {
        $usuarios = $this->manager->getRepository('CursoSymfonyEventosBundle:Usuario')->findAll();
        $total = isset($num) ? : rand(20, 80);

        $asistentes = array();

        for ($i = 0; $i < $total; $i++) {
            $asistente = $usuarios[rand(0, count($usuarios) - 1)];

            while (in_array($asistente->getId(), $asistentes)) {
                $asistente = $usuarios[rand(0, count($usuarios) - 1)];
            }
            $asistentes[] = $asistente->getId();

            $entidad->addUsuario($asistente);
        }

        return $entidad;
    }

    public function getOrder()
    {
        return 1;
    }

}
