<?php
    //Class name
  class Contact
  {
    //Class properties
    private $name;
    private $phone_number;
    private $address;

    // construct
    function __construct($name, $number, $address)
    {
      $this->name = $name;
      $this->phone_number = $number;
      $this->address = $address;
    }
////////////////////////////////////////////////////////////////////////////////
/////////////////////////// getters and setters ////////////////////////////////

/////////////////////////////////get and set name //////////////////////////////
    function getName()
    {
      return $this->name;
    }
    function setName($new_name)
    {
      $this->name = $new_name;
    }
//////////////////////////////// get and set phone /////////////////////////////
    function getPhoneNumber()
    {
      return $this->phone_number;
    }
    function setPhoneNumber($new_number)
    {
      $this->phone_number = $new_number;
    }
//////////////////////////////// get and set address ///////////////////////////
    function getAddress()
    {
      return $this->address;
    }
    function setAddress($new_address)
    {
      $this->address = $new_address;
    }

// list_of_contacts is an array that new contact is saved into
    function save()
    {
      array_push($_SESSION['list_of_contacts'], $this);
    }
    static function getAll()
    {
      return $_SESSION['list_of_contacts'];
    }
//sets list_of_contacts to a blank array, this deletes all of the contents
    static function deleteAll()
    {
      $_SESSION['list_of_contacts'] = array();
    }
  }
?>
