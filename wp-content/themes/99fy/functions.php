<?php
/**
 * nnfy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 99fy
 */

$text_price = 0; $image_price = 0;

if ( ! function_exists( 'nnfy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nnfy_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on nnfy, use a find and replace
	 * to change '99fy' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( '99fy', get_template_directory() . '/languages' );
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style('css/editor-style.css');
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	* Custom logo support
	*/
	add_theme_support( 'custom-logo' );

	add_image_size( 'nnfy_blog_grid_thumb', 370, 244, true );
	

	/**
	* This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary'  => esc_html__( 'Primary', '99fy' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'link',
		'quote',
		'gallery',
		'audio',
		'video',
	) );


	/**
	* Set up the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( 'nnfy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	* Add theme support for selective refresh for widgets.
	*/
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'nnfy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

if ( !function_exists( 'nnfy_content_width')){
 	function nnfy_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'nnfy_content_width', 640 );
	}
} 
add_action( 'after_setup_theme', 'nnfy_content_width', 0 );

/**
 * Register custom fonts.
 */
 if ( !function_exists( 'nnfy_fonts_url' ) ) :
function nnfy_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', '99fy' ) ) {
		$fonts[] = 'Open Sans:300,400,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', '99fy' ) ) {
		$fonts[] = 'Poppins:300,400,500,500i,600,700,800';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * Enqueue scripts and styles.
 */
function nnfy_scripts() {

	wp_enqueue_style('99fy-font',nnfy_fonts_url());
	wp_enqueue_style('font-awesome',get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style( 'htflexboxgrid', get_template_directory_uri() . '/css/htflexboxgrid.css');
	wp_enqueue_style('magnific-popup',get_template_directory_uri() . '/css/magnific-popup.css');
	wp_enqueue_style('animate',get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style('owl-carousels',get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style('ionicons',get_template_directory_uri() . '/css/ionicons.min.css');
	wp_enqueue_style('easyzoom',get_template_directory_uri() . '/css/easyzoom.css');
	wp_enqueue_style('mean-menu',get_template_directory_uri() . '/css/meanmenu.min.css');
	wp_enqueue_style('99fy-default-style',get_template_directory_uri() . '/css/theme-default.css');
	wp_enqueue_style('99fy-blog-style',get_template_directory_uri() . '/css/blog-post.css');
	wp_enqueue_style('99fy-main-style',get_template_directory_uri() . '/css/theme-style.css');
	wp_enqueue_style( '99fy-style', get_stylesheet_uri() );
	wp_enqueue_style('99fy-responsive',get_template_directory_uri() . '/css/responsive.css');


	wp_enqueue_script( 'wc-add-to-cart-variation' );
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );
	wp_enqueue_script( 'jquery-owl-carousels', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-slider' );
	wp_enqueue_script( 'jquery-easyzoom', get_template_directory_uri() . '/js/easyzoom.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/js/waypoints.js', array('jquery'), '4.0.1', true );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow-min.js', array('jquery'), '1.1.2', true );
	wp_enqueue_script( '99fy-jquery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
	wp_enqueue_script( '99fy-jquery-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );
	wp_enqueue_script( 'jquery-mean-menu', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array(), '', true );
	wp_enqueue_script( '99fy-jquery-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	// localization
	$nnfy_localize_vars = array();
	$nnfy_localize_vars['ajaxurl'] = esc_url( admin_url( 'admin-ajax.php') );
	wp_localize_script( "99fy-jquery-main", "nnfy_localize_vars", $nnfy_localize_vars );
	
}
add_action( 'wp_enqueue_scripts', 'nnfy_scripts' );


/**
 * Enqueue styles for the block-based editor.
 */
function nnfy_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( '99fy-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '1.0.0' );

	// Add custom fonts.
	wp_enqueue_style( 'nnfy-fonts', nnfy_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'nnfy_block_editor_styles' );


// nnfy Company Info widget js
if( !function_exists('nnfy_admin_scripts') ) {
  function nnfy_admin_scripts($hook) {
  	if( $hook != 'widgets.php' ) 
  			return;

    wp_enqueue_media();
    wp_enqueue_script( 'jquery-ui-tabs' );

    wp_enqueue_script( 'nnfy-logo-uploader', get_template_directory_uri() .'/js/site-logo-uploader.js', false, '', true );

  }
}
add_action('admin_enqueue_scripts', 'nnfy_admin_scripts');


/* Create Custom Field */

function cfwc_create_custom_field() {
	$args = array(
	'id' => 'custom_text_field_title',
	'wrapper_class' => 'form-row form-row-first',
	'label' => __( 'Custom Text Field Title', 'cfwc' ),
	'class' => 'cfwc-custom-field',
	'desc_tip' => true,
	'description' => __( 'Enter the title of your custom text field.', 'ctwc' ),
	);
	woocommerce_wp_text_input( $args );
   }
   add_action( 'woocommerce_product_options_general_product_data', 'cfwc_create_custom_field' );
   
   /**
	* Save the custom field
	* @since 1.0.0
	*/
   function cfwc_save_custom_field( $post_id ) {
	$product = wc_get_product( $post_id );
	$title = isset( $_POST['custom_text_field_title'] ) ? $_POST['custom_text_field_title'] : '';
	$product->update_meta_data( 'custom_text_field_title', sanitize_text_field( $title ) );
	$product->save();
   }
   add_action( 'woocommerce_process_product_meta', 'cfwc_save_custom_field' );
   
   /**
	* Display custom field on the front end
	* @since 1.0.0
	*/
	function cfwc_display_custom_field() {
		global $post;
		// Check for the custom field value
		$product = wc_get_product( $post->ID );
		$title = $product->get_meta( 'custom_text_field_title' );
		
		//if( $title ) {
		// Only display our field if we've got a value for the field title
		printf(
		'<div class="cfwc-custom-field-wrapper"><label for="cfwc-title-field">Add Text</label><input type="text" id="cfwc-title-field" name="cfwc-title-field" value=""></div><br />',
		esc_html( $title )
		);
		//}
	   }
	   add_action( 'woocommerce_before_add_to_cart_button', 'cfwc_display_custom_field' );
   
   /**
	* Validate the text field
	* @since 1.0.0
	* @param Array $passed Validation status.
	* @param Integer $product_id Product ID.
	* @param Boolean $quantity Quantity
	*/
//    function cfwc_validate_custom_field( $passed, $product_id, $quantity ) {
// 	if( empty( $_POST['cfwc-title-field'] ) ) {
// 	// Fails validation
// 	$passed = false;
// 	wc_add_notice( __( 'Please enter a value into the text field', 'cfwc' ), 'error' );
// 	}
// 	return $passed;
//    }
//    add_filter( 'woocommerce_add_to_cart_validation', 'cfwc_validate_custom_field', 10, 3 );
   
   /**
	* Add the text field as item data to the cart object
	* @since 1.0.0
	* @param Array $cart_item_data Cart item meta data.
	* @param Integer $product_id Product ID.
	* @param Integer $variation_id Variation ID.
	* @param Boolean $quantity Quantity
	*/
   function cfwc_add_custom_field_item_data( $cart_item_data, $product_id, $variation_id, $quantity ) {
	foreach( wc_get_product_terms( $product_id, 'pa_text-price' ) as $attribute_value ){
		// Outputting the attibute values one by one
		$text_price = (int)$attribute_value->name;
	}
	foreach( wc_get_product_terms( $product_id, 'pa_upload-image' ) as $attribute_value ){
		// Outputting the attibute values one by one
		$image_price = (int)$attribute_value->name;
	}

	if(!empty($_POST["upload_active"]) && $_POST["upload_active"] == 1 && ! empty( $_POST['cfwc-title-field'] ) ){
		// Add the item data
		$cart_item_data['title_field'] = $_POST['cfwc-title-field'];
		$product = wc_get_product( $product_id ); // Expanded function
		$price = $product->get_price(); // Expanded function
		$cart_item_data['total_price'] = $price + $text_price + $image_price; // Expanded function
	}
	else if( ! empty( $_POST['cfwc-title-field'] ) ) {
	// Add the item data
	$cart_item_data['title_field'] = $_POST['cfwc-title-field'];
	$product = wc_get_product( $product_id ); // Expanded function
	$price = $product->get_price(); // Expanded function
	$cart_item_data['total_price'] = $price + $text_price; // Expanded function
	}
	else if(!empty($_POST["upload_active"]) && $_POST["upload_active"] == 1){
		// Add the item data
		$cart_item_data['title_field'] = $_POST['cfwc-title-field'];
		$product = wc_get_product( $product_id ); // Expanded function
		$price = $product->get_price(); // Expanded function
		$cart_item_data['total_price'] = $price + $image_price; // Expanded function
	}
	
	return $cart_item_data;
   }
   add_filter( 'woocommerce_add_cart_item_data', 'cfwc_add_custom_field_item_data', 10, 4 );
   
   /**
	* Update the price in the cart
	* @since 1.0.0
	*/
   function cfwc_before_calculate_totals( $cart_obj ) {
	if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
	return;
	}
	// Iterate through each cart item
	foreach( $cart_obj->get_cart() as $key=>$value ) {
	if( isset( $value['total_price'] ) ) {
	$price = $value['total_price'];
	$value['data']->set_price( ( $price ) );
	}
	}
   }
   add_action( 'woocommerce_before_calculate_totals', 'cfwc_before_calculate_totals', 10, 1 );
   
   /**
	* Display the custom field value in the cart
	* @since 1.0.0
	*/
   function cfwc_cart_item_name( $name, $cart_item, $cart_item_key ) {
	if( isset( $cart_item['title_field'] ) ) {
	$name .= sprintf(
	'<p><b>Text added: </b>%s</p>',
	esc_html( $cart_item['title_field'] )
	);
	}
	return $name;
   }
   add_filter( 'woocommerce_cart_item_name', 'cfwc_cart_item_name', 10, 3 );
   
   /**
	* Add custom field to order object
	*/
   function cfwc_add_custom_data_to_order( $item, $cart_item_key, $values, $order ) {
	foreach( $item as $cart_item_key=>$values ) {
	if( isset( $values['title_field'] ) ) {
	$item->add_meta_data( __( 'Custom Field', 'cfwc' ), $values['title_field'], true );
	}
	}
   }
   add_action( 'woocommerce_checkout_create_order_line_item', 'cfwc_add_custom_data_to_order', 10, 4 );



   // Display additional product fields (+ jQuery code)
add_action( 'woocommerce_before_add_to_cart_button', 'display_additional_product_fields', 9 );
function display_additional_product_fields(){
    // Array of radio button options
    $options = array( __("Front Side"), __("Back Side"), __("Both Sides") );
    // Temporary styles
    ?>
    <style>
    .upload-logo a.button { padding: .3em .75em !important; }
    .upload-logo a.button.on { background-color: #CC0000 !important; color: #FFFFFF !important; }
    .upload-logo p span { display:inline-block; padding:0 8px 0 4px; }
	.image_radio { width: 8% !important; height: 10px !important;}
    </style><?php
    // Html output ?>
    <div class="upload-logo">
        <p><strong><?php _e( "Do you want to Add a Logo option"); ?>: </strong><br />
            <a href="#" class="button"><?php _e( "Yes" ); ?></a><br />
            <input type="hidden" name="upload_active" value="">
        </p>
        <div id="hidden-inputs" style="display:none">
            <p><label for="radio_field"><?php

            echo __( "Where you want the logo?" ) . ' <br>';

            // Loop though each $options array
            foreach( $options as $key => $option ) {
                $atts = $key == 0 ? 'name="side_field" checked="checked"' : 'name="side_field"'; ?>
                <input class="image_radio" type="radio" <?php echo $atts; ?> value="<?php echo $option; ?>"><span> <?php echo $option . '</span> <br />';
            }
            ?>
            </label></p>
            <p><label for="file_field"><?php echo __("Upload logo") . ': '; ?>
                <input type='file' name='image' accept='image/*'>
            </label></p>
        </div>
    </div><?php
    // Javascript (jQuery) ?>
    <script type="text/javascript">
    jQuery( function($){
        var a = '.upload-logo',         b = a+' a.button',
            c = a+' #hidden-inputs',    d = a+' input[type=hidden]';

        $(b).click(function(e){
            e.preventDefault();
            if( ! $(this).hasClass('on') ) {
                $(this).addClass('on');
                $(c).show();
                $(d).val('1');
            } else {
                $(this).removeClass('on');
                $(c).hide('fast');
                $(d).val('');
            }
        });
    });
    </script>
    <?php
}

// @ ===> Manage the file upload <=== @
// Add custom fields data as the cart item custom data 
add_filter( 'woocommerce_add_cart_item_data', 'add_custom_fields_data_as_custom_cart_item_data', 10, 2 );
function add_custom_fields_data_as_custom_cart_item_data( $cart_item, $product_id ){
    if( isset($_POST['upload_active']) && $_POST['upload_active'] && isset($_FILES['image']) ) {
        $upload = wp_upload_bits( $_FILES['image']['name'], null, file_get_contents( $_FILES['image']['tmp_name'] ) );

        $filetype = wp_check_filetype( basename( $upload['file'] ), null );

        $upload_dir = wp_upload_dir();

        $upl_base_url = is_ssl() ? str_replace('http://', 'https://', $upload_dir['baseurl']) : $upload_dir['baseurl'];

        $base_name = basename( $upload['file'] );

        $cart_item['custom_file'] = array(
            'guid'      => $upl_base_url .'/'. _wp_relative_upload_path( $upload['file'] ),
            'file_type' => $filetype['type'],
            'file_name' => $base_name,
            'title'     => preg_replace('/\.[^.]+$/', '', $base_name ),
            'side'      => isset( $_POST['side_field'] ) ? sanitize_text_field( $_POST['side_field'] ) : '',
            'key'       => md5( microtime().rand() ),
        );
    }
    return $cart_item;
}

// Display custom cart item data in cart
add_filter( 'woocommerce_get_item_data', 'display_custom_item_data', 10, 2 );
function display_custom_item_data( $cart_item_data, $cart_item ) {
    if ( isset( $cart_item['custom_file']['title'] ) ){
        $cart_item_data[] = array(
            'name' => __( 'Logo', 'woocommerce' ),
            'value' =>  $cart_item['custom_file']['title']
        );
    }

    if ( isset( $cart_item['custom_file']['side'] ) ){
        $cart_item_data[] = array(
            'name' => __( 'Side', 'woocommerce' ),
            'value' =>  $cart_item['custom_file']['side']
        );
    }
    return $cart_item_data;
}

// Save and display Logo data in orders and email notifications (everywhere)
add_action( 'woocommerce_checkout_create_order_line_item', 'custom_field_update_order_item_meta', 20, 4 );
function custom_field_update_order_item_meta( $item, $cart_item_key, $values, $order ) {
    if ( isset( $values['custom_file'] ) ){
        $item->update_meta_data( __('Logo'),  $values['custom_file']['title'] );
        $item->update_meta_data( __('Side'),  $values['custom_file']['side'] );
        $item->update_meta_data( '_logo_file_data',  $values['custom_file'] );
    }
}

// Display a linked button + the link of the logo file in backend
add_action( 'woocommerce_after_order_itemmeta', 'backend_logo_link_after_order_itemmeta', 20, 3 );
function backend_logo_link_after_order_itemmeta( $item_id, $item, $product ) {
    // Only in backend for order line items (avoiding errors)
    if( is_admin() && $item->is_type('line_item') && $item->get_meta('_logo_file_data') ){
        $file_data = $item->get_meta( '_logo_file_data' );
        echo '<p><a href="'.$file_data['guid'].'" target="_blank" class="button">'.__("Open Logo") . '</a></p>';
        echo '<p>Link: <textarea type="text" class="input-text" readonly>'.$file_data['guid'].'</textarea></p>';
    }
}

// Admin: Add custom field in product variations options pricing
add_action( 'woocommerce_variation_options_pricing', 'add_variation_custom_option_pricing', 10, 3 );
function add_variation_custom_option_pricing( $loop, $variation_data, $variation ){

   woocommerce_wp_text_input( array(
        'id'            => '_cost_price['.$loop.']',
        'label'         => __("Cost Price", "woocommerce") . ' (' . get_woocommerce_currency_symbol() . ')',
        'class' => 'short wc_input_price',
        'data_type'     => 'price',
        'wrapper_class' => 'form-row form-row-first',
        'value'         => wc_format_localized_price( get_post_meta( $variation->ID, '_cost_price', true ) )
    ) );
}

// Admin: Save custom field value from product variations options pricing
add_action( 'woocommerce_save_product_variation', 'save_variation_custom_option_pricing', 10, 2 );
function save_variation_custom_option_pricing( $variation_id, $i ){
    if( isset($_POST['_cost_price'][$i]) ){
        update_post_meta( $variation_id, '_cost_price', wc_clean( wp_unslash( str_replace( ',', '.', $_POST['_cost_price'][$i]) ) ) );
    }
}



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/*
	Load breadcrumb
*/
require get_template_directory().'/inc/breadcrumb/breadcrumb.php';

/*
	Load widget
*/
require get_template_directory().'/inc/widgets/widget-register.php';
/*
	Load tgm plugin
*/
require get_template_directory().'/inc/tgm-plugin/plugins.php';

/*
	Load global function
*/
require get_template_directory().'/inc/global-functions.php';
/*
	Comment form
*/
require get_template_directory().'/inc/comment-form.php';

/*
	image-resize 
*/
require get_template_directory().'/inc/aq_resizer.php';

/*
 	Woocommerce config
*/
require get_template_directory().'/inc/woo-config.php';
require get_template_directory().'/inc/custom-meta-box.php';
