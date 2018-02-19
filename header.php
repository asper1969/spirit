<?php define( 'WP_USE_THEMES', false ); get_header(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo get_bloginfo('name'); ?> / <?php echo get_bloginfo('description'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="user-scalable=yes, width=1200px" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/prod/style/style.css" />
    <?php wp_head(); ?>
</head>
<body class="page <?php if(is_user_logged_in()){echo 'is-admin';}?>">
<header>
    <div class="wrapper">
        <div class="main__menu">
            <div class="container">
                <?php
                wp_nav_menu(array('menu' => 6));
                ?>
                <div class="btn btn__close">+</div>
            </div>
        </div>
        <div class="container">
            <div class="promo">
                <div class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/prod/images/logo.png" alt="">
                </div>
                <h2 class="info">
                    <?php
                    $info = get_post(62);
                    echo strip_tags($info->post_content);
                    ?>
                </h2>
            </div>
            <div class="btns">
                <div class="contacts">
                    <?php
                    $contacts = get_posts(array(
                        'category' => 5,
                        'order' => 'ASC'
                    ));
                    ?>
                    <?php foreach($contacts as $btn):?>
                        <div class="btn">
                            <?php echo $btn->post_content;?>
                        </div>
                    <?php endforeach;?>
                </div>
                <div class="btn__menu">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</header>