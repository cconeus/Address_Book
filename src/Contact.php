// I still am having difficulty with routes. I took this code from the todolist we used earlier in the week and attempted to 
//adapt it, and so far it works well however I ran out of time attempting to add the other fields for phone number
//and address. 

<?php
class Contact
{
    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function getName()
    {
        return $this->name;
    }

    function save()
    {
        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_contacts'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_contacts'] = array();
    }

}
?>
