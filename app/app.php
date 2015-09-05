<?php
      // needed in intital set up
      require_once __DIR__."/../vendor/autoload.php";
      // class
      require_once __DIR__."/../src/Contact.php";

      // saves an empty array list_of_contacts
      session_start();
      if(empty($_SESSION['list_of_contacts']))
      {
        $_SESSION['list_of_contacts'] = array();
      }
      // loades a new silex app
      $app = new Silex\Application();

      // needed for twig to use it
      $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
      ));
    //renders the main page displaying all contacts in the address book
      $app->get("/", function() use ($app) {
        return $app['twig']->render('contacts.html.twig', array('contacts' => Contact::getAll()));
      });

    //renders the page to create a new contact, when new info is entered it is posted and displays
      $app->post("/contacts", function() use ($app) {
        $contact = new Contact($_POST['name'], $_POST['phone_number'], $_POST['address']);
        $contact->save();
        return $app['twig']->render('create_contact.html.twig', array('new_contact' => $contact));
      });

    //renders the page to delete contacts, this then clear the list of contacts
      $app->post("/delete_contacts", function () use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
      });
      // needed at bottom 
      return $app;
?>
