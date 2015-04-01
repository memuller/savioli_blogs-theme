<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>
		 <section id="clippings" class="galleria">
			<?php while (have_posts()) : the_post(); $clipping = new \Savioli\Clipping();?>
					<a>
						<img src="<?php echo $clipping->image ?>" data-title="<?php echo $clipping->title ?>">
					</a>
		<?php endwhile;?>
	</section>
	
	<?php  else: ?>

		<p><?php _e('Sorry, no article found', 'picolight'); ?>.</p>

<?php endif; ?>

	</div>
<?php get_footer(); ?>
