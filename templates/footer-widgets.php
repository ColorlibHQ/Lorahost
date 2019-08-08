
    <div class="row">
		<?php
		// Footer Widget Start

		// Footer widget 1
		if( is_active_sidebar( 'footer-1' ) ) {
			echo '<div class="col-xl-3 col-sm-6 mb-4 mb-xl-0"><div class="single-footer-widget">';
			dynamic_sidebar( 'footer-1' );
			echo '</div></div>';
		}

		// Footer widget 2
		if( is_active_sidebar( 'footer-2' ) ) {
			echo '<div class="col-xl-3 col-sm-6 mb-4 mb-xl-0"><div class="single-footer-widget">';
			dynamic_sidebar( 'footer-2' );
			echo '</div></div>';
		}

		// Footer widget 3
		if( is_active_sidebar( 'footer-3' ) ) {
			echo '<div class="col-xl-3 col-sm-6 mb-4 mb-xl-0"><div class="single-footer-widget">';
			dynamic_sidebar( 'footer-3' );
			echo '</div></div>';
		}

		// Footer widget 4
		if( is_active_sidebar( 'footer-4' ) ) {
			echo '<div class="col-xl-3 col-sm-6 mb-4 mb-xl-0"><div class="single-footer-widget">';
			dynamic_sidebar( 'footer-4' );
			echo '</div></div>';
		}


		?>
    </div>
