<?php
namespace App;

abstract class BaseEntity {
    protected $id;
    protected $createdAt;

    public function __construct() {
        $this->id = uniqid();
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function getId() {
        return $this->id;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    abstract public function displayInfo();
}
?>
