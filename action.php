<?php
class membre {
  protected $id_membre;
  protected $pseudo;
  protected $mdp;
  protected $nom;
  protected $prenom;
  protected $email;
  protected $civilité;
  protected $ville:
  protected $code_postal;
  protected $adresse;

  public function__construct($id,$pseudo,$nom,$prenom,$email,$civilité,$ville,$code_postal,$adresse)
  {
   $this->id_membre =$id;
  $this->pseudo =$pseudo;
  $this->nom =$nom;
  $this->prenom = $prenom;
  $this->email =$email;
  $this->civilité = $civilité;
  $this->ville =$ville;
  $this->code_postal=$code_postal;
  $this->adresse =$adresse; 
  }
  public function equals(membre $membre)
  {
    return($this->getid()==$membre->getid());
  }
  public function getid(){return $this->id_membre;}
  public function getpseudo(){return $this->pseudo;}
  public function getnom(){return $this->nom;}
  public function getprenom(){return $this->prenom;}
  public function getemail(){return $this->email;}
  public function getcivilité(){return $this->civilité;}
  public function getville(){return $this->ville;}
  public function getcode_postal(){return $this->code_postal;}
  public function getadresse(){return $this->adresse;}

}

?> 