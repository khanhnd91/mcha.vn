<?php
/**
 * Plugin Name: Cat Light w/Links Widget
 */

add_action( 'widgets_init', 'ht_catlight_link_load_widgets' );

function ht_catlight_link_load_widgets() {
	register_widget( 'ht_catlight_link_widget' );
}

class ht_catlight_link_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function ht_catlight_link_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'ht_catlight_link_widget', 'description' => __('A widget that displays one featured post and a list of links below from a category of your choice.', 'ht_catlight_link_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'ht_catlight_link_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'ht_catlight_link_widget', __('Hot Topix: Cat Light w/Links Widget', 'ht_catlight_link_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$categories = $instance['categories'];
		$links = $instance['links'];
		$number = $instance['number'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>


					<div class="category-light">
						<?php $recent = new WP_Query(array( 'cat' => $categories, 'posts_per_page' => '1' )); while($recent->have_posts()) : $recent->the_post();?>
						<div class="cat-light-top">
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-thumb'); ?></a>
							<?php } ?>
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<span class="list-byline"><?php the_author_posts_link(); ?> | <?php the_time(get_option('date_format')); ?></span>
							<p><?php echo excerpt(30); ?></p>
							<?php if (get_comments_number()==0) { ?>
							<?php } else { ?>
								<div class="comment-bubble">
									<span class="comment-count"><?php comments_number( '0', '1', '%' ); ?></span>
								</div><!--comment-bubble-->
							<?php } ?>
						</div><!--cat-light-top-->
						<?php endwhile; ?>
						<?php if($links) { ?>
						<div class="cat-light-bottom">
							<ul>
								<?php $recent = new WP_Query(array( 'cat' => $categories, 'posts_per_page' => $number, 'offset' => '1' )); while($recent->have_posts()) : $recent->the_post();?>
								<li>
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('small-thumb'); ?></a>
									<?php } ?>
									<span class="list-byline"><?php the_author_posts_link(); ?> | <?php the_time('F j, Y'); ?></span>
									<p><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
								</li>
								<?php endwhile; ?>
							</ul>
						</div><!--cat-light-bottom-->
						<?php } ?>
					</div><!--category-light-->


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
		$instance['categories'] = $new_instance['categories'];
		$instance['links'] = strip_tags( $new_instance['links'] );
		$instance['number'] = strip_tags( $new_instance['number'] );


		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Title', 'links' => 'on', 'number' => 4);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>

		<!-- Category -->
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>">Select category:</label>
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All Categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>

		<!-- Links -->
		<p>
			<label for="<?php echo $this->get_field_id( 'links' ); ?>">Show Links?:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'links' ); ?>" name="<?php echo $this->get_field_name( 'links' ); ?>" <?php checked( (bool) $instance['links'], true ); ?> />
		</p>

		<!-- Number of posts -->
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of links to display:</label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
		</p>


	<?php
	}
}

?>