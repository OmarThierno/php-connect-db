<?php

class StudentDetail{
  private int $id;
  private string $name;
  private string $surname;
  private string $date_of_birth;
  private string $fiscal_code;
  private string $registration_number;
  private string $email;
  private string $degree_name;
  private string $level;
  private float $average_vote;
  private int $how_many_time;

  public function __construct(int $_id, int $_degree_name, string $_name, string $_surname) {
    $this->id = $_id;
    $this->degree_name = $_degree_name;
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
   * Get the value of date_of_birth
   */ 
  public function getDate_of_birth()
  {
    return $this->date_of_birth;
  }

  /**
   * Set the value of date_of_birth
   *
   * @return  self
   */ 
  public function setDate_of_birth(string $date_of_birth)
  {
    $this->date_of_birth = $date_of_birth;

    return $this;
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

    return $this;
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

    return $this;
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

    return $this;
  }

  /**
   * Get the value of degree_name
   */ 
  public function getDegree_name()
  {
    return $this->degree_name;
  }

  /**
   * Get the value of level
   */ 
  public function getLevel()
  {
    return $this->level;
  }

  /**
   * Set the value of level
   *
   * @return  self
   */ 
  public function setLevel(string $level)
  {
    $this->level = $level;

    return $this;
  }

  /**
   * Get the value of average_vote
   */ 
  public function getAverage_vote()
  {
    return $this->average_vote;
  }

  /**
   * Set the value of average_vote
   *
   * @return  self
   */ 
  public function setAverage_vote(float $average_vote)
  {
    $this->average_vote = $average_vote;
  }

  /**
   * Get the value of how_many_time
   */ 
  public function getHow_many_time()
  {
    return $this->how_many_time;
  }

  /**
   * Set the value of how_many_time
   *
   * @return  self
   */ 
  public function setHow_many_time(int $how_many_time)
  {
    $this->how_many_time = $how_many_time;
  }
}