<?php

    class Customer
    {
        private $id;
        private $first_name;
        private $last_name;
        private $address;
        private $phone_number;
        private $auth_id;

        public function __construct($id, $first_name, $last_name, $address, $phone_number, $auth_id)
        {
            $this->id = $id;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->address = $address;
            $this->phone_number = $phone_number;
            $this->auth_id = $auth_id;
        }


        /**
     * @return mixed
     */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         * @return Customer
         */
        public function setId($id): self
        {
            $this->id = $id;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getFirst_name()
        {
            return $this->first_name;
        }

        /**
         * @param mixed $first_name
         * @return Customer
         */
        public function setFirst_name($first_name): self
        {
            $this->first_name = $first_name;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getLast_name()
        {
            return $this->last_name;
        }

        /**
         * @param mixed $last_name
         * @return Customer
         */
        public function setLast_name($last_name): self
        {
            $this->last_name = $last_name;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getAddress()
        {
            return $this->address;
        }

        /**
         * @param mixed $address
         * @return Customer
         */
        public function setAddress($address): self
        {
            $this->address = $address;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getPhone_number()
        {
            return $this->phone_number;
        }

        /**
         * @param mixed $phone_number
         * @return Customer
         */
        public function setPhone_number($phone_number): self
        {
            $this->phone_number = $phone_number;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getAuth_id()
        {
            return $this->auth_id;
        }

        /**
         * @param mixed $auth_id
         * @return Customer
         */
        public function setAuth_id($auth_id): self
        {
            $this->auth_id = $auth_id;
            return $this;
        }
    }
