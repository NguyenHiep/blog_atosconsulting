/*------------------------------------------------------------------------*/
/*  Section: Order & Styling
/*------------------------------------------------------------------------*/
$wp_customize->add_section( 'onepress_order_styling' ,
array(
'priority'        => 129,
'title'           => esc_html__( 'Section Order & Styling', 'onepress' ),
'description'     => '',
'active_callback' => 'onepress_showon_frontpage'
)
);
// Plus message
$wp_customize->add_setting( 'onepress_order_styling_message',
array(
'sanitize_callback' => 'onepress_sanitize_text',
)
);
$wp_customize->add_control( new OnePress_Misc_Control( $wp_customize, 'onepress_order_styling_message',
array(
'section'     => 'onepress_news_settings',
'type'        => 'custom_message',
'section'     => 'onepress_order_styling',
'description' => wp_kses_post( '', 'onepress' )
)
));


/*------------------------------------------------------------------------*/
/*  Section: Hero
/*------------------------------------------------------------------------*/

$wp_customize->add_panel( 'onepress_hero_panel' ,
array(
'priority'        => 130,
'title'           => esc_html__( 'Section: Hero', 'onepress' ),
'description'     => '',
'active_callback' => 'onepress_showon_frontpage'
)
);

// Hero settings
$wp_customize->add_section( 'onepress_hero_settings' ,
array(
'priority'    => 3,
'title'       => esc_html__( 'Hero Settings', 'onepress' ),
'description' => '',
'panel'       => 'onepress_hero_panel',
)
);

// Show section
$wp_customize->add_setting( 'onepress_hero_disable',
array(
'sanitize_callback' => 'onepress_sanitize_checkbox',
'default'           => '',
)
);
$wp_customize->add_control( 'onepress_hero_disable',
array(
'type'        => 'checkbox',
'label'       => esc_html__('Hide this section?', 'onepress'),
'section'     => 'onepress_hero_settings',
'description' => esc_html__('Check this box to hide this section.', 'onepress'),
)
);
// Section ID
$wp_customize->add_setting( 'onepress_hero_id',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => esc_html__('hero', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_hero_id',
array(
'label' 		=> esc_html__('Section ID:', 'onepress'),
'section' 		=> 'onepress_hero_settings',
'description'   => esc_html__( 'The section id, we will use this for link anchor.', 'onepress' )
)
);

// Show hero full screen
$wp_customize->add_setting( 'onepress_hero_fullscreen',
array(
'sanitize_callback' => 'onepress_sanitize_checkbox',
'default'           => '',
)
);
$wp_customize->add_control( 'onepress_hero_fullscreen',
array(
'type'        => 'checkbox',
'label'       => esc_html__('Make hero section full screen', 'onepress'),
'section'     => 'onepress_hero_settings',
'description' => esc_html__('Check this box to make hero section full screen.', 'onepress'),
)
);

// Hero content padding top
$wp_customize->add_setting( 'onepress_hero_pdtop',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => esc_html__('10', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_hero_pdtop',
array(
'label'           => esc_html__('Padding Top:', 'onepress'),
'section'         => 'onepress_hero_settings',
'description'     => esc_html__( 'The hero content padding top in percent (%).', 'onepress' ),
'active_callback' => 'onepress_hero_fullscreen_callback'
)
);

// Hero content padding bottom
$wp_customize->add_setting( 'onepress_hero_pdbotom',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => esc_html__('10', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_hero_pdbotom',
array(
'label'           => esc_html__('Padding Bottom:', 'onepress'),
'section'         => 'onepress_hero_settings',
'description'     => esc_html__( 'The hero content padding bottom in percent (%).', 'onepress' ),
'active_callback' => 'onepress_hero_fullscreen_callback'
)
);


/* Hero options
----------------------------------------------------------------------*/

$wp_customize->add_setting(
'onepress_hero_option_animation',
array(
'default'              => 'flipInX',
'sanitize_callback'    => 'sanitize_text_field',
)
);

/**
* @see https://github.com/daneden/animate.css
*/

$animations_css = 'bounce flash pulse rubberBand shake headShake swing tada wobble jello bounceIn bounceInDown bounceInLeft bounceInRight bounceInUp bounceOut bounceOutDown bounceOutLeft bounceOutRight bounceOutUp fadeIn fadeInDown fadeInDownBig fadeInLeft fadeInLeftBig fadeInRight fadeInRightBig fadeInUp fadeInUpBig fadeOut fadeOutDown fadeOutDownBig fadeOutLeft fadeOutLeftBig fadeOutRight fadeOutRightBig fadeOutUp fadeOutUpBig flipInX flipInY flipOutX flipOutY lightSpeedIn lightSpeedOut rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight hinge rollIn rollOut zoomIn zoomInDown zoomInLeft zoomInRight zoomInUp zoomOut zoomOutDown zoomOutLeft zoomOutRight zoomOutUp slideInDown slideInLeft slideInRight slideInUp slideOutDown slideOutLeft slideOutRight slideOutUp';

$animations_css = explode( ' ', $animations_css );
$animations = array();
foreach ( $animations_css as $v ) {
$v =  trim( $v );
if ( $v ){
$animations[ $v ]= $v;
}

}

$wp_customize->add_control(
'onepress_hero_option_animation',
array(
'label'    => __( 'Text animation', 'onepress' ),
'section'  => 'onepress_hero_settings',
'type'     => 'select',
'choices' => $animations,
)
);


$wp_customize->add_setting(
'onepress_hero_option_speed',
array(
'default'              => '5000',
'sanitize_callback'    => 'sanitize_text_field',
)
);

$wp_customize->add_control(
'onepress_hero_option_speed',
array(
'label'    => __( 'Text animation speed', 'onepress' ),
'description' => esc_html__( 'The delay between the changing of each phrase in milliseconds.', 'onepress' ),
'section'  => 'onepress_hero_settings',
)
);


$wp_customize->add_setting(
'onepress_hero_slider_fade',
array(
'default'              => '750',
'sanitize_callback'    => 'sanitize_text_field',
)
);

$wp_customize->add_control(
'onepress_hero_slider_fade',
array(
'label'    => __( 'Slider animation speed', 'onepress' ),
'description' => esc_html__( 'This is the speed at which the image will fade in. Integers in milliseconds are accepted.', 'onepress' ),
'section'  => 'onepress_hero_settings',
)
);

$wp_customize->add_setting(
'onepress_hero_slider_duration',
array(
'default'              => '5000',
'sanitize_callback'    => 'sanitize_text_field',
)
);

$wp_customize->add_control(
'onepress_hero_slider_duration',
array(
'label'    => __( 'Slider duration speed', 'onepress' ),
'description' => esc_html__( 'The amount of time in between slides, expressed as the number of milliseconds.', 'onepress' ),
'section'  => 'onepress_hero_settings',
)
);



$wp_customize->add_section( 'onepress_hero_images' ,
array(
'priority'    => 6,
'title'       => esc_html__( 'Hero Background Media', 'onepress' ),
'description' => '',
'panel'       => 'onepress_hero_panel',
)
);

$wp_customize->add_setting(
'onepress_hero_images',
array(
'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
'transport' => 'refresh', // refresh or postMessage
'default' => json_encode( array(
array(
'image'=> array(
'url' => get_template_directory_uri().'/assets/images/hero5.jpg',
'id' => ''
)
)
) )
) );

$wp_customize->add_control(
new Onepress_Customize_Repeatable_Control(
$wp_customize,
'onepress_hero_images',
array(
'label'     => esc_html__('Background Images', 'onepress'),
'description'   => '',
'priority'     => 40,
'section'       => 'onepress_hero_images',
'title_format'  => esc_html__( 'Background', 'onepress'), // [live_title]
'max_item'      => 2, // Maximum item can add

'fields'    => array(
'image' => array(
'title' => esc_html__('Background Image', 'onepress'),
'type'  =>'media',
'default' => array(
'url' => get_template_directory_uri().'/assets/images/hero5.jpg',
'id' => ''
)
),

),

)
)
);

// Overlay color
$wp_customize->add_setting( 'onepress_hero_overlay_color',
array(
'sanitize_callback' => 'onepress_sanitize_color_alpha',
'default'           => 'rgba(0,0,0,.3)',
'transport' => 'refresh', // refresh or postMessage
)
);
$wp_customize->add_control( new OnePress_Alpha_Color_Control(
$wp_customize,
'onepress_hero_overlay_color',
array(
'label' 		=> esc_html__('Background Overlay Color', 'onepress'),
'section' 		=> 'onepress_hero_images',
'priority'      => 130,
)
)
);


// Parallax
$wp_customize->add_setting( 'onepress_hero_parallax',
array(
'sanitize_callback' => 'onepress_sanitize_checkbox',
'default'           => 0,
'transport' => 'refresh', // refresh or postMessage
)
);
$wp_customize->add_control(
'onepress_hero_parallax',
array(
'label' 		=> esc_html__('Enable parallax effect (apply for first BG image only)', 'onepress'),
'section' 		=> 'onepress_hero_images',
'type' 		   => 'checkbox',
'priority'      => 50,
'description' => '',
)
);

// Background Video
$wp_customize->add_setting( 'onepress_hero_videobackground_upsell',
array(
'sanitize_callback' => 'onepress_sanitize_text',
)
);
$wp_customize->add_control( new OnePress_Misc_Control( $wp_customize, 'onepress_hero_videobackground_upsell',
array(
'section'     => 'onepress_hero_images',
'type'        => 'custom_message',
'description' => wp_kses_post( '', 'onepress' ),
'priority'    => 131,
)
));



$wp_customize->add_section( 'onepress_hero_content_layout1' ,
array(
'priority'    => 9,
'title'       => esc_html__( 'Hero Content Layout', 'onepress' ),
'description' => '',
'panel'       => 'onepress_hero_panel',

)
);

// Hero Layout
$wp_customize->add_setting( 'onepress_hero_layout',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => '1',
)
);
$wp_customize->add_control( 'onepress_hero_layout',
array(
'label' 		=> esc_html__('Display Layout', 'onepress'),
'section' 		=> 'onepress_hero_content_layout1',
'description'   => '',
'type'          => 'select',
'choices'       => array(
'1' => esc_html__('Layout 1', 'onepress' ),
'2' => esc_html__('Layout 2', 'onepress' ),
),
)
);
// For Hero layout ------------------------

// Large Text
$wp_customize->add_setting( 'onepress_hcl1_largetext',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'mod' 				=> 'html',
'default'           => wp_kses_post('We are <span class="js-rotating">OnePress | One Page | Responsive | Perfection</span>', 'onepress'),
)
);
$wp_customize->add_control( new OnePress_Editor_Custom_Control(
$wp_customize,
'onepress_hcl1_largetext',
array(
'label' 		=> esc_html__('Large Text', 'onepress'),
'section' 		=> 'onepress_hero_content_layout1',
'description'   => esc_html__('Text Rotating Guide: Put your rotate texts separate by "|" into <span class="js-rotating">...</span>, go to Customizer->Site Option->Animate to control rotate animation.', 'onepress'),
)
));

// Small Text
$wp_customize->add_setting( 'onepress_hcl1_smalltext',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'			=> wp_kses_post('Morbi tempus porta nunc <strong>pharetra quisque</strong> ligula imperdiet posuere<br> vitae felis proin sagittis leo ac tellus blandit sollicitudin quisque vitae placerat.', 'onepress'),
)
);
$wp_customize->add_control( new OnePress_Editor_Custom_Control(
$wp_customize,
'onepress_hcl1_smalltext',
array(
'label' 		=> esc_html__('Small Text', 'onepress'),
'section' 		=> 'onepress_hero_content_layout1',
'mod' 				=> 'html',
'description'   => esc_html__('You can use text rotate slider in this textarea too.', 'onepress'),
)
));

// Button #1 Text
$wp_customize->add_setting( 'onepress_hcl1_btn1_text',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => esc_html__('About Us', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_hcl1_btn1_text',
array(
'label' 		=> esc_html__('Button #1 Text', 'onepress'),
'section' 		=> 'onepress_hero_content_layout1'
)
);

// Button #1 Link
$wp_customize->add_setting( 'onepress_hcl1_btn1_link',
array(
'sanitize_callback' => 'esc_url',
'default'           => esc_url( home_url( '/' )).esc_html__('#about', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_hcl1_btn1_link',
array(
'label' 		=> esc_html__('Button #1 Link', 'onepress'),
'section' 		=> 'onepress_hero_content_layout1'
)
);
// Button #1 Style
$wp_customize->add_setting( 'onepress_hcl1_btn1_style',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => 'btn-theme-primary',
)
);
$wp_customize->add_control( 'onepress_hcl1_btn1_style',
array(
'label' 		=> esc_html__('Button #1 style', 'onepress'),
'section' 		=> 'onepress_hero_content_layout1',
'type'          => 'select',
'choices' => array(
'btn-theme-primary' => esc_html__('Button Primary', 'onepress'),
'btn-secondary-outline' => esc_html__('Button Secondary', 'onepress'),
'btn-default' => esc_html__('Button', 'onepress'),
'btn-primary' => esc_html__('Primary', 'onepress'),
'btn-success' => esc_html__('Success', 'onepress'),
'btn-info' => esc_html__('Info', 'onepress'),
'btn-warning' => esc_html__('Warning', 'onepress'),
'btn-danger' => esc_html__('Danger', 'onepress'),
)
)
);

// Button #2 Text
$wp_customize->add_setting( 'onepress_hcl1_btn2_text',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => esc_html__('Get Started', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_hcl1_btn2_text',
array(
'label' 		=> esc_html__('Button #2 Text', 'onepress'),
'section' 		=> 'onepress_hero_content_layout1'
)
);

// Button #2 Link
$wp_customize->add_setting( 'onepress_hcl1_btn2_link',
array(
'sanitize_callback' => 'esc_url',
'default'           => esc_url( home_url( '/' )).esc_html__('#contact', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_hcl1_btn2_link',
array(
'label' 		=> esc_html__('Button #2 Link', 'onepress'),
'section' 		=> 'onepress_hero_content_layout1'
)
);

// Button #1 Style
$wp_customize->add_setting( 'onepress_hcl1_btn2_style',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => 'btn-secondary-outline',
)
);
$wp_customize->add_control( 'onepress_hcl1_btn2_style',
array(
'label' 		=> esc_html__('Button #2 style', 'onepress'),
'section' 		=> 'onepress_hero_content_layout1',
'type'          => 'select',
'choices' => array(
'btn-theme-primary' => esc_html__('Button Primary', 'onepress'),
'btn-secondary-outline' => esc_html__('Button Secondary', 'onepress'),
'btn-default' => esc_html__('Button', 'onepress'),
'btn-primary' => esc_html__('Primary', 'onepress'),
'btn-success' => esc_html__('Success', 'onepress'),
'btn-info' => esc_html__('Info', 'onepress'),
'btn-warning' => esc_html__('Warning', 'onepress'),
'btn-danger' => esc_html__('Danger', 'onepress'),
)
)
);


/* Layout 2 ---- */

// Layout 22 content text
$wp_customize->add_setting( 'onepress_hcl2_content',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'mod' 				=> 'html',
'default'           =>  wp_kses_post( '<h1>Business Website'."\n".'Made Simple.</h1>'."\n".'We provide creative solutions to clients around the world,'."\n".'creating things that get attention and meaningful.'."\n\n".'<a class="btn btn-secondary-outline btn-lg" href="#">Get Started</a>' ),
)
);
$wp_customize->add_control( new OnePress_Editor_Custom_Control(
$wp_customize,
'onepress_hcl2_content',
array(
'label' 		=> esc_html__('Content Text', 'onepress'),
'section' 		=> 'onepress_hero_content_layout1',
'description'   => '',
)
));

// Layout 2 image
$wp_customize->add_setting( 'onepress_hcl2_image',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'mod' 				=> 'html',
'default'           =>  get_template_directory_uri().'/assets/images/onepress_responsive.png',
)
);
$wp_customize->add_control( new WP_Customize_Image_Control(
$wp_customize,
'onepress_hcl2_image',
array(
'label' 		=> esc_html__('Image', 'onepress'),
'section' 		=> 'onepress_hero_content_layout1',
'description'   => '',
)
));


// END For Hero layout ------------------------

/*------------------------------------------------------------------------*/
/*  Section: Video Popup
/*------------------------------------------------------------------------*/
$wp_customize->add_panel( 'onepress_videolightbox' ,
array(
'priority'        => 180,
'title'           => esc_html__( 'Section: Video Lightbox', 'onepress' ),
'description'     => '',
'active_callback' => 'onepress_showon_frontpage'
)
);

$wp_customize->add_section( 'onepress_videolightbox_settings' ,
array(
'priority'    => 3,
'title'       => esc_html__( 'Section Settings', 'onepress' ),
'description' => '',
'panel'       => 'onepress_videolightbox',
)
);

// Show Content
$wp_customize->add_setting( 'onepress_videolightbox_disable',
array(
'sanitize_callback' => 'onepress_sanitize_checkbox',
'default'           => '',
)
);
$wp_customize->add_control( 'onepress_videolightbox_disable',
array(
'type'        => 'checkbox',
'label'       => esc_html__('Hide this section?', 'onepress'),
'section'     => 'onepress_videolightbox_settings',
'description' => esc_html__('Check this box to hide this section.', 'onepress'),
)
);

// Section ID
$wp_customize->add_setting( 'onepress_videolightbox_id',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => 'videolightbox',
)
);
$wp_customize->add_control( 'onepress_videolightbox_id',
array(
'label' 		=> esc_html__('Section ID:', 'onepress'),
'section' 		=> 'onepress_videolightbox_settings',
'description'   => esc_html__('The section id, we will use this for link anchor.', 'onepress' )
)
);

// Title
$wp_customize->add_setting( 'onepress_videolightbox_title',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => '',
)
);

$wp_customize->add_control( new OnePress_Editor_Custom_Control(
$wp_customize,
'onepress_videolightbox_title',
array(
'label'     	=>  esc_html__('Section heading', 'onepress'),
'section' 		=> 'onepress_videolightbox_settings',
'description'   => '',
)
));

// Video URL
$wp_customize->add_setting( 'onepress_videolightbox_url',
array(
'sanitize_callback' => 'esc_url_raw',
'default'           => '',
)
);
$wp_customize->add_control( 'onepress_videolightbox_url',
array(
'label' 		=> esc_html__('Video url', 'onepress'),
'section' 		=> 'onepress_videolightbox_settings',
'description'   =>  esc_html__('Paste Youtube or Vimeo url here', 'onepress'),
)
);

// Parallax image
$wp_customize->add_setting( 'onepress_videolightbox_image',
array(
'sanitize_callback' => 'esc_url_raw',
'default'           => '',
)
);
$wp_customize->add_control( new WP_Customize_Image_Control(
$wp_customize,
'onepress_videolightbox_image',
array(
'label' 		=> esc_html__('Background image', 'onepress'),
'section' 		=> 'onepress_videolightbox_settings',
)
));


/*------------------------------------------------------------------------*/
/*  Section: Gallery
/*------------------------------------------------------------------------*/
$wp_customize->add_panel( 'onepress_gallery' ,
array(
'priority'        => 190,
'title'           => esc_html__( 'Section: Gallery', 'onepress' ),
'description'     => '',
'active_callback' => 'onepress_showon_frontpage'
)
);

$wp_customize->add_section( 'onepress_gallery_settings' ,
array(
'priority'    => 3,
'title'       => esc_html__( 'Section Settings', 'onepress' ),
'description' => '',
'panel'       => 'onepress_gallery',
)
);

// Show Content
$wp_customize->add_setting( 'onepress_gallery_disable',
array(
'sanitize_callback' => 'onepress_sanitize_checkbox',
'default'           => 1,
)
);
$wp_customize->add_control( 'onepress_gallery_disable',
array(
'type'        => 'checkbox',
'label'       => esc_html__('Hide this section?', 'onepress'),
'section'     => 'onepress_gallery_settings',
'description' => esc_html__('Check this box to hide this section.', 'onepress'),
)
);

// Section ID
$wp_customize->add_setting( 'onepress_gallery_id',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => esc_html__('gallery', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_gallery_id',
array(
'label'     => esc_html__('Section ID:', 'onepress'),
'section' 		=> 'onepress_gallery_settings',
'description'   => esc_html__( 'The section id, we will use this for link anchor.', 'onepress' )
)
);

// Title
$wp_customize->add_setting( 'onepress_gallery_title',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('Gallery', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_gallery_title',
array(
'label'     => esc_html__('Section Title', 'onepress'),
'section' 		=> 'onepress_gallery_settings',
'description'   => '',
)
);

// Sub Title
$wp_customize->add_setting( 'onepress_gallery_subtitle',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('Section subtitle', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_gallery_subtitle',
array(
'label'     => esc_html__('Section Subtitle', 'onepress'),
'section' 		=> 'onepress_gallery_settings',
'description'   => '',
)
);

// Description
$wp_customize->add_setting( 'onepress_gallery_desc',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => '',
)
);
$wp_customize->add_control( new OnePress_Editor_Custom_Control(
$wp_customize,
'onepress_gallery_desc',
array(
'label' 		=> esc_html__('Section Description', 'onepress'),
'section' 		=> 'onepress_gallery_settings',
'description'   => '',
)
));

$wp_customize->add_section( 'onepress_gallery_content' ,
array(
'priority'    => 6,
'title'       => esc_html__( 'Section Content', 'onepress' ),
'description' => '',
'panel'       => 'onepress_gallery',
)
);
// Gallery Source
/*$wp_customize->add_setting( 'onepress_gallery_source',
array(
'sanitize_callback' => 'sanitize_text_field',
'validate_callback' => 'onepress_gallery_source_validate',
'default'           => 'page',
)
);*/
$wp_customize->add_control( 'onepress_gallery_source',
array(
'label'     	=> esc_html__('Select Gallery Source', 'onepress'),
'section' 		=> 'onepress_gallery_content',
'type'          => 'select',
'priority'      => 5,
'choices'       => array(
'page'      => esc_html__('Page', 'onepress'),
'facebook'  => 'Facebook',
'instagram' => 'Instagram',
'flickr'    => 'Flickr',
)
)
);

// Source page settings
$wp_customize->add_setting( 'onepress_gallery_source_page',
array(
'sanitize_callback' => 'onepress_sanitize_number',
'default'           => '',
)
);
$wp_customize->add_control( 'onepress_gallery_source_page',
array(
'label'     	=> esc_html__('Select Gallery Page', 'onepress'),
'section' 		=> 'onepress_gallery_content',
'type'          => 'select',
'priority'      => 10,
'choices'       => $option_pages,
'description'   => esc_html__('Select a page which have content contain [gallery] shortcode.', 'onepress'),
)
);


// Gallery Layout
$wp_customize->add_setting( 'onepress_gallery_layout',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => 'default',
)
);
$wp_customize->add_control( 'onepress_gallery_layout',
array(
'label'     	=> esc_html__('Layout', 'onepress'),
'section' 		=> 'onepress_gallery_content',
'type'          => 'select',
'priority'      => 40,
'choices'       => array(
'default'      => esc_html__('Default, inside container', 'onepress'),
'full-width'  => esc_html__('Full Width', 'onepress'),
)
)
);

// Gallery Display
$wp_customize->add_setting( 'onepress_gallery_display',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => 'default',
)
);
$wp_customize->add_control( 'onepress_gallery_display',
array(
'label'     	=> esc_html__('Display', 'onepress'),
'section' 		=> 'onepress_gallery_content',
'type'          => 'select',
'priority'      => 50,
'choices'       => array(
'grid'      => esc_html__('Grid', 'onepress'),
'carousel'    => esc_html__('Carousel', 'onepress'),
'slider'      => esc_html__('Slider', 'onepress'),
'justified'   => esc_html__('Justified', 'onepress'),
'masonry'     => esc_html__('Masonry', 'onepress'),
)
)
);

// Gallery grid spacing
$wp_customize->add_setting( 'onepress_g_spacing',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => 20,
)
);
$wp_customize->add_control( 'onepress_g_spacing',
array(
'label'     	=> esc_html__('Item Spacing', 'onepress'),
'section' 		=> 'onepress_gallery_content',
'priority'      => 55,

)
);

// Gallery grid spacing
$wp_customize->add_setting( 'onepress_g_row_height',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => 120,
)
);
$wp_customize->add_control( 'onepress_g_row_height',
array(
'label'     	=> esc_html__('Row Height', 'onepress'),
'section' 		=> 'onepress_gallery_content',
'priority'      => 57,

)
);

// Gallery grid gird col
$wp_customize->add_setting( 'onepress_g_col',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => '4',
)
);
$wp_customize->add_control( 'onepress_g_col',
array(
'label'     	=> esc_html__('Layout columns', 'onepress'),
'section' 		=> 'onepress_gallery_content',
'priority'      => 60,
'type'          => 'select',
'choices'       => array(
'1'      => 1,
'2'      => 2,
'3'      => 3,
'4'      => 4,
'5'      => 5,
'6'      => 6,
)

)
);

// Gallery max number
$wp_customize->add_setting( 'onepress_g_number',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => 10,
)
);
$wp_customize->add_control( 'onepress_g_number',
array(
'label'     	=> esc_html__('Number items', 'onepress'),
'section' 		=> 'onepress_gallery_content',
'priority'      => 65,
)
);
// Gallery grid spacing
$wp_customize->add_setting( 'onepress_g_lightbox',
array(
'sanitize_callback' => 'onepress_sanitize_checkbox',
'default'           => 1,
)
);
$wp_customize->add_control( 'onepress_g_lightbox',
array(
'label'     	=> esc_html__('Enable Lightbox', 'onepress'),
'section' 		=> 'onepress_gallery_content',
'priority'      => 70,
'type'          => 'checkbox',
)
);

// Gallery readmore link
$wp_customize->add_setting( 'onepress_g_readmore_link',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => '',
)
);
$wp_customize->add_control( 'onepress_g_readmore_link',
array(
'label'     	=> esc_html__('Read More Link', 'onepress'),
'section' 		=> 'onepress_gallery_content',
'priority'      => 90,
'type'          => 'text',
)
);

$wp_customize->add_setting( 'onepress_g_readmore_text',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('View More', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_g_readmore_text',
array(
'label'     	=> esc_html__('Read More Text', 'onepress'),
'section' 		=> 'onepress_gallery_content',
'priority'      => 100,
'type'          => 'text',
)
);


/*------------------------------------------------------------------------*/
/*  Section: About
/*------------------------------------------------------------------------*/
$wp_customize->add_panel( 'onepress_about' ,
array(
'priority'        => 160,
'title'           => esc_html__( 'Section: About', 'onepress' ),
'description'     => '',
'active_callback' => 'onepress_showon_frontpage'
)
);

$wp_customize->add_section( 'onepress_about_settings' ,
array(
'priority'    => 3,
'title'       => esc_html__( 'Section Settings', 'onepress' ),
'description' => '',
'panel'       => 'onepress_about',
)
);

// Show Content
$wp_customize->add_setting( 'onepress_about_disable',
array(
'sanitize_callback' => 'onepress_sanitize_checkbox',
'default'           => '',
)
);
$wp_customize->add_control( 'onepress_about_disable',
array(
'type'        => 'checkbox',
'label'       => esc_html__('Hide this section?', 'onepress'),
'section'     => 'onepress_about_settings',
'description' => esc_html__('Check this box to hide this section.', 'onepress'),
)
);

// Section ID
$wp_customize->add_setting( 'onepress_about_id',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => esc_html__('about', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_about_id',
array(
'label' 		=> esc_html__('Section ID:', 'onepress'),
'section' 		=> 'onepress_about_settings',
'description'   => esc_html__( 'The section id, we will use this for link anchor.', 'onepress' )
)
);

// Title
$wp_customize->add_setting( 'onepress_about_title',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('About Us', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_about_title',
array(
'label' 		=> esc_html__('Section Title', 'onepress'),
'section' 		=> 'onepress_about_settings',
'description'   => '',
)
);

// Sub Title
$wp_customize->add_setting( 'onepress_about_subtitle',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('Section subtitle', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_about_subtitle',
array(
'label' 		=> esc_html__('Section Subtitle', 'onepress'),
'section' 		=> 'onepress_about_settings',
'description'   => '',
)
);

// Description
$wp_customize->add_setting( 'onepress_about_desc',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => '',
)
);
$wp_customize->add_control( new OnePress_Editor_Custom_Control(
$wp_customize,
'onepress_about_desc',
array(
'label' 		=> esc_html__('Section Description', 'onepress'),
'section' 		=> 'onepress_about_settings',
'description'   => '',
)
));


$wp_customize->add_section( 'onepress_about_content' ,
array(
'priority'    => 6,
'title'       => esc_html__( 'Section Content', 'onepress' ),
'description' => '',
'panel'       => 'onepress_about',
)
);

// Order & Stlying
$wp_customize->add_setting(
'onepress_about_boxes',
array(
//'default' => '',
'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
'transport' => 'refresh', // refresh or postMessage
) );


$wp_customize->add_control(
new Onepress_Customize_Repeatable_Control(
$wp_customize,
'onepress_about_boxes',
array(
'label' 		=> esc_html__('About content page', 'onepress'),
'description'   => '',
'section'       => 'onepress_about_content',
'live_title_id' => 'content_page', // apply for unput text and textarea only
'title_format'  => esc_html__('[live_title]', 'onepress'), // [live_title]
'max_item'      => 3, // Maximum item can add
'limited_msg' 	=> wp_kses_post( '', 'onepress' ),
//'allow_unlimited' => false, // Maximum item can add

'fields'    => array(
'content_page'  => array(
'title' => esc_html__('Select a page', 'onepress'),
'type'  =>'select',
'options' => $option_pages
),
'hide_title'  => array(
'title' => esc_html__('Hide item title', 'onepress'),
'type'  =>'checkbox',
),
'enable_link'  => array(
'title' => esc_html__('Link to single page', 'onepress'),
'type'  =>'checkbox',
),
),

)
)
);

// About content source
$wp_customize->add_setting( 'onepress_about_content_source',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => 'content',
)
);

$wp_customize->add_control( 'onepress_about_content_source',
array(
'label' 		=> esc_html__('Item content source', 'onepress'),
'section' 		=> 'onepress_about_content',
'description'   => '',
'type'          => 'select',
'choices'       => array(
'content' => esc_html__( 'Full Page Content', 'onepress' ),
'excerpt' => esc_html__( 'Page Excerpt', 'onepress' ),
),
)
);


/*------------------------------------------------------------------------*/
/*  Section: Features
/*------------------------------------------------------------------------*/
$wp_customize->add_panel( 'onepress_features' ,
array(
'priority'        => 150,
'title'           => esc_html__( 'Section: Features', 'onepress' ),
'description'     => '',
'active_callback' => 'onepress_showon_frontpage'
)
);

$wp_customize->add_section( 'onepress_features_settings' ,
array(
'priority'    => 3,
'title'       => esc_html__( 'Section Settings', 'onepress' ),
'description' => '',
'panel'       => 'onepress_features',
)
);

// Show Content
$wp_customize->add_setting( 'onepress_features_disable',
array(
'sanitize_callback' => 'onepress_sanitize_checkbox',
'default'           => '',
)
);
$wp_customize->add_control( 'onepress_features_disable',
array(
'type'        => 'checkbox',
'label'       => esc_html__('Hide this section?', 'onepress'),
'section'     => 'onepress_features_settings',
'description' => esc_html__('Check this box to hide this section.', 'onepress'),
)
);

// Section ID
$wp_customize->add_setting( 'onepress_features_id',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => esc_html__('features', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_features_id',
array(
'label' 		=> esc_html__('Section ID:', 'onepress'),
'section' 		=> 'onepress_features_settings',
'description'   => esc_html__( 'The section id, we will use this for link anchor.', 'onepress' )
)
);

// Title
$wp_customize->add_setting( 'onepress_features_title',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('Features', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_features_title',
array(
'label' 		=> esc_html__('Section Title', 'onepress'),
'section' 		=> 'onepress_features_settings',
'description'   => '',
)
);

// Sub Title
$wp_customize->add_setting( 'onepress_features_subtitle',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('Section subtitle', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_features_subtitle',
array(
'label' 		=> esc_html__('Section Subtitle', 'onepress'),
'section' 		=> 'onepress_features_settings',
'description'   => '',
)
);

// Description
$wp_customize->add_setting( 'onepress_features_desc',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => '',
)
);
$wp_customize->add_control( new OnePress_Editor_Custom_Control(
$wp_customize,
'onepress_features_desc',
array(
'label' 		=> esc_html__('Section Description', 'onepress'),
'section' 		=> 'onepress_features_settings',
'description'   => '',
)
));

// Features layout
$wp_customize->add_setting( 'onepress_features_layout',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => '3',
)
);

$wp_customize->add_control( 'onepress_features_layout',
array(
'label' 		=> esc_html__('Features Layout Setting', 'onepress'),
'section' 		=> 'onepress_features_settings',
'description'   => '',
'type'          => 'select',
'choices'       => array(
'3' => esc_html__( '4 Columns', 'onepress' ),
'4' => esc_html__( '3 Columns', 'onepress' ),
'6' => esc_html__( '2 Columns', 'onepress' ),
),
)
);


$wp_customize->add_section( 'onepress_features_content' ,
array(
'priority'    => 6,
'title'       => esc_html__( 'Section Content', 'onepress' ),
'description' => '',
'panel'       => 'onepress_features',
)
);

// Order & Styling
$wp_customize->add_setting(
'onepress_features_boxes',
array(
//'default' => '',
'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
'transport' => 'refresh', // refresh or postMessage
) );

$wp_customize->add_control(
new Onepress_Customize_Repeatable_Control(
$wp_customize,
'onepress_features_boxes',
array(
'label' 		=> esc_html__('Features content', 'onepress'),
'description'   => '',
'section'       => 'onepress_features_content',
'live_title_id' => 'title', // apply for unput text and textarea only
'title_format'  => esc_html__('[live_title]', 'onepress'), // [live_title]
'max_item'      => 4, // Maximum item can add
'limited_msg' 	=> wp_kses_post( '', 'onepress' ),
'fields'    => array(
'title'  => array(
'title' => esc_html__('Title', 'onepress'),
'type'  =>'text',
),
'icon_type'  => array(
'title' => esc_html__('Custom icon', 'onepress'),
'type'  =>'select',
'options' => array(
'icon' => esc_html__('Icon', 'onepress'),
'image' => esc_html__('image', 'onepress'),
),
),
'icon'  => array(
'title' => esc_html__('Icon', 'onepress'),
'type'  =>'icon',
'required' => array( 'icon_type', '=', 'icon' ),
),
'image'  => array(
'title' => esc_html__('Image', 'onepress'),
'type'  =>'media',
'required' => array( 'icon_type', '=', 'image' ),
),
'desc'  => array(
'title' => esc_html__('Description', 'onepress'),
'type'  =>'editor',
),
'link'  => array(
'title' => esc_html__('Custom Link', 'onepress'),
'type'  =>'text',
),
),

)
)
);

// About content source
$wp_customize->add_setting( 'onepress_about_content_source',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => 'content',
)
);

$wp_customize->add_control( 'onepress_about_content_source',
array(
'label' 		=> esc_html__('Item content source', 'onepress'),
'section' 		=> 'onepress_about_content',
'description'   => '',
'type'          => 'select',
'choices'       => array(
'content' => esc_html__( 'Full Page Content', 'onepress' ),
'excerpt' => esc_html__( 'Page Excerpt', 'onepress' ),
),
)
);


/*------------------------------------------------------------------------*/
/*  Section: Services
/*------------------------------------------------------------------------*/
$wp_customize->add_panel( 'onepress_services' ,
array(
'priority'        => 170,
'title'           => esc_html__( 'Section: Services', 'onepress' ),
'description'     => '',
'active_callback' => 'onepress_showon_frontpage'
)
);

$wp_customize->add_section( 'onepress_service_settings' ,
array(
'priority'    => 3,
'title'       => esc_html__( 'Section Settings', 'onepress' ),
'description' => '',
'panel'       => 'onepress_services',
)
);

// Show Content
$wp_customize->add_setting( 'onepress_services_disable',
array(
'sanitize_callback' => 'onepress_sanitize_checkbox',
'default'           => '',
)
);
$wp_customize->add_control( 'onepress_services_disable',
array(
'type'        => 'checkbox',
'label'       => esc_html__('Hide this section?', 'onepress'),
'section'     => 'onepress_service_settings',
'description' => esc_html__('Check this box to hide this section.', 'onepress'),
)
);

// Section ID
$wp_customize->add_setting( 'onepress_services_id',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => esc_html__('services', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_services_id',
array(
'label'     => esc_html__('Section ID:', 'onepress'),
'section' 		=> 'onepress_service_settings',
'description'   => 'The section id, we will use this for link anchor.'
)
);

// Title
$wp_customize->add_setting( 'onepress_services_title',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('Our Services', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_services_title',
array(
'label'     => esc_html__('Section Title', 'onepress'),
'section' 		=> 'onepress_service_settings',
'description'   => '',
)
);

// Sub Title
$wp_customize->add_setting( 'onepress_services_subtitle',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('Section subtitle', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_services_subtitle',
array(
'label'     => esc_html__('Section Subtitle', 'onepress'),
'section' 		=> 'onepress_service_settings',
'description'   => '',
)
);

// Description
$wp_customize->add_setting( 'onepress_services_desc',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => '',
)
);
$wp_customize->add_control( new OnePress_Editor_Custom_Control(
$wp_customize,
'onepress_services_desc',
array(
'label' 		=> esc_html__('Section Description', 'onepress'),
'section' 		=> 'onepress_service_settings',
'description'   => '',
)
));


// Services layout
$wp_customize->add_setting( 'onepress_service_layout',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => '6',
)
);

$wp_customize->add_control( 'onepress_service_layout',
array(
'label' 		=> esc_html__('Services Layout Setting', 'onepress'),
'section' 		=> 'onepress_service_settings',
'description'   => '',
'type'          => 'select',
'choices'       => array(
'3' => esc_html__( '4 Columns', 'onepress' ),
'4' => esc_html__( '3 Columns', 'onepress' ),
'6' => esc_html__( '2 Columns', 'onepress' ),
'12' => esc_html__( '1 Column', 'onepress' ),
),
)
);


$wp_customize->add_section( 'onepress_service_content' ,
array(
'priority'    => 6,
'title'       => esc_html__( 'Section Content', 'onepress' ),
'description' => '',
'panel'       => 'onepress_services',
)
);

// Section service content.
$wp_customize->add_setting(
'onepress_services',
array(
'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
'transport' => 'refresh', // refresh or postMessage
) );


$wp_customize->add_control(
new Onepress_Customize_Repeatable_Control(
$wp_customize,
'onepress_services',
array(
'label'     	=> esc_html__('Service content', 'onepress'),
'description'   => '',
'section'       => 'onepress_service_content',
'live_title_id' => 'content_page', // apply for unput text and textarea only
'title_format'  => esc_html__('[live_title]', 'onepress'), // [live_title]
'max_item'      => 4, // Maximum item can add
'limited_msg' 	=> wp_kses_post( '', 'onepress' ),

'fields'    => array(
'icon_type'  => array(
'title' => esc_html__('Custom icon', 'onepress'),
'type'  =>'select',
'options' => array(
'icon' => esc_html__('Icon', 'onepress'),
'image' => esc_html__('image', 'onepress'),
),
),
'icon'  => array(
'title' => esc_html__('Icon', 'onepress'),
'type'  =>'icon',
'required' => array( 'icon_type', '=', 'icon' ),
),
'image'  => array(
'title' => esc_html__('Image', 'onepress'),
'type'  =>'media',
'required' => array( 'icon_type', '=', 'image' ),
),

'content_page'  => array(
'title' => esc_html__('Select a page', 'onepress'),
'type'  =>'select',
'options' => $option_pages
),
'enable_link'  => array(
'title' => esc_html__('Link to single page', 'onepress'),
'type'  =>'checkbox',
),
),

)
)
);

/*------------------------------------------------------------------------*/
/*  Section: Counter
/*------------------------------------------------------------------------*/
$wp_customize->add_panel( 'onepress_counter' ,
array(
'priority'        => 210,
'title'           => esc_html__( 'Section: Counter', 'onepress' ),
'description'     => '',
'active_callback' => 'onepress_showon_frontpage'
)
);

$wp_customize->add_section( 'onepress_counter_settings' ,
array(
'priority'    => 3,
'title'       => esc_html__( 'Section Settings', 'onepress' ),
'description' => '',
'panel'       => 'onepress_counter',
)
);
// Show Content
$wp_customize->add_setting( 'onepress_counter_disable',
array(
'sanitize_callback' => 'onepress_sanitize_checkbox',
'default'           => '',
)
);
$wp_customize->add_control( 'onepress_counter_disable',
array(
'type'        => 'checkbox',
'label'       => esc_html__('Hide this section?', 'onepress'),
'section'     => 'onepress_counter_settings',
'description' => esc_html__('Check this box to hide this section.', 'onepress'),
)
);

// Section ID
$wp_customize->add_setting( 'onepress_counter_id',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => esc_html__('counter', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_counter_id',
array(
'label'     	=> esc_html__('Section ID:', 'onepress'),
'section' 		=> 'onepress_counter_settings',
'description'   => esc_html__( 'The section id, we will use this for link anchor.', 'onepress' )
)
);

// Title
$wp_customize->add_setting( 'onepress_counter_title',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('Our Numbers', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_counter_title',
array(
'label'     	=> esc_html__('Section Title', 'onepress'),
'section' 		=> 'onepress_counter_settings',
'description'   => '',
)
);

// Sub Title
$wp_customize->add_setting( 'onepress_counter_subtitle',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('Section subtitle', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_counter_subtitle',
array(
'label'     	=> esc_html__('Section Subtitle', 'onepress'),
'section' 		=> 'onepress_counter_settings',
'description'   => '',
)
);

// Description
$wp_customize->add_setting( 'onepress_counter_desc',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => '',
)
);
$wp_customize->add_control( new OnePress_Editor_Custom_Control(
$wp_customize,
'onepress_counter_desc',
array(
'label' 		=> esc_html__('Section Description', 'onepress'),
'section' 		=> 'onepress_counter_settings',
'description'   => '',
)
));

$wp_customize->add_section( 'onepress_counter_content' ,
array(
'priority'    => 6,
'title'       => esc_html__( 'Section Content', 'onepress' ),
'description' => '',
'panel'       => 'onepress_counter',
)
);

// Order & Styling
$wp_customize->add_setting(
'onepress_counter_boxes',
array(
'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
'transport' => 'refresh', // refresh or postMessage
) );


$wp_customize->add_control(
new Onepress_Customize_Repeatable_Control(
$wp_customize,
'onepress_counter_boxes',
array(
'label'     	=> esc_html__('Counter content', 'onepress'),
'description'   => '',
'section'       => 'onepress_counter_content',
'live_title_id' => 'title', // apply for unput text and textarea only
'title_format'  => esc_html__('[live_title]', 'onepress'), // [live_title]
'max_item'      => 4, // Maximum item can add
'limited_msg' 	=> wp_kses_post( '', 'onepress' ),
'fields'    => array(
'title' => array(
'title' => esc_html__('Title', 'onepress'),
'type'  =>'text',
'desc'  => '',
'default' => esc_html__( 'Your counter label', 'onepress' ),
),
'number' => array(
'title' => esc_html__('Number', 'onepress'),
'type'  =>'text',
'default' => 99,
),
'unit_before'  => array(
'title' => esc_html__('Before number', 'onepress'),
'type'  =>'text',
'default' => '',
),
'unit_after'  => array(
'title' => esc_html__('After number', 'onepress'),
'type'  =>'text',
'default' => '',
),
),

)
)
);

/*------------------------------------------------------------------------*/
/*  Section: Team
/*------------------------------------------------------------------------*/
$wp_customize->add_panel( 'onepress_team' ,
array(
'priority'        => 250,
'title'           => esc_html__( 'Section: Team', 'onepress' ),
'description'     => '',
'active_callback' => 'onepress_showon_frontpage'
)
);

$wp_customize->add_section( 'onepress_team_settings' ,
array(
'priority'    => 3,
'title'       => esc_html__( 'Section Settings', 'onepress' ),
'description' => '',
'panel'       => 'onepress_team',
)
);

// Show Content
$wp_customize->add_setting( 'onepress_team_disable',
array(
'sanitize_callback' => 'onepress_sanitize_checkbox',
'default'           => '',
)
);
$wp_customize->add_control( 'onepress_team_disable',
array(
'type'        => 'checkbox',
'label'       => esc_html__('Hide this section?', 'onepress'),
'section'     => 'onepress_team_settings',
'description' => esc_html__('Check this box to hide this section.', 'onepress'),
)
);
// Section ID
$wp_customize->add_setting( 'onepress_team_id',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => esc_html__('team', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_team_id',
array(
'label'     	=> esc_html__('Section ID:', 'onepress'),
'section' 		=> 'onepress_team_settings',
'description'   => 'The section id, we will use this for link anchor.'
)
);

// Title
$wp_customize->add_setting( 'onepress_team_title',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('Our Team', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_team_title',
array(
'label'    		=> esc_html__('Section Title', 'onepress'),
'section' 		=> 'onepress_team_settings',
'description'   => '',
)
);

// Sub Title
$wp_customize->add_setting( 'onepress_team_subtitle',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => esc_html__('Section subtitle', 'onepress'),
)
);
$wp_customize->add_control( 'onepress_team_subtitle',
array(
'label'     => esc_html__('Section Subtitle', 'onepress'),
'section' 		=> 'onepress_team_settings',
'description'   => '',
)
);

// Description
$wp_customize->add_setting( 'onepress_team_desc',
array(
'sanitize_callback' => 'onepress_sanitize_text',
'default'           => '',
)
);
$wp_customize->add_control( new OnePress_Editor_Custom_Control(
$wp_customize,
'onepress_team_desc',
array(
'label' 		=> esc_html__('Section Description', 'onepress'),
'section' 		=> 'onepress_team_settings',
'description'   => '',
)
));

// Team layout
$wp_customize->add_setting( 'onepress_team_layout',
array(
'sanitize_callback' => 'sanitize_text_field',
'default'           => '3',
)
);

$wp_customize->add_control( 'onepress_team_layout',
array(
'label' 		=> esc_html__('Team Layout Setting', 'onepress'),
'section' 		=> 'onepress_team_settings',
'description'   => '',
'type'          => 'select',
'choices'       => array(
'3' => esc_html__( '4 Columns', 'onepress' ),
'4' => esc_html__( '3 Columns', 'onepress' ),
'6' => esc_html__( '2 Columns', 'onepress' ),
),
)
);

$wp_customize->add_section( 'onepress_team_content' ,
array(
'priority'    => 6,
'title'       => esc_html__( 'Section Content', 'onepress' ),
'description' => '',
'panel'       => 'onepress_team',
)
);

// Team member settings
$wp_customize->add_setting(
'onepress_team_members',
array(
'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
'transport' => 'refresh', // refresh or postMessage
) );


$wp_customize->add_control(
new Onepress_Customize_Repeatable_Control(
$wp_customize,
'onepress_team_members',
array(
'label'     => esc_html__('Team members', 'onepress'),
'description'   => '',
'section'       => 'onepress_team_content',
//'live_title_id' => 'user_id', // apply for unput text and textarea only
'title_format'  => esc_html__( '[live_title]', 'onepress'), // [live_title]
'max_item'      => 4, // Maximum item can add
'limited_msg' 	=> wp_kses_post( '', 'onepress' ),
'fields'    => array(
'user_id' => array(
'title' => esc_html__('User media', 'onepress'),
'type'  =>'media',
'desc'  => '',
),
'link' => array(
'title' => esc_html__('Custom Link', 'onepress'),
'type'  =>'text',
'desc'  => '',
),
),

)
)
);

