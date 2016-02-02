<?php

/**

 * Plugin Name: Facebook Widget

 */



add_action( 'widgets_init', 'ht_facebook_load_widgets' );



function ht_facebook_load_widgets() {

	register_widget( 'ht_facebook_widget' );

}



class ht_facebook_widget extends WP_Widget {



	/**

	 * Widget setup.

	 */

	function ht_facebook_widget() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'ht_facebook_widget', 'description' => __('A widget that displays a Facebook Like Box.', 'ht_facebook_widget') );



		/* Widget control settings. */

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'ht_facebook_widget' );



		/* Create the widget. */

		$this->WP_Widget( 'ht_facebook_widget', __('Hot Topix: Facebook Widget', 'ht_facebook_widget'), $widget_ops, $control_ops );

	}



	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );



		/* Our variables from the widget settings. */

		$title = apply_filters('widget_title', $instance['title'] );

		$page_url = $instance['page_url'];

		$faces = $instance['faces'];

		$stream = $instance['stream'];

		$header = $instance['header'];

		$width = $instance['width'];



		/* Before widget (defined by themes). */

		echo $before_widget;



		/* Display the widget title if one was input (before and after defined by themes). */

		if ( $title )

			echo $before_title . $title . $after_title;

		?>


<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $page_url; ?>&amp;width=<?php echo $width; ?>&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $width; ?>; height:278px;" allowTransparency="true"></iframe>

		<?php



		/* After widget (defined by themes). */

		echo $after_widget;

	}



	/**

	 * Update the widget settings.

	 */

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;



		/* Strip tags for title and name to remove HTML (important for text inputs). */

		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['page_url'] = $new_instance['page_url'];

		$instance['faces'] = $new_instance['faces'];

		$instance['stream'] = $new_instance['stream'];

		$instance['header'] = $new_instance['header'];

		$instance['width'] = $new_instance['width'];



		return $instance;

	}





	function form( $instance ) {



		/* Set up some default widget settings. */

		$defaults = array( 'title' => 'Facebook', 'width' => 300, 'height' => 260, 'faces' => 'on', 'stream' => 'off');

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>



		<!-- Widget Title: Text Input -->

		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />

		</p>



		<!-- Page url -->

		<p>

			<label for="<?php echo $this->get_field_id( 'page_url' ); ?>">Facebook Page URL:</label>

			<input id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" value="<?php echo $instance['page_url']; ?>" style="width:90%;" />

			<small>Example: http://www.facebook.com/envato</small>

		</p>



		<!-- Faces -->

		<p>

			<label for="<?php echo $this->get_field_id( 'faces' ); ?>">Show Faces:</label>

			<input type="checkbox" id="<?php echo $this->get_field_id( 'faces' ); ?>" name="<?php echo $this->get_field_name( 'faces' ); ?>" <?php checked( (bool) $instance['faces'], true ); ?> />

		</p>



		<!-- Stream -->

		<p>

			<label for="<?php echo $this->get_field_id( 'stream' ); ?>">Show Stream:</label>

			<input type="checkbox" id="<?php echo $this->get_field_id( 'stream' ); ?>" name="<?php echo $this->get_field_name( 'stream' ); ?>" <?php checked( (bool) $instance['stream'], true ); ?> />

		</p>



		<!-- Header -->

		<p>

			<label for="<?php echo $this->get_field_id( 'header' ); ?>">Show Header:</label>

			<input type="checkbox" id="<?php echo $this->get_field_id( 'header' ); ?>" name="<?php echo $this->get_field_name( 'header' ); ?>" <?php checked( (bool) $instance['header'], true ); ?> />

		</p>



		<!-- Widget width -->

		<p>

			<label for="<?php echo $this->get_field_id( 'width' ); ?>">Like Box width:</label>

			<input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" style="width:20%;" />

		</p>





	<?php

	}

}



?>