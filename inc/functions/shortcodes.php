<?php
// Add Responsive Vimeo Video
function v_team_esface_responsive_video_shortcode( $atts ) {
    extract( shortcode_atts( array (
        	'identifier' => '',
			'collapse' => 'collapse-vid',
			'small' => '24',
			'medium' => '24',
			'large' => '24',        
    ), $atts ) );
    return '<div class="team_esface-video-container small-' . $small . ' medium-' . $medium . ' large-' . $large . ' columns ' . $collapse . '"><iframe src="//player.vimeo.com/video/' . $identifier . '?title=0&amp;byline=0&amp;portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
    <!--.team_esface-video-container-->';
}
add_shortcode ('vimeo-responsive-video', 'v_team_esface_responsive_video_shortcode' );

// Add Responsive Youtube Video
function y_team_esface_responsive_video_shortcode( $atts ) {
    extract( shortcode_atts( array (
        	'identifier' => '',
			'collapse' => 'collapse-vid',
			'small' => '24',
			'medium' => '24',
			'large' => '24',        
    ), $atts ) );
    return '<div class="team_esface-video-container small-' . $small . ' medium-' . $medium . ' large-' . $large . ' columns ' . $collapse . '"><iframe src="//www.youtube.com/embed/' . $identifier . '" height="240" width="320" allowfullscreen="" frameborder="0"></iframe></div>
    <!--.team_esface-video-container-->';
}
add_shortcode ('youtube-responsive-video', 'y_team_esface_responsive_video_shortcode' );
?>