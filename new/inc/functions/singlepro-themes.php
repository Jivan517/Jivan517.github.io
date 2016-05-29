<?php 

add_action('wp_head', 'singlepro_theme_colors');
function singlepro_theme_colors() {
	
    global $singlepro_options; if(!empty($singlepro_options['singlepro_theme_color'])) { 
			// $singlepro_options['singlepro_theme_color']
			
	$theme_colors = '<style type="text/css">
	
/*Filterable plugin custom style start*/

ul#cnFilterOptions li{border: 1px solid '.$singlepro_options['singlepro_theme_color'].' !important;}
ul#cnFilterOptions li.active a{background-color:#ffffff !important;}
ul#cnFilterOptions li a,.mfp-close-btn-in .mfp-close:hover,.mfp-close-btn-in .mfp-close:active,.mfp-close-btn-in .mfp-close:focus{background-color: '.$singlepro_options['singlepro_theme_color'].' !important;}
ul#cnFilterOptions li a:hover{border: '.$singlepro_options['singlepro_theme_color'].' !important; color:#000;}


/*Filterable plugin custom style start*/

.scrollToTop {
	background-color: '.$singlepro_options['singlepro_theme_color'].' !important;
}
.scrollToTop:hover,.scrollToTop:focus{
  background-color: #fff;
  color: '.$singlepro_options['singlepro_theme_color'].';
  border: 1px solid '.$singlepro_options['singlepro_theme_color'].';
}
.navbar-brand > span {
  color: '.$singlepro_options['singlepro_theme_color'].';
}

.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus, #menu-blog-menu li.current-menu-item > a { 
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.pagination .active{background: '.$singlepro_options['singlepro_theme_color'].'; color:#fff;}
.navbar-default .navbar-nav > li > a:hover{
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.slider_btn:hover,.slider_btn:focus{
	border-color:'.$singlepro_options['singlepro_theme_color'].';
	color: '.$singlepro_options['singlepro_theme_color'].';
}
.slides-navigation a::before,
.slides-navigation a::after,
.slides-navigation .icon-wrap::before,
.slides-navigation .icon-wrap::after, #cnnav > a.activeSlide {
	background: '.$singlepro_options['singlepro_theme_color'].';
}
.slides-pagination a {
  border: 2px solid '.$singlepro_options['singlepro_theme_color'].';
}
.heading h2 {
  border-bottom: 11px solid '.$singlepro_options['singlepro_theme_color'].';
}
.panel-title a:hover{
	color: '.$singlepro_options['singlepro_theme_color'].';		
}
.panel-title a span{
  color: '.$singlepro_options['singlepro_theme_color'].';		
}
.service_icon{
	background-color: '.$singlepro_options['singlepro_theme_color'].';
}

.single_service:hover .service_icon{	
	color: '.$singlepro_options['singlepro_theme_color'].';
	border: 2px solid '.$singlepro_options['singlepro_theme_color'].';
	background-color: #fff;
}
.single_service:hover .service_title{
	color: '.$singlepro_options['singlepro_theme_color'].';
}
.single_service > .service_title:after {
  background-color: '.$singlepro_options['singlepro_theme_color'].';
}
.heading h3 {
  border-bottom: 5px solid '.$singlepro_options['singlepro_theme_color'].';
}
.fa-2x {
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.single_team span {
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.team_social a:hover,.team_social a:focus{
	background-color: '.$singlepro_options['singlepro_theme_color'].';
}
.slick-prev, .slick-next {
  background-color: '.$singlepro_options['singlepro_theme_color'].';
}
.single_price .price {
  background-color: '.$singlepro_options['singlepro_theme_color'].'; 
}
.price_btn {
  background-color: '.$singlepro_options['singlepro_theme_color'].';
  border: 1px solid '.$singlepro_options['singlepro_theme_color'].';
}
.price_btn:hover{
	color: '.$singlepro_options['singlepro_theme_color'].' !important;
}
.business_price {
  background-color: '.$singlepro_options['singlepro_theme_color'].' !important;
}
.business_price .price_btn{	
	color: '.$singlepro_options['singlepro_theme_color'].' !important;
}
.post_commentbox a:hover, .post_commentbox span:hover{
	color: '.$singlepro_options['singlepro_theme_color'].';
}
.read_more, .read_more:hover{
	color: '.$singlepro_options['singlepro_theme_color'].';	
}
.read_more:hover,.read_more:focus{
	border-bottom: 2px solid '.$singlepro_options['singlepro_theme_color'].';
}
.testi_media .media-body span {
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.testimonial_slider .slick-dots li.slick-active button{
  background: none repeat scroll 0 0 '.$singlepro_options['singlepro_theme_color'].';  
}
.submit_btn,.wpcf7-submit {
  background-color: '.$singlepro_options['singlepro_theme_color'].';
}
.submit_btn:hover,.wpcf7-submit:hover{
	color: '.$singlepro_options['singlepro_theme_color'].';
	border-color: '.$singlepro_options['singlepro_theme_color'].';
}
.form-control:focus {
  border-color: '.$singlepro_options['singlepro_theme_color'].';
}
.wagwep-container ul#portfolio-filter a:hover{
  background-color: '.$singlepro_options['singlepro_theme_color'].';
}
.wagwep-container ul#portfolio-filter li.current a {
  background-color:transparent;   
}
.wagwep-container ul#portfolio-filter li.current a:focus{
  background-color: '.$singlepro_options['singlepro_theme_color'].'
}
.single_contact_feaured > i {
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.subscr_btn {
  background-color: '.$singlepro_options['singlepro_theme_color'].';
}
.footer_left > p a {
  color: '.$singlepro_options['singlepro_theme_color'].';
  font-weight: bold;
}
.social_nav li a:hover{
  color: '.$singlepro_options['singlepro_theme_color'].';
  border-color: '.$singlepro_options['singlepro_theme_color'].'; 
}
.panel-default .in{
  border-color: '.$singlepro_options['singlepro_theme_color'].';
  border-left: 5px solid '.$singlepro_options['singlepro_theme_color'].';
}
.about_slider .slick-dots li.slick-active button:before {
  color: '.$singlepro_options['singlepro_theme_color'].';
}

<!--==========/////////////////////
 update css for V1.3 
===============////////////////-->

.single_blogsidebar > h2 {
  border-bottom: 4px solid '.$singlepro_options['singlepro_theme_color'].';
}
.popular_tab .media-body > a:hover,.popular_tab .media-body > a:focus{
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.cat-item>a:before{
  border-left: 5px solid '.$singlepro_options['singlepro_theme_color'].';
}
.cat-item a:hover,.cat-item a:focus{
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.tagcloud a:hover,.tagcloud a:focus{  
  background-color: '.$singlepro_options['singlepro_theme_color'].';
}

.single_blogsidebar ul li a:hover,.single_blogsidebar ul li a:focus{
  color: '.$singlepro_options['singlepro_theme_color'].';  
}
.pagination li a:hover,.pagination li a:focus{
  background-color: '.$singlepro_options['singlepro_theme_color'].';
}
.blogdetails_content>h2{
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.blogdetails_content>ul li:before {  
  background-color: '.$singlepro_options['singlepro_theme_color'].';
}  
.previous_nav {
  border: 1px solid '.$singlepro_options['singlepro_theme_color'].';
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.next_nav { 
  border: 1px solid '.$singlepro_options['singlepro_theme_color'].';
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.next_nav:hover,.previous_nav:hover{
  background-color: '.$singlepro_options['singlepro_theme_color'].';
}
.similar_post h2 > i {
  color: '.$singlepro_options['singlepro_theme_color'].';
}
.sociallink_nav li a:hover{
  color: '.$singlepro_options['singlepro_theme_color'].';
  border: 1px solid '.$singlepro_options['singlepro_theme_color'].';
}	

	
					</style>';
		 
	 echo $theme_colors;			
			
			
			
			
	 } else { 
		echo '<link href="'.get_template_directory_uri() .'/css/default-theme.css" rel="stylesheet" media="screen">';
	 } 	
	
}


?>