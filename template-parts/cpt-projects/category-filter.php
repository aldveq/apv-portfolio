<?php
/**
 * Template part for displaying the category filter of project custom post type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package APV_Portfolio
 */

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
						class="<?php echo get_queried_object()->name === 'projects' ? esc_attr( 'mil-current' ) : ''; ?>"
					>
						All
					</a>
				</li>
				<?php
				foreach ( $projects_taxonomy_data as $project_tax_data ) :
					?>
						<li>
							<a 
								href="<?php echo esc_url( get_category_link( $project_tax_data->term_id ) ); ?>" 
								class="<?php echo get_queried_object()->slug === $project_tax_data->slug ? esc_attr( 'mil-current' ) : ''; ?>"
							>
								<?php echo esc_html( $project_tax_data->name ); ?>
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
