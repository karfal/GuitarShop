<?php include '../view/header.php'; ?>

<div id="all_wrapper">
    <main>

        <div id="nav_wrapper">
            <aside>
                <h2>Categories</h2>
                <nav>
                <ul>
                    <!-- display links for all categories -->            
                    <?php foreach($categories as $category) : ?>
                        <li>
                            <a href="?category_id=<?php echo $category->getID(); ?>">
                                <?php echo $category->getName(); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li><a href="../gallery.php">Gallery</a></li>
                </ul>
                </nav>
            </aside>
        </div>

        <div id="productlinks_wrapper">
            <section>
                <h2><?php echo $categoryCurrent->getName(); ?></h2>
                <nav>
                <ul>
                    <?php foreach ($products as $product) : ?>
                        <li>
                            <a href="?action=view_product&amp;product_id=<?php echo $product->getID(); ?>">
                                <?php echo $product->getName(); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                </nav>
            </section>
        </div>

    </main>

<div class="cl"></div>
</div>

<?php include '../view/footer.php'; ?>