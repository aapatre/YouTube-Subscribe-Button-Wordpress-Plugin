<?php
/**
 * Adds Youtube_Subs_Widget widget.
 */
class Youtube_Subs_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'youtubesubs_widget', // Base ID
			esc_html__( 'YouTube Subs', 'yts_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to display YouTube Subs!', 'yts_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		//Widget Content Output
		echo '<div class="g-ytsubscribe" data-channelid="'.$instance['channel_name'].'" data-layout="'.$instance['layout_style'].'" data-theme="" data-count="'.$instance['show_subs'].'"></div>';
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'YouTube Subs', 'yts_domain' );
		$channel_name = ! empty( $instance['channel_name'] ) ? $instance['channel_name'] : esc_html__( 'YouTube Subs', 'yts_domain' );
		$show_subs = ! empty( $instance['show_subs'] ) ? $instance['show_subs'] : esc_html__( 'YouTube Subs', 'yts_domain' );
		$layout_style = ! empty( $instance['layout_style'] ) ? $instance['layout_style'] : esc_html__( 'YouTube Subs', 'yts_domain' );
		?>

        <!-- TITLE -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title:', 'yts_domain' ); ?>
            </label>

		    <input
                class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                type="text"
                value="<?php echo esc_attr( $title ); ?>">
		</p>


		<!-- CHANNEL NAME/ID -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'channel_name' ) ); ?>">
                <?php esc_attr_e( 'Channel Name/ID:', 'yts_domain' ); ?>
            </label>

		    <input
                class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'channel_name' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'channel_name' ) ); ?>"
                type="text"
                value="<?php echo esc_attr( $channel_name ); ?>">
		</p>


		<!-- SHOW/HIDE SUBSCRIBERS -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'show_subs' ) ); ?>">
                <?php esc_attr_e( 'Show/Hide Subscriber Count:', 'yts_domain' ); ?>
            </label>

		    <select
                class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'show_subs' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'show_subs' ) ); ?>"
                type="text"
                value="<?php echo esc_attr( $show_subs ); ?>">

				<option value="default">Show Count</option>
				<option value="hidden">Hide Count</option>

			</select>
		</p>

		<!-- LAYOUT STYLE -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'layout_style' ) ); ?>">
                <?php esc_attr_e( 'Layout Style:', 'yts_domain' ); ?>
            </label>

		    <select
                class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'layout_style' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'layout_style' ) ); ?>"
                type="text"
                value="<?php echo esc_attr( $layout_style ); ?>">

				<!-- <option value="" disabled selected><?php //echo ($instance['layout_style']) ?></option> -->
				<option value="default">Compact</option>
				<option value="full">Full</option>

			</select>
		</p>

		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['channel_name'] = ( ! empty( $new_instance['channel_name'] ) ) ? sanitize_text_field( $new_instance['channel_name'] ) : '';
		$instance['show_subs'] = ( ! empty( $new_instance['show_subs'] ) ) ? sanitize_text_field( $new_instance['show_subs'] ) : '';
		$instance['layout_style'] = ( ! empty( $new_instance['layout_style'] ) ) ? sanitize_text_field( $new_instance['layout_style'] ) : '';

		return $instance;
	}

} // class Foo_Widget

?>
