<?php
/**
 * Plugin Name: The Contact Widget
 * Description: A widget that displays organization logo and slogan.
 * Version: 0.1
 * Author: Cam Henry
 */


add_action( 'widgets_init', 'contact_widget' );


function contact_widget() {
	register_widget( 'CONTACT_widget' );
}

class CONTACT_widget extends WP_Widget {

	function contact_widget() {
		$widget_ops = array( 'classname' => 'contactwidget', 'description' => __('A widget that displays the organization contact info', 'contact') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'contact-widget' );
		
		$this->WP_Widget( 'contact-widget', __('Contact Info Widget', 'contact'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$address = $instance['address'];
		$number = $instance['number'];
		$fax = $instance['fax'];
		$email = $instance['email'];
		$web = $instance['web'];

		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;

		//Display the name 

		
			printf('<ul>');
			printf( '<li class="address"><i class="fi-home"></i>' . $address . '</li>');
			printf( '<li class="number"><i class="fi-telephone"></i>' . $number . '</li>');
			printf( '<li class="fax"><i class="fi-foundation"></i>' . $fax . '</li>');
			printf( '<li class="email"><i class="fi-mail"></i>' . $email . '</li>');
			printf( '<li class="web"><i class="fi-web"></i>' . $web . '</li>');
			printf('</ul>');

		
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['business_name'] = strip_tags( $new_instance['business_name'] );
		$instance['address'] = strip_tags( $new_instance['address'] );
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['fax'] = strip_tags( $new_instance['fax'] );
		$instance['email'] = strip_tags( $new_instance['email'] );
		$instance['web'] = strip_tags( $new_instance['web'] );

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('Contact Info', 'contact'), 'business_name' => __('', 'contact'),'address' => __('', 'contact'),'number' => __('', 'contact'),'fax' => __('', 'contact'),'email' => __('', 'contact'),'web' => __('', 'contact'), 'show_info' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'contact'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'business_name' ); ?>"><?php _e('Organization:', 'contact'); ?></label>
			<input id="<?php echo $this->get_field_id( 'business_name' ); ?>" type="text" name="<?php echo $this->get_field_name( 'business_name' ); ?>" value="<?php echo $instance['business_name']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e('Address:', 'contact'); ?></label>
			<input id="<?php echo $this->get_field_id( 'address' ); ?>" type="email" name="<?php echo $this->get_field_name( 'address' ); ?>" value="<?php echo $instance['address']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Phone Number:', 'contact'); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" type="tel" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" style="width:100%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'fax' ); ?>"><?php _e('Fax Number:', 'contact'); ?></label>
			<input id="<?php echo $this->get_field_id( 'fax' ); ?>" type="tel" name="<?php echo $this->get_field_name( 'fax' ); ?>" value="<?php echo $instance['fax']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('Email:', 'contact'); ?></label>
			<input id="<?php echo $this->get_field_id( 'email' ); ?>" type="email" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo $instance['email']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'web' ); ?>"><?php _e('Website:', 'contact'); ?></label>
			<input id="<?php echo $this->get_field_id( 'web' ); ?>" type="url" name="<?php echo $this->get_field_name( 'web' ); ?>" value="<?php echo $instance['web']; ?>" style="width:100%;" />
		</p>
		
	<?php
	}
}

?>