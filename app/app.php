<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    session_start();

    if (empty($_SESSION['list_of_contacts'])) {
      $_SESSION['list_of_contacts'] = array();
    }


    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array (
        'twig.path' =>__DIR__.'/../views'
      ));

    $app->get("/", function() use ($app) {
      return $app['twig']->render('contacts.html.twig', array('tasks' => Contact::getAll()));

    });


    $app->post("/create_contact", function() use ($app) {
        $task = new Contact($_POST['description']);
        $task->save();
        return $app['twig']->render('create_contact.html.twig', array('newtask' => $task));

    });

    $app->post("/delete_contacts", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
    });

    return $app;
?>
