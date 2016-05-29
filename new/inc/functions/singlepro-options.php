<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux_Framework_sample_config' ) ) {

        class Redux_Framework_sample_config {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                // This is needed. Bah WordPress bugs.  ;)
                if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                    $this->initSettings();
                } else {
                    add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
                }

            }

            public function initSettings() {

                // Just for demo purposes. Not needed per say.
                $this->theme = wp_get_theme();

                // Set the default arguments
                $this->setArguments();

                // Set a few help tabs so you can see how it's done
                $this->setHelpTabs();

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }

                // If Redux is running as a plugin, this will remove the demo notice and links
                //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

                // Function to test the compiler hook and demo CSS output.
                // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
                //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);

                // Change the arguments after they've been declared, but before the panel is created
                //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

                // Change the default value of a field after it's been set, but before it's been useds
                //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

                // Dynamically add a section. Can be also used to modify sections/fields
                //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            /**
             * This is a test function that will let you see when the compiler hook occurs.
             * It only runs if a field    set with compiler=>true is changed.
             * */
            function compiler_action( $options, $css, $changed_values ) {
                echo '<h1>The compiler hook has run!</h1>';
                echo "<pre>";
                print_r( $changed_values ); // Values that have changed since the last save
                echo "</pre>";
                //print_r($options); //Option values
                //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

                /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
            }

            /**
             * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
             * Simply include this function in the child themes functions.php file.
             * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
             * so you must use get_template_directory_uri() if you want to use any of the built in icons
             * */
            function dynamic_section( $sections ) {
                //$sections = array();
                $sections[] = array(
                    'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                    'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                    'icon'   => 'el-icon-paper-clip',
                    // Leave this as a blank section, no options just some intro text set above.
                    'fields' => array()
                );

                return $sections;
            }

            /**
             * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
             * */
            function change_arguments( $args ) {
                //$args['dev_mode'] = true;

                return $args;
            }

            /**
             * Filter hook for filtering the default value of any given field. Very useful in development mode.
             * */
            function change_defaults( $defaults ) {
                $defaults['str_replace'] = 'Testing filter hook!';

                return $defaults;
            }

            // Remove the demo link and the notice of integrated demo from the redux-framework plugin
            function remove_demo() {

                // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
                if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                    remove_filter( 'plugin_row_meta', array(
                        ReduxFrameworkPlugin::instance(),
                        'plugin_metalinks'
                    ), null, 2 );

                    // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
                }
            }

            public function setSections() {

                /**
                 * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
                 * */
                // Background Patterns Reader
                $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
                $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
                $sample_patterns      = array();

                if ( is_dir( $sample_patterns_path ) ) :

                    if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
                        $sample_patterns = array();

                        while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                                $name              = explode( '.', $sample_patterns_file );
                                $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                                $sample_patterns[] = array(
                                    'alt' => $name,
                                    'img' => $sample_patterns_url . $sample_patterns_file
                                );
                            }
                        }
                    endif;
                endif;

                ob_start();

                $ct          = wp_get_theme();
                $this->theme = $ct;
                $item_name   = $this->theme->get( 'Name' );
                $tags        = $this->theme->Tags;
                $screenshot  = $this->theme->get_screenshot();
                $class       = $screenshot ? 'has-screenshot' : '';

                $customize_title = sprintf( __( 'Customize &#8220;%s&#8221;', 'redux-framework-demo' ), $this->theme->display( 'Name' ) );

                ?>
                <div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
                    <?php if ( $screenshot ) : ?>
                        <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
                            <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize"
                               title="<?php echo esc_attr( $customize_title ); ?>">
                                <img src="<?php echo esc_url( $screenshot ); ?>"
                                     alt="<?php esc_attr_e( 'Current theme preview', 'redux-framework-demo' ); ?>"/>
                            </a>
                        <?php endif; ?>
                        <img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>"
                             alt="<?php esc_attr_e( 'Current theme preview', 'redux-framework-demo' ); ?>"/>
                    <?php endif; ?>

                    <h4><?php echo $this->theme->display( 'Name' ); ?></h4>

                    <div>
                        <ul class="theme-info">
                            <li><?php printf( __( 'By %s', 'redux-framework-demo' ), $this->theme->display( 'Author' ) ); ?></li>
                            <li><?php printf( __( 'Version %s', 'redux-framework-demo' ), $this->theme->display( 'Version' ) ); ?></li>
                            <li><?php echo '<strong>' . __( 'Tags', 'redux-framework-demo' ) . ':</strong> '; ?><?php printf( $this->theme->display( 'Tags' ) ); ?></li>
                        </ul>
                        <p class="theme-description"><?php echo $this->theme->display( 'Description' ); ?></p>
                        <?php
                            if ( $this->theme->parent() ) {
                                printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'redux-framework-demo' ) . '</p>', __( 'http://codex.wordpress.org/Child_Themes', 'redux-framework-demo' ), $this->theme->parent()->display( 'Name' ) );
                            }
                        ?>

                    </div>
                </div>

                <?php
                $item_info = ob_get_contents();

                ob_end_clean();					
					
					
				
				/*
			   if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
                    Redux_Functions::initWpFilesystem();

                    global $wp_filesystem;

                    $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
                }
					*/		

                // ACTUAL DECLARATION OF SECTIONS
				
				
				
				// Enable/Disable Sections *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Enable/Disable Sections', 'singlepro' ),
                    'desc'   => __( 'Enable or Disable theme sections.', 'singlepro' ),
                    'icon'   => 'fa fa-arrows-h',
                    'fields' => array(					
												
						
                        array(
                            'id'       => 'about_us_area',
                            'type'     => 'switch',
                            'title'    => __( 'About us section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),						
                        array(
                            'id'       => 'skill_counter',
                            'type'     => 'switch',
                            'title'    => __( 'Circle Skill Counter section', 'singlepro' ),
							'subtitle'    => __( 'This counter will appear below of the about us section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),
                        array(
                            'id'       => 'services_items',
                            'type'     => 'switch',
                            'title'    => __( 'Services section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),
                        array(
                            'id'       => 'works_counter',
                            'type'     => 'switch',
                            'title'    => __( 'Works Counter', 'singlepro' ),
							'subtitle'    => __( 'This counter will appear above of the Works section.', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),
                        array(
                            'id'       => 'portfolio_works_area',
                            'type'     => 'switch',
                            'title'    => __( 'Portfolio Section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),
                        array(
                            'id'       => 'team_area',
                            'type'     => 'switch',
                            'title'    => __( 'Team Section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),
                        array(
                            'id'       => 'pricing_area',
                            'type'     => 'switch',
                            'title'    => __( 'Pricing Table Section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),
                        array(
                            'id'       => 'from_blog_area',
                            'type'     => 'switch',
                            'title'    => __( 'Blog Section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),						
                        array(
                            'id'       => 'testimonial_area',
                            'type'     => 'switch',
                            'title'    => __( 'Testimonial Section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),						
                        array(
                            'id'       => 'clients_logo_area',
                            'type'     => 'switch',
                            'title'    => __( 'Clients Logo Section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),
                        array(
                            'id'       => 'contact_area',
                            'type'     => 'switch',
                            'title'    => __( 'Contact Section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),
                        array(
                            'id'       => 'contact_info_area',
                            'type'     => 'switch',
                            'title'    => __( 'Contact Info Section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),
                        array(
                            'id'       => 'subscribe_area',
                            'type'     => 'switch',
                            'title'    => __( 'Subscribe Section', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        )							
						
                    ),
                );					
				
				
				// General Settings *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'General Settings', 'singlepro' ),
                    'desc'   => __( 'Change general setting options like logo, favicon, footer texts, menu settings etc. <strong>Don\'t forget to like or follow us from above for getting theme updates & new releases.</strong>', 'singlepro' ),
                    'icon'   => 'fa fa-cogs',
                    'fields' => array(
											
					
                        array(
                            'id'       => 'logo_uploader',
                            'type'     => 'media',
                            'url'      => true,
                            'title'    => __( 'Logo Uploader', 'singlepro' ),
                            'desc'     => __( 'Upload your logo here. Best size for logo is 200x30', 'singlepro' ),
                        ),	
                        array(
                            'id'       => 'pre_loader',
                            'type'     => 'switch',
                            'title'    => __( 'Pre-loader', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),
                        array(
                            'id'       => 'scroll_top',
                            'type'     => 'switch',
                            'title'    => __( 'Scroll Top', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
                        ),
                        array(
                            'id'       => 'main_menu_targets',
                            'type'     => 'info',
                            'title'    => __( 'Menu Item URL Targets', 'singlepro' ),
							'desc'   => __( '<strong>Put this id\'s to menu items url field for appropriately scrolling sections while creating menu.</strong> <br/><br/>1. home = # <br/>2. about section = #about <br/>3. service section = #service <br/>4. Portfolio/works section = #works <br/>5. Team section = #team <br/>6. Pricing section = #pricing 7. Blog Section = #blog <br/>8. Testimonial section = #testimonial <br/>9. Clients logo section = #clients <br/>10. contact section = #contact', 'singlepro' ),
                        )
						
                    ),
                );		


				// Color Settings *********************************************************
				
                $this->sections[] = array(
                    'icon'   => 'fa fa-paint-brush',
                    'title'  => __( 'Theme Colors', 'singlepro' ),
					'desc'   => __( 'SinglePro supports unlimited color schemes. We know you want to present your site uniquely & that\'s why we added unlimited color schemes. Make it yours. Enjoy!.', 'singlepro' ),
                    'fields' => array(						
						
                        array(
                            'id'       => 'singlepro_theme_color',
                            'type'     => 'color',
                            'title'    => __( 'Choose your Color', 'singlepro' ),
                            'subtitle' => __( 'Select theme color. (default: #2DA2C8).', 'singlepro' ),
                            'default'  => '#2DA2C8',
                            'validate' => 'color',
                        ),						
                    )
                );					
							
								
				
				
				// About us settings *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'About us', 'singlepro' ),
                    'desc'   => __( 'Change about us informations from below like title, description & slider images.', 'singlepro' ),
                    'icon'   => 'fa fa-info',
                    'fields' => array(					
					
                        array(
                            'id'       => 'about_us_title',
                            'type'     => 'text',
                            'title'    => __( 'Title', 'singlepro' ),
                            'desc'     => __( 'Put your title here for about us section. Ex: About us.', 'singlepro' ),
                        ),
                        array(
                            'id'       => 'about_us_desc',
                            'type'     => 'textarea',
                            'title'    => __( 'Description', 'singlepro' ),
                            'desc'     => __( 'Write a description for about us section.', 'singlepro' ),
							'rows'     => '10'
                        ),					
                        array(
                            'id'       => 'about_us_gallery',
                            'type'     => 'gallery',
                            'title'    => __( 'About us slider', 'singlepro' ),
                            'desc'     => __( 'Upload your images for about us slider. Best image size 550x350.', 'singlepro' ),
                        )						
						
                    ),
                );						
				
				
				// Circular counter About us *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Circular Counter', 'singlepro' ),
                    'desc'   => __( 'Change circular counter informations like skill percentages & skill departments.', 'singlepro' ),
                    'icon'   => 'fa fa-circle-o-notch',
                    'fields' => array(					
					
                        array(
                            'id'       => 'circular_skill_counter_title',
                            'type'     => 'text',
                            'title'    => __( 'Title', 'singlepro' ),
                            'desc'     => __( 'Write your circular skill counter title here.', 'singlepro' ),
                        ),
                        array(
                            'id'       => 'circular_skill_counter1_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Counter 1', 'singlepro' ),
							'subtitle' => __( 'Add counter percentage & Skill Name here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),						
                        array(
                            'id'       => 'circular_skill_counter1_percentage',
                            'type'     => 'text',
                            'title'    => __( 'Percentage %', 'singlepro' ),
                            'desc'     => __( 'Put any percentage between 1-100. Ex: 85', 'singlepro' ),
							'required' => array( 'circular_skill_counter1_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'circular_skill_counter1_deptName',
                            'type'     => 'text',
                            'title'    => __( 'Skill Name', 'singlepro' ),
                            'desc'     => __( 'Put the skill you have with the percentage above. Ex: Wordpress', 'singlepro' ),
							'required' => array( 'circular_skill_counter1_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'circular_skill_counter2_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Counter 2', 'singlepro' ),
							'subtitle' => __( 'Add counter percentage & Skill Name here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),						
                        array(
                            'id'       => 'circular_skill_counter2_percentage',
                            'type'     => 'text',
                            'title'    => __( 'Percentage %', 'singlepro' ),
                            'desc'     => __( 'Put any percentage between 1-100. Ex: 85', 'singlepro' ),
							'required' => array( 'circular_skill_counter2_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'circular_skill_counter2_deptName',
                            'type'     => 'text',
                            'title'    => __( 'Skill Name', 'singlepro' ),
                            'desc'     => __( 'Put the skill you have with the percentage above. Ex: Wordpress', 'singlepro' ),
							'required' => array( 'circular_skill_counter2_fold', '=', '1' ),							
							'default'  => false,							
                        ),	
                        array(
                            'id'       => 'circular_skill_counter3_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Counter 3', 'singlepro' ),
							'subtitle' => __( 'Add counter percentage & Skill Name here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),						
                        array(
                            'id'       => 'circular_skill_counter3_percentage',
                            'type'     => 'text',
                            'title'    => __( 'Percentage %', 'singlepro' ),
                            'desc'     => __( 'Put any percentage between 1-100. Ex: 85', 'singlepro' ),
							'required' => array( 'circular_skill_counter3_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'circular_skill_counter3_deptName',
                            'type'     => 'text',
                            'title'    => __( 'Skill Name', 'singlepro' ),
                            'desc'     => __( 'Put the skill you have with the percentage above. Ex: Wordpress', 'singlepro' ),
							'required' => array( 'circular_skill_counter3_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'circular_skill_counter4_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Counter 4', 'singlepro' ),
							'subtitle' => __( 'Add counter percentage & Skill Name here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),						
                        array(
                            'id'       => 'circular_skill_counter4_percentage',
                            'type'     => 'text',
                            'title'    => __( 'Percentage %', 'singlepro' ),
                            'desc'     => __( 'Put any percentage between 1-100. Ex: 85', 'singlepro' ),
							'required' => array( 'circular_skill_counter4_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'circular_skill_counter4_deptName',
                            'type'     => 'text',
                            'title'    => __( 'Skill Name', 'singlepro' ),
                            'desc'     => __( 'Put the skill you have with the percentage above. Ex: Wordpress', 'singlepro' ),
							'required' => array( 'circular_skill_counter4_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'circular_skill_bg',
                            'type'     => 'media',
                            'url'      => true,
                            'title'    => __( 'Background Image', 'singlepro' ),
                            'desc'     => __( 'Upload background image for circular skill area. Best size is 1000x375', 'singlepro' ),
                        )						
						
                    ),
                );	


				// Services section *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Services', 'singlepro' ),
                    'desc'   => __( 'Add services area title & a brief description. <strong>You can add service items from the left services menu</strong>.', 'singlepro' ),
                    'icon'   => 'fa fa-server',
                    'fields' => array(						
					
                        array(
                            'id'       => 'services_title',
                            'type'     => 'text',
                            'title'    => __( 'Services section Title', 'singlepro' ),
                            'desc'     => __( 'Add your services title here.', 'singlepro' ),
                        ),	

                        array(
                            'id'       => 'services_desc',
                            'type'     => 'textarea',
                            'title'    => __( 'Services Description', 'singlepro' ),
                            'desc'     => __( 'Write a brief description about your services here.', 'singlepro' ),
                        )						
						
                    ),
                );		

				// works counter -- works section *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Works Counter', 'singlepro' ),
                    'desc'   => __( 'Change works counter informations. You can display your completed projects counts, clients or something else you want.', 'singlepro' ),
                    'icon'   => 'fa fa-square',
                    'fields' => array(					
					
                        array(
                            'id'       => 'works_skill_counter_title',
                            'type'     => 'text',
                            'title'    => __( 'Counter Title', 'singlepro' ),
                            'desc'     => __( 'Write your circular skill counter title here.', 'singlepro' ),
                        ),
						// counter 1
                        array(
                            'id'       => 'works_skill_counter1_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Counter 1', 'singlepro' ),
							'subtitle' => __( 'Add counter 1 informations here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),						
                        array(
                            'id'       => 'works_skill_counter1_icon',
                            'type'     => 'text',
                            'title'    => __( 'Icon Code', 'singlepro' ),
                            'desc'     => __( 'Put Font-Awesome icon class here without <strong>fa</strong>. Ex: fa-code. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Get icon codes</a>', 'singlepro' ),
							'required' => array( 'works_skill_counter1_fold', '=', '1' ),							
							'default'  => false,
                        ),						
                        array(
                            'id'       => 'works_skill_counter1_amount',
                            'type'     => 'text',
                            'title'    => __( 'Amount', 'singlepro' ),
                            'desc'     => __( 'Put any numeric amount. Ex: 575.', 'singlepro' ),
							'required' => array( 'works_skill_counter1_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'works_skill_counter1_deptName',
                            'type'     => 'text',
                            'title'    => __( 'Department', 'singlepro' ),
                            'desc'     => __( 'Put the counter department name here. Ex: Projects', 'singlepro' ),
							'required' => array( 'works_skill_counter1_fold', '=', '1' ),							
							'default'  => false,							
                        ),
						// counter 2
                        array(
                            'id'       => 'works_skill_counter2_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Counter 2', 'singlepro' ),
							'subtitle' => __( 'Add counter 2 informations here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),						
                        array(
                            'id'       => 'works_skill_counter2_icon',
                            'type'     => 'text',
                            'title'    => __( 'Icon', 'singlepro' ),
                            'desc'     => __( 'Put Font-Awesome icon class here without <strong>fa</strong>. Ex: fa-code. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Get icon codes</a>', 'singlepro' ),
							'required' => array( 'works_skill_counter2_fold', '=', '1' ),							
							'default'  => false,							
                        ),						
                        array(
                            'id'       => 'works_skill_counter2_amount',
                            'type'     => 'text',
                            'title'    => __( 'Amount', 'singlepro' ),
                            'desc'     => __( 'Put any numeric amount. Ex: 450.', 'singlepro' ),
							'required' => array( 'works_skill_counter2_fold', '=', '1' ),							
							'default'  => false,								
                        ),
                        array(
                            'id'       => 'works_skill_counter2_deptName',
                            'type'     => 'text',
                            'title'    => __( 'Department', 'singlepro' ),
                            'desc'     => __( 'Put the count department name here. Ex: Clients', 'singlepro' ),
							'required' => array( 'works_skill_counter2_fold', '=', '1' ),							
							'default'  => false,								
                        ),
						// counter 3
                        array(
                            'id'       => 'works_skill_counter3_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Counter 3', 'singlepro' ),
							'subtitle' => __( 'Add counter 3 informations here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),							
                        array(
                            'id'       => 'works_skill_counter3_icon',
                            'type'     => 'text',
                            'title'    => __( 'Icon', 'singlepro' ),
                            'desc'     => __( 'Put Font-Awesome icon class here without <strong>fa</strong>. Ex: fa-code. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Get icon codes</a>', 'singlepro' ),
							'required' => array( 'works_skill_counter3_fold', '=', '1' ),							
							'default'  => false,							
                        ),						
                        array(
                            'id'       => 'works_skill_counter3_amount',
                            'type'     => 'text',
                            'title'    => __( 'Amount', 'singlepro' ),
                            'desc'     => __( 'Put any numeric amount. Ex: 850.', 'singlepro' ),
							'required' => array( 'works_skill_counter3_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'works_skill_counter3_deptName',
                            'type'     => 'text',
                            'title'    => __( 'Department', 'singlepro' ),
                            'desc'     => __( 'Put the count department name here. Ex: Subscribers', 'singlepro' ),
							'required' => array( 'works_skill_counter3_fold', '=', '1' ),							
							'default'  => false,							
                        ),
						// counter 4
                        array(
                            'id'       => 'works_skill_counter4_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Counter 4', 'singlepro' ),
							'subtitle' => __( 'Add counter 4 informations here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),					
                        array(
                            'id'       => 'works_skill_counter4_icon',
                            'type'     => 'text',
                            'title'    => __( 'Icon', 'singlepro' ),
                            'desc'     => __( 'Put Font-Awesome icon class here without <strong>fa</strong>. Ex: fa-code. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Get icon codes</a>', 'singlepro' ),
							'required' => array( 'works_skill_counter4_fold', '=', '1' ),							
							'default'  => false,							
                        ),						
                        array(
                            'id'       => 'works_skill_counter4_amount',
                            'type'     => 'text',
                            'title'    => __( 'Amount', 'singlepro' ),
                            'desc'     => __( 'Put any numeric amount. Ex: 1000.', 'singlepro' ),
							'required' => array( 'works_skill_counter4_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'works_skill_counter4_deptName',
                            'type'     => 'text',
                            'title'    => __( 'Department', 'singlepro' ),
                            'desc'     => __( 'Put the count department name here. Ex: Ongoing', 'singlepro' ),
							'required' => array( 'works_skill_counter4_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'works_skill_counter_bg',
                            'type'     => 'media',
                            'url'      => true,
                            'title'    => __( 'Background Image', 'singlepro' ),
                            'desc'     => __( 'Upload background image for Works skill counter area. Best size is 1000x375', 'singlepro' ),
                        )						
						
                    ),
                );	
				
				// Portfolio  section *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Portfolio', 'singlepro' ),
                    'desc'   => __( 'Add title & description for portfolio works section. <strong>Add your portfolio items from the left menu Portfolio</strong>. ', 'singlepro' ),
                    'icon'   => 'fa fa-folder',
                    'fields' => array(					
					
                        array(
                            'id'       => 'portfolio_works_title',
                            'type'     => 'text',
                            'title'    => __( 'Title', 'singlepro' ),
                            'desc'     => __( 'Add a title for portfolio works area here.', 'singlepro' ),
                        ),
                        array(
                            'id'       => 'portfolio_works_description',
                            'type'     => 'textarea',
                            'title'    => __( 'Description', 'singlepro' ),
                            'desc'     => __( 'Add a brief description for portfolio works area here.', 'singlepro' ),
							'rows'     => '5'
                        )							
						
                    ),
                );					

				// Team section *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Team Members', 'singlepro' ),
                    'desc'   => __( 'Add a title for your team members carousel slider. <strong>Add your members from the left menu Team Members</strong>', 'singlepro' ),
                    'icon'   => 'fa fa-user-plus',
                    'fields' => array(						
					
                        array(
                            'id'       => 'team_members_title',
                            'type'     => 'text',
                            'title'    => __( 'Title', 'singlepro' ),
                            'desc'     => __( 'Add title for team members area here.', 'singlepro' ),
                        )						
						
                    ),
                );	


				// Pricing Tables section *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Pricing Tables', 'singlepro' ),
                    'desc'   => __( 'Add title & description for your pricing tables section from below. <strong>Add pricing tables from the left menu Pricing tables.</strong>', 'singlepro' ),
                    'icon'   => 'fa fa-table',
                    'fields' => array(					
					
                        array(
                            'id'       => 'pricing_table_big_title',
                            'type'     => 'text',
                            'title'    => __( 'Pricing section Title', 'singlepro' ),
                            'desc'     => __( 'Add your Pricing section title here.', 'singlepro' ),
                        ),	

                        array(
                            'id'       => 'pricing_table_desc',
                            'type'     => 'textarea',
                            'title'    => __( 'Pricing section Description', 'singlepro' ),
                            'desc'     => __( 'Write a brief description for your pricing table section', 'singlepro' ),
                        )						
						
                    ),
                );	
				
				// Blog section *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Blog Settings', 'singlepro' ),
                    'desc'   => __( 'Change your blog settings here.', 'singlepro' ),
                    'icon'   => 'fa fa-file-text-o',
                    'fields' => array(					
					
                        array(
                            'id'       => 'from_blog_big_title',
                            'type'     => 'text',
                            'title'    => __( 'From Blog section Title', 'singlepro' ),
                            'desc'     => __( 'Add title for From Blog Section on the home page.', 'singlepro' ),
                        ),	

                        array(
                            'id'       => 'from_blog_desc',
                            'type'     => 'textarea',
                            'title'    => __( 'From Blog section Description', 'singlepro' ),
                            'desc'     => __( 'Write a brief description for From Blog on the home page', 'singlepro' ),
                        ),
                        array(
                            'id'       => 'blog_archive_lint',
                            'type'     => 'text',
                            'title'    => __( 'Put Blog Archive Link', 'singlepro' ),
                            'desc'     => __( 'Display a View All link in the From Blog section on the home page.', 'singlepro' ),
                        ),						
                        array(
                            'id'       => 'blog_section_banner_title',
                            'type'     => 'text',
                            'title'    => __( 'Blog Banner Title', 'singlepro' ),
                            'desc'     => __( 'Add title for Blog Banner area which will appear in the blog archive/post/page etc.', 'singlepro' ),
                        ),

                        array(
                            'id'       => 'blog_section_banner_img',
                            'type'     => 'media',
                            'title'    => __( 'Banner Image', 'singlepro' ),
                            'desc'     => __( 'Upload banner image. best size for banner is 1250x300.', 'singlepro' ),
                        ),
                        array(
                            'id'       => 'disable_blog_banner',
                            'type'     => 'switch',
                            'title'    => __( 'Enable/Disable Blog Banner', 'singlepro' ),
                            'default'  => true,
                            'on'       => 'Enabled',
                            'off'      => 'Disable',
							'desc'     => __( '<strong>Note:</strong> You can disable the banner on blog page/post pages/pages. Banner can\'t be disabled on Category archive pages, it means when users click on any category they will see the banner.', 'singlepro' )
                        )						
						
                    ),
                );				

				
				// Testimonial section *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Testimonial', 'singlepro' ),
                    'desc'   => __( 'Add title & description for your testimonial section from below. <strong>Add testimonials from the left menu testimonials</strong>', 'singlepro' ),
                    'icon'   => 'fa fa-user-plus',
                    'fields' => array(					
					
                        array(
                            'id'       => 'testimonial_big_title',
                            'type'     => 'text',
                            'title'    => __( 'Testimonial section Title', 'singlepro' ),
                            'desc'     => __( 'Add your title here.', 'singlepro' ),
                        ),	

                        array(
                            'id'       => 'testimonial_section_desc',
                            'type'     => 'textarea',
                            'title'    => __( 'Testimonial section Description', 'singlepro' ),
                            'desc'     => __( 'Write a brief description for your testimonial section', 'singlepro' ),
                        )						
						
                    ),
                );					
				
				// Clients section *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Clients Logo', 'singlepro' ),
                    'desc'   => __( 'Add title, description & clients logos from below.', 'singlepro' ),
                    'icon'   => 'fa fa-sliders',
                    'fields' => array(						
					
                        array(
                            'id'       => 'clients_big_title',
                            'type'     => 'text',
                            'title'    => __( 'Title', 'singlepro' ),
                            'desc'     => __( 'Put a title for clients logo section. Ex: Our Clients.', 'singlepro' ),
                        ),	

                        array(
                            'id'       => 'clients_area_desc',
                            'type'     => 'textarea',
                            'title'    => __( 'Description', 'singlepro' ),
                            'desc'     => __( 'Write a brief description for your clients logo section', 'singlepro' ),
                        ),
                        array(
                            'id'       => 'clients_logo_gallery',
                            'type'     => 'gallery',
                            'title'    => __( 'Clients logos', 'singlepro' ),
                            'desc'     => __( 'Upload your clients logos here. Best logo size is 210x40.', 'singlepro' ),
                        )						
						
                    ),
                );	


				// Contact Form section *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Contact/Google Map', 'singlepro' ),
                    'desc'   => __( 'Add title, description, contact form & google map from below for contact section.', 'singlepro' ),
                    'icon'   => 'fa fa-envelope',
                    'fields' => array(					
					
                        array(
                            'id'       => 'contact_area_title',
                            'type'     => 'text',
                            'title'    => __( 'Title', 'singlepro' ),
                            'desc'     => __( 'Put a title for contact section. Ex: Contact us.', 'singlepro' ),
                        ),	

                        array(
                            'id'       => 'contact_area_desc',
                            'type'     => 'textarea',
                            'title'    => __( 'Description', 'singlepro' ),
                            'desc'     => __( 'Write a brief description for contact section', 'singlepro' ),
                        ),
                        array(
                            'id'       => 'contact_form_shortcode',
                            'type'     => 'text',
                            'title'    => __( 'Contact Form Shortcode', 'singlepro' ),
                            'desc'     => __( 'Put your <strong>contact form 7</strong> shortcode here.', 'singlepro' ),
                        ),						
                        array(
                            'id'       => 'google_map_code',
                            'type'     => 'textarea',
                            'title'    => __( 'Google Map', 'singlepro' ),
                            'desc'     => __( 'Put your entire google map embed code here.', 'singlepro' ),
                        )						
                    ),
                );	


				// Contact Info section *********************************************************
                $this->sections[] = array(
                    'title'  => __( 'Contact Info', 'singlepro' ),
                    'desc'   => __( 'Add your contact informations here like phone number, email, office location, working hours etc.', 'singlepro' ),
                    'icon'   => 'fa fa-info-circle',
                    'fields' => array(					
					
						// contact info box 1
					   array(
                            'id'       => 'contact_info1_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Info Box 1', 'singlepro' ),
							'subtitle' => __( 'Add your contact info here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),							
                        array(
                            'id'       => 'contact_info_icon1',
                            'type'     => 'text',
                            'title'    => __( 'Icon', 'singlepro' ),
                            'desc'     => __( 'Put Font-Awesome (v4.3.0) icon class here without <strong>fa</strong>. Ex: fa-envelope. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Get icon codes</a>', 'singlepro' ),
							'required' => array( 'contact_info1_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'contact_info_title1',
                            'type'     => 'text',
                            'title'    => __( 'Title', 'singlepro' ),
                            'desc'     => __( 'Put a title for this box. Note: If you don\'t put title then this box will not appear.', 'singlepro' ),
							'required' => array( 'contact_info1_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'contact_info_1',
                            'type'     => 'text',
                            'title'    => __( 'Phone number/Email/Address', 'singlepro' ),
                            'desc'     => __( 'Put your contact number or email or address or working hours etc.', 'singlepro' ),
							'required' => array( 'contact_info1_fold', '=', '1' ),							
							'default'  => false,							
                        ),
						// contact info box 2
					   array(
                            'id'       => 'contact_info2_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Info Box 2', 'singlepro' ),
							'subtitle' => __( 'Add your contact info here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),							
                        array(
                            'id'       => 'contact_info_icon2',
                            'type'     => 'text',
                            'title'    => __( 'Icon', 'singlepro' ),
                            'desc'     => __( 'Put Font-Awesome (v4.3.0) icon class here without <strong>fa</strong>. Ex: fa-envelope. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Get icon codes</a>', 'singlepro' ),
							'required' => array( 'contact_info2_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'contact_info_title2',
                            'type'     => 'text',
                            'title'    => __( 'Title', 'singlepro' ),
                            'desc'     => __( 'Put a title for this box. Note: If you don\'t put title then this box will not appear.', 'singlepro' ),
							'required' => array( 'contact_info2_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'contact_info_2',
                            'type'     => 'text',
                            'title'    => __( 'Phone number/Email/Address', 'singlepro' ),
                            'desc'     => __( 'Put your contact number or email or address or working hours etc.', 'singlepro' ),
							'required' => array( 'contact_info2_fold', '=', '1' ),							
							'default'  => false,							
                        ),							
						// contact info box 3
					   array(
                            'id'       => 'contact_info3_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Info Box 3', 'singlepro' ),
							'subtitle' => __( 'Add your contact info here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),							
                        array(
                            'id'       => 'contact_info_icon3',
                            'type'     => 'text',
                            'title'    => __( 'Icon', 'singlepro' ),
                            'desc'     => __( 'Put Font-Awesome (v4.3.0) icon class here without <strong>fa</strong>. Ex: fa-envelope. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Get icon codes</a>', 'singlepro' ),
							'required' => array( 'contact_info3_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'contact_info_title3',
                            'type'     => 'text',
                            'title'    => __( 'Title', 'singlepro' ),
                            'desc'     => __( 'Put a title for this box. Note: If you don\'t put title then this box will not appear.', 'singlepro' ),
							'required' => array( 'contact_info3_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'contact_info_3',
                            'type'     => 'text',
                            'title'    => __( 'Phone number/Email/Address', 'singlepro' ),
                            'desc'     => __( 'Put your contact number or email or address or working hours etc.', 'singlepro' ),
							'required' => array( 'contact_info3_fold', '=', '1' ),							
							'default'  => false,							
                        ),	

						// contact info box 4
					   array(
                            'id'       => 'contact_info4_fold',
                            'type'     => 'switch',
                            'title'    => __( 'Info Box 4', 'singlepro' ),
							'subtitle' => __( 'Add your contact info here.', 'singlepro' ),
                            'default'  => 0,
                            'on'       => 'Show',
                            'off'      => 'Hide',
                        ),							
                        array(
                            'id'       => 'contact_info_icon4',
                            'type'     => 'text',
                            'title'    => __( 'Icon', 'singlepro' ),
                            'desc'     => __( 'Put Font-Awesome (v4.3.0) icon class here without <strong>fa</strong>. Ex: fa-envelope. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Get icon codes</a>', 'singlepro' ),
							'required' => array( 'contact_info4_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'contact_info_title4',
                            'type'     => 'text',
                            'title'    => __( 'Title', 'singlepro' ),
                            'desc'     => __( 'Put a title for this box. Note: If you don\'t put title then this box will not appear.', 'singlepro' ),
							'required' => array( 'contact_info4_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'contact_info_4',
                            'type'     => 'text',
                            'title'    => __( 'Phone number/Email/Address', 'singlepro' ),
                            'desc'     => __( 'Put your contact number or email or address or working hours etc.', 'singlepro' ),
							'required' => array( 'contact_info4_fold', '=', '1' ),							
							'default'  => false,							
                        ),
                        array(
                            'id'       => 'contact_info_area_bg',
                            'type'     => 'media',
                            'url'      => true,
                            'title'    => __( 'Background Image', 'singlepro' ),
                            'desc'     => __( 'Upload background image for contact info area. Best size is 1000x375', 'singlepro' ),
                        )							
						
                    ),
                );
				
				// Subscribe Settings *********************************************************

                $this->sections[] = array(
                    'icon'   => 'fa fa-share',
                    'title'  => __( 'Subscribe Section', 'singlepro' ),
					'desc'     => __( 'Put your subscription details below like title, description & mailchimp settings etc.', 'singlepro' ),
                    'fields' => array(					
										
                        array(
                            'id'       => 'subscribe_title',
                            'type'     => 'text',
                            'title'    => __( 'Title', 'singlepro' ),
                            'desc'     => __( 'Put a title for subscription area.', 'singlepro' ),
                        ),						
					
                        array(
                            'id'       => 'subscribe_desc',
                            'type'     => 'textarea',
                            'title'    => __( 'Description', 'singlepro' ),
                            'desc'     => __( 'Put a brief description for subscription area.', 'singlepro' ),
							'rows'     => '5'
                        ),
                        array(
                            'id'       => 'mailchimp_shortcode',
                            'type'     => 'text',
                            'title'    => __( 'Mailchimp Shortcode', 'singlepro' ),
                            'desc'     => __( 'Put your mailchimp shortcode here. You can generate mailchimp shortcodes from <strong>Setting > Mailchimp</strong>.', 'singlepro' )
                        )						
							
                    )
                );

				// Footer section Settings *********************************************************

                $this->sections[] = array(
                    'icon'   => 'fa fa-share-alt',
                    'title'  => __( 'Footer Section', 'singlepro' ),
                    'fields' => array(						
						
                        array(
                            'id'       => 'footer_copyright_text',
                            'type'     => 'text',
                            'title'    => __( 'Footer Text', 'singlepro' ),
                            'desc'     => __( 'Put your footer text here.', 'singlepro' ),
                        ),
                        array(
                            'id'    => 'social_buttons_msg',
                            'type'  => 'info',
                            'style' => 'success',
                            'icon'  => 'el-icon-info-sign',
                            'title' => __( 'Social Settings', 'singlepro' ),
                            'desc'  => __( 'Put your social links below.', 'singlepro' )
                        ),						
                        array(
                            'id'       => 'social_fb',
                            'type'     => 'text',
                            'title'    => __( 'Facebook', 'singlepro' ),
                            'desc'     => __( 'Put your Facebook page url here.', 'singlepro' ),
                        ),						
					
                        array(
                            'id'       => 'social_twitter',
                            'type'     => 'text',
                            'title'    => __( 'Twitter', 'singlepro' ),
                            'desc'     => __( 'Put your Twitter url here.', 'singlepro' ),
                        ),	
                        array(
                            'id'       => 'social_google',
                            'type'     => 'text',
                            'title'    => __( 'Google+', 'singlepro' ),
                            'desc'     => __( 'Put your Google+ url here.', 'singlepro' ),
                        ),
                        array(
                            'id'       => 'social_linkedin',
                            'type'     => 'text',
                            'title'    => __( 'LinkedIn', 'singlepro' ),
                            'desc'     => __( 'Put your LinkedIn url here.', 'singlepro' ),
                        )						
							
                    )
                );	
				
				// Documentation section Settings *********************************************************

                $this->sections[] = array(
                    'icon'   => 'fa fa-file-archive-o',
                    'title'  => __( 'Documentation', 'singlepro' ),
                    'fields' => array(					
						
                        array(
                            'id'       => 'documentation_info',
                            'type'     => 'info',
                            'title'    => __( 'Video Documentation', 'singlepro' ),
                            'desc'     => __( 'Visit SinglePro theme page for <a href="http://www.wpfreeware.com/singlepro-free-bootstrap-one-page-business-portfolio-theme/#video_docs" target="_blank">Video Documentation</a>', 'singlepro' ),
                        )					
							
                    )
                );					


				// theme information
                $this->sections[] = array(
                    'icon'   => 'fa fa-hand-o-right',
                    'title'  => __( 'Theme Information', 'singlepro' ),
                    'desc'   => __( '<p class="description">Theme details are available here.</p>', 'singlepro' ),
                    'fields' => array(	
						
                        array(
                            'id'      => 'opt-raw-info',
                            'type'    => 'raw',
                            'content' => $item_info,
                        )
                    ),
                );		
								
											
			
				// export/import
                $this->sections[] = array(
                    'title'  => __( 'Import / Export', 'singlepro' ),
                    'desc'   => __( 'Import and Export your settings from file, text or URL.', 'singlepro' ),
                    'icon'   => 'fa fa-download',
                    'fields' => array(
					
                        array(
                            'id'         => 'import_export_settings',
                            'type'       => 'import_export',
                            'title'      => 'Import Export',
                            'subtitle'   => 'Save and restore your options settings',
                            'full_width' => false,
                        ),
                    ),
                );


            }

            public function setHelpTabs() {

                // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-1',
                    'title'   => __( 'Theme Information 1', 'singlepro' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'singlepro' )
                );

                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-2',
                    'title'   => __( 'Theme Information 2', 'singlepro' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'singlepro' )
                );

                // Set the help sidebar
                $this->args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'singlepro' );
            }

            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'             => 'singlepro_options',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'      => __(' | ') . $theme->get('Description'),
                    // Name that appears at the top of your panel
                    'display_version'      => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'            => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'       => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'           => __( 'SinglePro', 'singlepro' ),
                    'page_title'           => __( 'SinglePro', 'singlepro' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'       => '',
                    // Set it you want google fonts to update weekly. A google_api_key value is required.
                    'google_update_weekly' => false,
                    // Must be defined to add google fonts to the typography module
                    'async_typography'     => true,
                    // Use a asynchronous font on the front end or font string
                    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                    'admin_bar'            => true,
                    // Show the panel pages on the admin bar
                    //'menu_icon'         => get_template_directory_uri().'/img/infinity.svg',              
                    // Choose an icon for the admin bar menu
                    'admin_bar_priority' => 50,
                    // Choose an priority for the admin bar menu
                    'global_variable'      => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'             => false,
                    // Show the time the page took to load, etc
                    //'update_notice'        => true,
                    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                    'customizer'           => true,
                    // Enable basic customizer support
                    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                    // OPTIONAL -> Give you extra features
                    'page_priority'        => null,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'          => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'     => 'manage_options',
                    // Permissions needed to access the options panel.
                    //'menu_icon'            => get_template_directory_uri().'/img/logo/wpf-favicon.png', // this is menu icon
                    // Specify a custom URL to an icon
                    'last_tab'             => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'            => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'            => '_options',
                    // Page slug used to denote the panel
                    'save_defaults'        => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'         => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'         => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export'   => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'       => 60 * MINUTE_IN_SECONDS,
                    'output'               => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'           => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'             => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'          => false,
                    // REMOVE

                    // HINTS
                    'hints'                => array(
                        'icon'          => 'icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );

				/*
                // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
                $this->args['admin_bar_links'][] = array(
                    'id'    => 'redux-docs',
                    'href'   => 'http://docs.reduxframework.com/',
                    'title' => __( 'Documentation', 'redux-framework-demo' ),
                );

                $this->args['admin_bar_links'][] = array(
                    //'id'    => 'redux-support',
                    'href'   => 'https://github.com/ReduxFramework/redux-framework/issues',
                    'title' => __( 'Support', 'redux-framework-demo' ),
                );

                $this->args['admin_bar_links'][] = array(
                    'id'    => 'redux-extensions',
                    'href'   => 'reduxframework.com/extensions',
                    'title' => __( 'Extensions', 'redux-framework-demo' ),
                );

                // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
                $this->args['share_icons'][] = array(
                    'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
                    'title' => 'Visit us on GitHub',
                    'icon'  => 'el-icon-github'
                    //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
                );
                $this->args['share_icons'][] = array(
                    'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                    'title' => 'Like us on Facebook',
                    'icon'  => 'el-icon-facebook'
                );
                $this->args['share_icons'][] = array(
                    'url'   => 'http://twitter.com/reduxframework',
                    'title' => 'Follow us on Twitter',
                    'icon'  => 'el-icon-twitter'
                );
                $this->args['share_icons'][] = array(
                    'url'   => 'http://www.linkedin.com/company/redux-framework',
                    'title' => 'Find us on LinkedIn',
                    'icon'  => 'el-icon-linkedin'
                );
				
				*/

				/*
                // Panel Intro text -> before the form
                if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
                    if ( ! empty( $this->args['global_variable'] ) ) {
                        $v = $this->args['global_variable'];
                    } else {
                        $v = str_replace( '-', '_', $this->args['opt_name'] );
                    }
                    $this->args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
                } else {
                    $this->args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
                }

                // Add content after the form.
                $this->args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );
				
				*/
            }

            public function validate_callback_function( $field, $value, $existing_value ) {
                $error = true;
                $value = 'just testing';

                /*
              do your validation

              if(something) {
                $value = $value;
              } elseif(something else) {
                $error = true;
                $value = $existing_value;
                
              }
             */

                $return['value'] = $value;
                $field['msg']    = 'your custom error message';
                if ( $error == true ) {
                    $return['error'] = $field;
                }

                return $return;
            }

            public function class_field_callback( $field, $value ) {
                print_r( $field );
                echo '<br/>CLASS CALLBACK';
                print_r( $value );
            }

        }

        global $reduxConfig;
        $reduxConfig = new Redux_Framework_sample_config();
    } else {
        echo "The class named Redux_Framework_sample_config has already been called. <strong>Developers, you need to prefix this class with your company name or you'll run into problems!</strong>";
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ):
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    endif;

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ):
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error = true;
            $value = 'just testing';

            /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            
          }
         */

            $return['value'] = $value;
            $field['msg']    = 'your custom error message';
            if ( $error == true ) {
                $return['error'] = $field;
            }

            return $return;
        }
    endif;
