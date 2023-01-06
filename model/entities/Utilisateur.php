<?php
    namespace Model\Entities;

    use App\Entity;

    final class Utilisateur extends Entity{

        private $id;
        private $email;
        private $pseudonyme;
        private $password;
        private $inscription;
        private $role;
        private $banni;

        public function __construct($data){         
            $this->hydrate($data);
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

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
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of pseudonyme
         */ 
        public function getPseudonyme()
        {
                return $this->pseudonyme;
        }

        /**
         * Set the value of pseudonyme
         *
         * @return  self
         */ 
        public function setPseudonyme($pseudonyme)
        {
                $this->pseudonyme = $pseudonyme;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of inscription
         */ 
        public function getInscription()
        {
            $formattedDate = $this->inscription->format("d/m/Y");
            return $formattedDate;
        }

        /**
         * Set the value of inscription
         *
         * @return  self
         */ 
        public function setInscription($inscription)
        {
                $this->inscription = new \DateTime($inscription);

                return $this;
        }

        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }

        /**
         * Get the value of banni
         */ 
        public function getBanni()
        {
                return $this->banni;
        }

        /**
         * Set the value of banni
         *
         * @return  self
         */ 
        public function setBanni($banni)
        {
                $this->banni = $banni;

                return $this;
        }
        }
 