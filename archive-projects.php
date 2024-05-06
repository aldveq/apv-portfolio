<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package APV_Portfolio
 */

get_header( 'secondary' );
?>
<div>
	<div class="mil-page">

		<div class="mil-bg-item" style="top: 3%; right: 15%; transform: rotate(-45deg)"></div>

		<div class="container">
			<div class="mil-top-banner">
				<p class="mil-upper mil-mb-30">Featured <span class="mil-accent">projects</span></p>
				<h2 class="mil-up mil-mb-30">Portfolio</h2>
				<p class="mil-left-offset">A Collection of my favorites project I’ve designed recently. <br>Feeling great while sharing here.</p>
			</div>
		</div>

		<?php
			$projects_taxonomy_data = get_terms(
				array(
					'taxonomy'   => 'projects-category',
					'hide_empty' => false,
				)
			);

			if ( is_array( $projects_taxonomy_data ) && count( $projects_taxonomy_data ) > 0 ) :
				?>
				<div class="mil-filter">
					<div class="container">
						<ul class="mil-filter-links mil-mb-30">
							<li>
								<a 
									href="<?php echo esc_url( get_post_type_archive_link( 'projects' ) ); ?>" 
									class="mil-current">All
								</a>
							</li>
							<?php
							foreach ( $projects_taxonomy_data as $project_tax_data ) :
								?>
								<li>
									<a 
										href="<?php echo esc_url( get_category_link( $project_tax_data->term_id ) ); ?>" 
										class=""><?php echo esc_html( $project_tax_data->name ); ?>
									</a>
								</li>
								<?php
							endforeach;
							?>
						</ul>
					</div>
				</div>
				<?php
			endif;
			?>

		<?php
		if ( have_posts() ) :
			?>
			<div class="container">

				<div class="mil-portfolio-grid mil-mb-30">

					<div class="grid-sizer"></div>

					<?php
						/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						$project_term_by_post = get_the_terms( get_the_ID(), 'projects-category' );
						?>
					<div class="mil-grid-item">

						<a href="<?php echo esc_url( the_permalink() ); ?>" class="mil-portfolio-item mil-square-item mil-mb-60" target="_self">
							<div class="mil-cover">
								<?php
									echo wp_get_attachment_image(
										get_post_thumbnail_id( get_the_ID() ),
										'project-featured-image',
										false,
										array( 'load' => 'lazy' )
									);
								?>
								<div class="mil-hover-link">
									<i class="fas fa-link"></i>
								</div>
							</div>
							<div class="mil-project-descr">
								<p class="mil-upper mil-accent mil-mb-15"><?php echo esc_html( $project_term_by_post[0]->name ); ?></p>
								<h4 class="mil-up"><?php echo esc_html( the_title() ); ?></h4>
							</div>
						</a>

					</div>
						<?php
					endwhile;
					?>
				</div>

				<?php
					the_posts_pagination(
						array(
							'mid_size'  => 2,
							'prev_text' => __( 'Prev', 'apv-portfolio' ),
							'next_text' => __( 'Next', 'apv-portfolio' ),
							'end_size'  => 2,
							'class'     => 'mil-pagination-panel',
						)
					);
				?>
			</div>
			<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

	</div>
</div>

<?php
get_footer( 'secondary' );
