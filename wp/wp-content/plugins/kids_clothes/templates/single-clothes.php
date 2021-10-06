<?php

/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
$terms = get_the_terms(get_the_ID(), 'clothes-type');
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

		<div class="row">


			<main class="site-main" id="main">
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

					<header class="entry-header">
						<?php if (!empty($terms)) : ?>
							<ul class="list-group list-group-horizontal">
								<?php foreach ($terms as $term) : ?>
									<li class="list-group-item"><a href="<?= get_term_link($term) ?>"><?= $term->name ?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

						<div class="entry-meta">


						</div><!-- .entry-meta -->

					</header><!-- .entry-header -->

					<?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>

					<div class="entry-content">

						<?php
						$sex = get_field('sex', get_the_ID());
						$color = get_field('color', get_the_ID());
						$size = get_field('size', get_the_ID());
						?>
						<br>

						<strong>Пол:</strong> <?= $sex['label'] ?>
						<br>
						<strong>Цвет:</strong> <?= $color['label'] ?>
						<br>
						<strong>Размер:</strong> <?= $size['label'] ?>
						<br>
					</div><!-- .entry-content -->

					<footer class="entry-footer">

						<?php understrap_entry_footer(); ?>

					</footer><!-- .entry-footer -->

				</article><!-- #post-## -->

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
