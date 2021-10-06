<?php
/*Template Name: New Template
 */

get_header(); ?>
<div id="primary">
    <div id="content" role="main">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $tax = get_query_var('taxonomy');
        $args = array(
            'post_type' => 'clothes', 'paged' => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => $tax,
                    'field' => 'id',
                    'terms' => get_queried_object()->term_id,
                )
            ),
        );
        $loop = new WP_Query($args);
        ?>
        <div class="container" style="padding: 30px;">
            <?
            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $image = get_field('image', $term);
            ?>
            <h1><?= $term->name ?></h1>
            <div class="col-xs-12">
                <p><?= $term->description ?></p>
            </div>
            <div style="background:url(<?= $image['url'] ?>); background-size: cover; width:100%; height:300px; background-position:center; margin: 15px 0;">

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
            <?= paginate_links() ?>
        </div>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>