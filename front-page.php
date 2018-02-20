<?php get_header(); ?>
<div class="products__wrapper">
    <div class="block-title">
        <?php
        $block = get_post(60);
        ?>
        <h2><?php echo $block->post_title;?></h2>
        <div class="text">
            <?php
            echo strip_tags($block->post_content);
            ?>
        </div>
    </div>
    <div class="products">
        <?php
        $products = get_posts(array(
            'order' => 'ASC',
            'post_type' => 'products'
        ));
        ?>

        <?php foreach($products as $product):?>
            <?php
            $product_images = explode(',', get_field("images", $product->ID));
            $product_image = wp_get_attachment_image($product_images[0], 'product-thumb' );
            $product_short = get_field("shortcut", $product->ID);
            ?>
            <div class="product">
                <a href="<?php echo get_permalink($product->ID);?>">
                        <span class="img">
                            <?php echo $product_image;?>
                        </span>
                    <h4 class="title"><?php echo $product_short;?></h4>
                </a>
            </div>
        <?php endforeach;?>
    </div>
    <div class="down__btn">+</div>
</div>
<div class="about__wrapper">
    <div class="container">
        <div class="block-title">
            <?php
            $block = get_post(64);
            ?>
            <h4><?php echo $block->post_title;?></h4>
            <div class="text">
                <?php
                echo $block->post_content;
                ?>
            </div>
        </div>
        <div class="menu">
            <?php
            wp_nav_menu(array('menu' => 7));
            ?>
        </div>
        <div class="info__wrapper">
            <div class="info">
                <?php
                $block = get_post(128);
                ?>
                <h4><?php echo $block->post_title;?></h4>
                <div class="text">
                    <?php
                    echo $block->post_content;
                    ?>
                </div>
            </div>
            <div class="benefits">
                <?php
                $years = get_posts(array(
                    'order' => 'ASC',
                    'category' => 3
                ));
                ?>
                <?php foreach($years as $year):?>
                    <div class="benefit">
                        <p class="title"><?php echo $year->post_title;?></p>
                        <div class="text">
                            <?php
                            echo $year->post_content;
                            ?>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();

