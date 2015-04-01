<?php get_header(); $i = 1; global $posts; ?>
	<section id="content">
		<?php foreach($posts as $post): setup_postdata($post); ?>
			<?php if($i % 2 != 0 && $i >= sizeof($posts)){ break; } ?>
			<article class="grid col-half <?php post_class(); ?>" id="post-<?php the_ID()?>">
				<div class="title">
					<h2>
						<a href="<?php the_permalink()?>">
							<?php echo limit(get_the_title(), 40, ''); ?>
						</a>
					</h2>
				</div>

				<summary>
					<div class="thumbnail">
						<?php the_post_thumbnail('medium') ?>
					</div>
					<div class="details">
						<span class="categories">
							<?php the_category() ?>
						</span>
						<span class="time">
							<time><?php the_date('d/m/y') ?></time>		
						</span>
						<span class="comments">
							<?php comments_number() ?>
						</span>
					</div>
					
					<?php the_excerpt() ?>
				</summary>
			</article>
			<?php $i++; ?>
		<?php endforeach; ?>
		<nav class="next">
			<a href="<?php echo home_url('posts') ?>">
				mais artigos
			</a>
		</nav>
	</section>

	<section id="youtube" class="wrapper">
		<h1>Vídeos</h1>
		<?php foreach(\Savioli\Video::all(array('only' => 4)) as $video): ?>
			<article>
				<div class="entry-media"><?php echo wp_oembed_get($video->url, array('width' => 247)); ?></div>
				<h2 class="entry-title">
					<a href="<?php echo $video->url ?>">
						<?php echo limit($video->title, 25, '') ?>
					</a>
				</h2>
				<time>
					<?php echo get_the_date('', $video->ID); ?>
				</time>
			</article>
		<?php endforeach; ?>
	
		<nav class="next">
			<a href="<?php echo \Savioli\Video::channel_url(); ?>">
				mais vídeos
			</a>
		</nav>
	</section>

	<?php $instagram_options = get_option('savioli_photo_options');?>
	<?php if ($instagram_options['enabled']): ?>	
	<section id="instagram">
		<h1>Fotos</h1>
		<div id="instafeed"></div>
		<nav class="next">
			<a href="<?php echo "http://instagram.com/".$instagram_options['user_name']; ?>">
				mais fotos
		</a>
		</nav>
	</section>
	<?php endif ?>

<?php get_footer(); ?>