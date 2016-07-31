<?php include '../view/header.php'; ?>

<div id="all_wrapper" class="details_page">
    <main>

        <div id="deatil_header_wrapper">
            <header>
                <h1><?php echo $product->getCategory()->getName(); ?></h1>
            </header> 
        </div>

        <div id="product_details">
            <section>
                <h2><?php echo $product->getName(); ?></h2>
                
                <div id="image_wrapper">
                    <img src="<?php echo $product->getImagePath(); ?>" alt="<?php echo $product->getImageAltText(); ?>">
                </div>

                <div id="details_wrapper">
                    <p ><b>List Price:</b> &euro;<?php echo $product->getFormattedPrice(); ?></p>
                    <p><b>Discount:</b> <?php echo $product->getDiscountPecent(); ?>%</p>
                    <p><b>Your Price:</b> &euro;<?php echo $product->getDiscountPrice(); ?>
                         (You save &euro;<?php echo $product->getDiscountAmount(); ?>)</p>

                    <button type="button" class="btn btn-info btn-lg" id="request_btn" data-toggle="modal" data-target="#myModal">Request Product</button>
                </div>
            </section>

            <a href="../product_catalog">Back to catalog</a>

        </div>


        <!-- FOR SIMPLOICTY THIS MODAL WILL SIMULATE AN EMAIL SENT -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" ng-app="productRequest" ng-controller="productInfo">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Request of {{productFullName()|uppercase}}</h4>
                    </div>

                    <div class="modal-body">
                        <p>You have requested {{productName}}. Please enter your email so we can get in touch with you very shortly. Thanks!</p>
                        <input type="email" name="email" id="email" placeholder="Email" />
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Request Product</button>
                    </div>

                </div>

            </div>
        </div><!-- end model -->


    </main>

<div class="cl"></div>
</div>


<script type="text/javascript">
    angular.module('productRequest', []).controller('productInfo', function($scope) {
        $scope.productCode = "<?php echo $product->getCode(); ?>",
        $scope.productName = "<?php echo $product->getName(); ?>",
        $scope.productPrice = "<?php echo $product->getFormattedPrice(); ?>",
        $scope.productDiscountPercent = "<?php echo $product->getDiscountPecent(); ?>",
        $scope.productPriceDiscounted = "<?php echo $product->getDiscountAmount(); ?>",

        $scope.productFullName = function() {
            return $scope.productCode + " " + $scope.productName;
        }
    });
</script>


<?php include '../view/footer.php'; ?>