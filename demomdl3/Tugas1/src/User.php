<?php
namespace App;

require_once 'BaseEntity.php';
require_once __DIR__ . '/PersonTrait.php';


class User extends BaseEntity {
    use PersonTrait;

    private $email;

    public function __construct($name, $age, $email) {
        parent::__construct();
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function displayInfo() {
        echo "User ID: " . $this->getId() . "<br>";
        echo "Name: " . $this->getName() . "<br>";
        echo "Age: " . $this->getAge() . "<br>";
        echo "Email: " . $this->getEmail() . "<br>";
        echo "Created At: " . $this->getCreatedAt() . "<br>";
    }

    // Magic Method untuk menampilkan informasi objek saat dicetak
    public function __toString() {
        return "User [Name: " . $this->name . ", Email: " . $this->email . "]";
    }
}
?>
