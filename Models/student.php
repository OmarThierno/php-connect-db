<?php

class Student {
  private int $id;
  private int $degree_id;
  private string $name;
  private string $surname;
  private string $dateOfBirth;
  private string $fiscal_code;
  private string $enrolment_date;
  private string $registration_number;
  private string $email;

  public function __construct(int $_id, int $_degree_id, string $_name, string $_surname) {
    $this->id = $_id;
    $this->degree_id = $_degree_id;
    $this->name = $_name;
    $this->surname = $_surname;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of degree_id
   */ 
  public function getDegree_id()
  {
    return $this->degree_id;
  }

  /**
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Get the value of surname
   */ 
  public function getSurname()
  {
    return $this->surname;
  }

  /**
   * Get the value of dateOfBirth
   */ 
  public function getDateOfBirth()
  {
    return $this->dateOfBirth;
  }

  /**
   * Set the value of dateOfBirth
   *
   * @return  self
   */ 
  public function setDateOfBirth(string $dateOfBirth)
  {
    $this->dateOfBirth = $dateOfBirth;
  }

  /**
   * Get the value of fiscal_code
   */ 
  public function getFiscal_code()
  {
    return $this->fiscal_code;
  }

  /**
   * Set the value of fiscal_code
   *
   * @return  self
   */ 
  public function setFiscal_code(string $fiscal_code)
  {
    $this->fiscal_code = $fiscal_code;
  }

  /**
   * Get the value of enrolment_date
   */ 
  public function getEnrolment_date()
  {
    return $this->enrolment_date;
  }

  /**
   * Set the value of enrolment_date
   *
   * @return  self
   */ 
  public function setEnrolment_date(string $enrolment_date)
  {
    $this->enrolment_date = $enrolment_date;
  }

  /**
   * Get the value of registration_number
   */ 
  public function getRegistration_number()
  {
    return $this->registration_number;
  }

  /**
   * Set the value of registration_number
   *
   * @return  self
   */ 
  public function setRegistration_number(string $registration_number)
  {
    $this->registration_number = $registration_number;
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
}