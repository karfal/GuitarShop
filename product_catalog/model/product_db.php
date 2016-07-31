<?php
    
    class ProductDB {

        public static function getProductsByCategory($categoryId) {
            $db = Database::getDb();

            $category = CategoryDB::getCategory($categoryId);

            $query = 'SELECT * FROM products
                        WHERE products.categoryID = :category_id
                        ORDER BY productID';

            $statement = $db->prepare($query);
            $statement->bindvalue(':category_id', $categoryId);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closecursor();

            $products = array();
            foreach($rows as $row) {
                $product = new Product($category, $row['productCode'], $row['productName'], $row['listPrice']);
                $product->setId($row['productID']);

                $products[] = $product;
            }
            
            return $products;
        }//end function


        public static function getProduct($productId) {
            $db = Database::getDb();

            $query = 'SELECT * FROM products
                        WHERE productID = :product_id';

            $statement = $db->prepare($query);
            $statement->bindvalue(':product_id', $productId);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();

            $category = CategoryDB::getCategory($row['categoryID']);

            $product = new Product($category, $row['productCode'], $row['productName'], $row['listPrice']);
            $product->setId($row['productID']);

            return $product;
        }//end function
        

    }//end class

?>