<?php

/**
 * Template Name: Home page
 */

get_header(); ?>
<div id="primary">
    <div id="content" role="main">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $mypost = array('post_type' => 'clothes', 'paged' => $paged, 'posts_per_page' => 10);
        $loop = new WP_Query($mypost);
        ?>
        <div class="container" style="padding: 30px;">
            <?php $terms = get_terms(array(
                'taxonomy' => 'clothes-type',
                'hide_empty' => false,
            ));
            ?>
            <div class="my-3">
                <?php if (!empty($terms)) : ?>
                    <ul class="list-group list-group-horizontal">
                        <?php foreach ($terms as $term) : ?>
                            <li class="list-group-item"><a href="<?= get_term_link($term) ?>"><?= $term->name ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="row">
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" class="col-md-3">
                        <div>
                            <a href="<?= get_the_permalink() ?>">
                                <?php the_post_thumbnail('medium', ['class' => 'img-responsive']); ?>
                            </a>
                        </div>
                        <?php
                        $sex = get_field('sex', get_the_ID());
                        $color = get_field('color', get_the_ID());
                        $size = get_field('size', get_the_ID());
                        ?>
                        <br>
                        <strong><?= get_the_title() ?></strong>
                        <br>
                        <br>
                        <strong>Пол:</strong> <?= $sex['label'] ?>
                        <br>
                        <strong>Цвет:</strong> <?= $color['label'] ?>
                        <br>
                        <strong>Размер:</strong> <?= $size['label'] ?>
                    </div>

                <?php endwhile; ?>
            </div>
            <nav>
                <?= paginate_links() ?>
            </nav>
            <?php $user = wp_get_current_user(); ?>
            <?php $allowed_roles = array('editor', 'administrator'); ?>
            <?php if (array_intersect($allowed_roles, $user->roles)) :  ?>
                <form id="new_post" name="new_post" method="post">

                    <p><label for="title">Title</label><br />
                        <input type="text" id="title" value="" tabindex="1" size="20" name="title" />
                    </p>

                    <p><label for="description">Description</label><br />
                        <textarea id="description" tabindex="3" name="description" cols="50" rows="6"></textarea>
                    </p>

                    <p><?php wp_dropdown_categories('show_option_none=Category&tab_index=4&taxonomy=clothes-type&hide_empty=0&multiple=true'); ?></p>

                    <p><input type="submit" value="Publish" tabindex="6" id="submit" name="submit" /></p>

                    <input type="hidden" name="post_type" id="post_type" value="clothes" />
                    <input type="hidden" name="action" value="post" />
                    <?php wp_nonce_field('new-post'); ?>

                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>