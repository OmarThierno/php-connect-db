<?php

class Department {
  private int $id;
  private string $name;
  private string $address;
  private string $phone;
  private string $email;
  private string $website;
  private string $headOfDepartment;

  public function __construct(int $_id, string $_name) {
    $this->id = $_id;
    $this->name = $_name;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Get the value of address
   */ 
  public function getAddress()
  {
    return $this->address;
  }

  /**
   * Set the value of address
   *
   * @return  self
   */ 
  public function setAddress(string $address)
  {
    $this->address = $address;
  }

  /**
   * Get the value of phone
   */ 
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * Set the value of phone
   *
   * @return  self
   */ 
  public function setPhone(string $phone)
  {
    $this->phone = $phone;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail(string $email)
  {
    $this->email = $email;
  }

  /**
   * Get the value of website
   */ 
  public function getWebsite()
  {
    return $this->website;
  }

  /**
   * Set the value of website
   *
   * @return  self
   */ 
  public function setWebsite(string $website)
  {
    if($website !== null) {
      $this->website = $website;
    } else {
      $this->website = '';
    }
  }

  /**
   * Get the value of headOfDepartment
   */ 
  public function getHeadOfDepartment()
  {
    return $this->headOfDepartment;
  }

  /**
   * Set the value of headOfDepartment
   *
   * @return  self
   */ 
  public function setHeadOfDepartment(string $headOfDepartment)
  {
    $this->headOfDepartment = $headOfDepartment;
  }
}