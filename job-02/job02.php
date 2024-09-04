<?php
class Category 
{
    private $id;
    private $name;
    private $description;
    private $createdAt;
    private $updatedAt;

   
    public function __construct($id, $name, $description, $createdAt, $updatedAt) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() { 
        return $this->description;
    }

    public function getCreatedAt() {    
        return $this->createdAt;    
    }

    public function getUpdatedAt() { 
        return $this->updatedAt;
    }


    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) { // Correction de 'setDescripion' à 'setDescription'
        $this->description = $description;
    }

    public function setCreatedAt($createdAt) {   
        $this->createdAt = $createdAt;
    }   

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }   
}

?>
