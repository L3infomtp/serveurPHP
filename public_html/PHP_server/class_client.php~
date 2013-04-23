<?php

/*=======================================================================
 Nom : class_client.php                Auteur : Lucia Florent
 Date creation : 21/02/2013     Derniere mise a jour : 21/02/2013
 Projet : Poker en ligne L3 S6
 ------------------------------------------------------------------------
 Specification:
 Ce fichier contient ...
 ======================================================================*/ 

class Client{
  //informations personnelle
  private $username;
  private $password;
  private $socket;
  private $money;
  private $email;
  private $dob;
  private $gender;
  private $lname;
  private $fname;
  private $address;
  private $city;
  private $zipcode;
  private $country;

  //information relative au menu principal
  private $table_info;

  //informations relative à la table
  private $socket_table;
  private $info_joueurs;
  private $info_table;
  private $dealer;
  private $cartes;
  private $board;
  private $mise;
  private $gagnant;
  
  public function __construct($username = "",$password = "",$socket = NULL,$money = 0,$email = "", $dob = "", $gender = "", $lname = "", $fname = "", $address = "", $city = "", $zipcode = "", $country = "",$socket_table = NULL, $info_joueurs = "", $info_table = "", $dealer = ""){
    $this->username = $username;
    $this->password = $password;
    $this->money = $money;
    $this->socket = $socket;
    $this->money = $money;
    $this->email = $email;
    $this->dob = $dob;
    $this->gender = $gender;
    $this->lname = $lname;
    $this->fname = $fname;
    $this->address = $address;
    $this->city = $city;
    $this->zipcode = $zipcode;
    $this->country = $country;

    $this->socket_table = $socket_table;
    $this->info_joueurs = $info_joueurs;
    $this->info_table = $info_table;
    $this->dealer = $dealer;
  }
  public function Client($username,$password,$socket,$money,$email, $dob, $gender, $lname, $fname, $address, $city, $zipcode, $country){
    $this->username = $username;
    $this->password = $password;
    $this->socket = $socket;
    $this->money = $money;
    $this->email = $email;
    $this->dob = $dob;
    $this->gender = $gender;
    $this->lname = $lname;
    $this->fname = $fname;
    $this->address = $address;
    $this->city = $city;
    $this->zipcode = $zipcode;
    $this->country = $country;

    $this->socket_table = NULL;
    $this->info_joueurs = "";
    $this->info_table = "";
    $this->mise = "";
  }

  public function __toString(){
    return "\nUsername : ".$this->getusername()."\nPassword ".$this->getpassword()."\nSocket : ".$this->getsocket()."\nMoney : ".$this->getmoney()."\nEmail : ".$this->getemail()."\nDate de naissance : ".$this->getdob()."\nGenre : ".$this->getgender()."\nNom : ".$this->getlname()."\nPrenom : ".$this->getfname()."\nAdresse : ".$this->getaddress()."\nVille : ".$this->getcity()."\nCode postale : ".$this->getzipcode()."\nPays : ".$this->getcountry()."\nSocket table : ".$this->getsocket_table();
  }
  public function getusername(){
    return $this->username;
  }
  public function getpassword(){
    return $this->password;
  }
  public function getsocket(){
    return $this->socket;
  }
  public function getmoney(){
    return $this->money;
  }
  public function getemail(){
    return $this->email;
  }
  public function getdob(){
    return $this->dob;
  }
  public function getgender(){
    return $this->gender;
  }
  public function getlname(){
    return $this->lname;
  }
  public function getfname(){
    return $this->fname;
  }
  public function getaddress(){
    return $this->address;
  }
  public function getcity(){
    return $this->city;
  }
  public function getzipcode(){
    return $this->zipcode;
  }
  public function getcountry(){
    return $this->country;
  }
  public function getsocket_table(){
    return $this->socket_table;
  }
  public function getinfo_joueurs(){
    return $this->info_joueurs;
  }
  public function getinfo_table(){
    return $this->info_table;
  }
  public function getdealer(){
    return $this->dealer;
  }
  public function getcartes(){
    return $this->cartes;
  }
  public function getboard(){
    return $this->board;
  }
  public function getmise(){
    return $this->mise;
  }
  public function gettable_info(){
    return $this->table_info;
  }
  public function getgagnant(){
    return $this->gagnant;
  }

  public function setusername($name){
    $this->username = $name;
  }
  public function setpassword($pass){
    $this->password = $pass;
  }
  public function setsocket($sock){
    $this->socket = $sock;
  }
  public function setmoney($mon){
    $this->money = $mon;
  }  
  public function setemail($email){
    $this->email = $email;;
  }
  public function setdob($dob){
    $this->dob= $dob;
  }
  public function setgender($gender){
    $this->gender = $gender;
  }
  public function setlname($lname){
    $this->lname = $lname;
  }
  public function setfname($fname){
    $this->fname = $fname;
  }
  public function setaddress($address){
    $this->address = $address;
  }
  public function setcity($city){
    $this->city = $city;
  }
  public function setzipcode($zipcode){
    $this->zipcode = $zipcode;
  }
  public function setcountry($country){
    $this->country = $country;
  }
  public function setsocket_table($socket){
    $this->socket_table = $socket;
  }
  public function setinfo_joueurs($joueurs){
    $this->info_joueurs = $joueurs;
  }
  public function setinfo_table($table){
    $this->info_table = $table;
  }
  public function setdealer($dealer){
    $this->dealer = $dealer;
  }
  public function setcartes($cartes){
    $this->cartes = $cartes;
  }
  public function setboard($board){
    $this->board = $board;
  }
  public function setmise($mise){
    $this->mise = $mise;
  }
  public function settable_info($table){
    $this->table_info = $table;
  }
  public function setgagnant($gagnant){
    $this->gagnant = $gagnant;
  }

  public function add_info_joueurs($mess){
    $this->info_joueurs .= $mess;
  }
  public function add_carte_board($carte){
    $this->board = $this->board.$carte;
  }
  public function add_mise($mise){
    $this->mise .= $mise;
  }
  public function add_gagnant($gagnant){
    $this->gagnant .= $gagnant;
  }
}