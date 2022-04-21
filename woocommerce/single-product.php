<? if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?

	get_header( 'shop' );

	?><main class="col <?//= center_column_size(); ?>"><?

		bootsrapped_breadcrumb();

		?><hr class="mb-5"><?

		while ( have_posts() ) {

			the_post();
			
			wc_get_template_part( 'content', 'single-product' );

		}

	?></main><?

	get_footer( 'shop' );

?>