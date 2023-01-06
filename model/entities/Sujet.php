<?php
    namespace Model\Entities;

    use App\Entity;

    final class Sujet extends Entity{

        private $id;
        private $titre;
        private $utilisateur;
        private $creation;
        private $ouvert;
        private $categorie;

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
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->titre;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->titre = $title;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->utilisateur;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->utilisateur = $user;

                return $this;
        }

        public function getCreationdate(){
            $formattedDate = $this->creation->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setCreationdate($date){
            $this->creation = new \DateTime($date);
            return $this;
        }

        /**
         * Get the value of open
         */ 
        public function getOpen()
        {
                return $this->ouvert;
        }

        /**
         * Set the value of open
         *
         * @return  self
         */ 
        public function setOpen($open)
        {
                $this->ouvert = $open;

                return $this;
        }

        /**
         * Get the value of category
         */
        public function getCategory(){

                return $this->categorie;
        }

        /**
         * Set the value of category
         * 
         * @return self
         */
        public function setCategory($category){

                $this->categorie = $category;
        }
    }
