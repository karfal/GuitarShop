<?php 
    
    class Product {

        private $category;
        private $id;
        private $code;
        private $name;
        private $price;

        public function __construct($category, $code, $name, $price) {
            $this->category = $category; //here we have access to category class via category object passed as parameter
            $this->code = $code;
            $this->name = $name;
            $this->price = $price;
        }

        //with this function we can access Category class functions
        public function getCategory() {
            return $this->category; 
        }

        public function setCategory($value) {
            $this->category = $value;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($value) {
            $this->id = $value;
        }

        public function getCode() {
            return $this->code;
        }

        public function setCode($value) {
            $this->code = $value;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($value) {
            $this->name = $value;
        }

        public function getPrice() {
            return $this->price;
        }

        public function setPrice($value) {
            $this->price = $value;
        }

        public function getFormattedPrice() {
            $formatedPrice = number_format($this->price, 2);
            return $formatedPrice;
        }

        public function getDiscountPecent() {
            $discountPercent = 30;
            return $discountPercent;
        }

        public function getDiscountAmount() {
            $discountPercent = $this->getDiscountPecent() / 100;
            $discountAmount = $this->price * $discountPercent;
            $discountAmount_r = round($discountAmount, 2);
            $discountAmount_f = number_format($discountAmount_r, 2);

            return $discountAmount_f; 
        }

        public function getDiscountPrice() {
            $discountPrice = $this->price - $this->getDiscountAmount();
            $discountPrice_f = number_format($discountPrice, 2);
            return $discountPrice_f;
        }

        public function getImageFilename() {
            $imageFilename = $this->code . '.png';
            return $imageFilename;
        }

        public function getImagePath() {
            $imagePath = '../assets/images/products/' . $this->getImageFilename();
            return $imagePath;
        }

        public function getImageAltText() {
            $imageAlt = 'Image: ' . $this->getImageFilename();
        }

    }//end class

?>