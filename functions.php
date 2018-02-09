<?php

define('KRATOS_VERSION','2.5.8');

require_once(get_template_directory().'/inc/shortcode.php');
require_once(get_template_directory().'/inc/imgcfg.php');
require_once(get_template_directory().'/inc/post.php');
require_once(get_template_directory().'/inc/smtp.php');
require_once(get_template_directory().'/inc/widgets.php');

//Replace Gravatar server
function kratos_get_avatar($avatar) {
    $avatar = str_replace(array('www.gravatar.com','0.gravatar.com','1.gravatar.com','2.gravatar.com','3.gravatar.com','secure.gravatar.com'),'cn.gravatar.com',$avatar);
    return $avatar;
}
add_filter('get_avatar','kratos_get_avatar');

//Disable automatic formatting
function my_formatter($content) {
    $new_content = '';
    $pattern_full = '{(\[raw\].*?\[/raw\])}is';
    $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
    $pieces = preg_split($pattern_full,$content,-1,PREG_SPLIT_DELIM_CAPTURE);
foreach ($pieces as $piece) {
    if(preg_match($pattern_contents,$piece,$matches)) {
        $new_content .= $matches[1];
    } else {
        $new_content .= wptexturize(wpautop($piece));
    }
}
    return $new_content;
}
remove_filter('the_content','wpautop');
remove_filter('the_content','wptexturize');
add_filter('the_content','my_formatter',99);

//Load scripts
function kratos_theme_scripts() {  
    $dir = get_template_directory_uri();
    if(!is_admin()) {
        wp_enqueue_style('animate',$dir.'/css/animate.min.css',array(), '3.5.1'); 
        wp_enqueue_style('awesome',$dir.'/css/font-awesome.min.css',array(),'4.7.1');
        wp_enqueue_style('bootstrap',$dir.'/css/bootstrap.min.css',array(),'3.3.7');
        wp_enqueue_style('superfish',$dir.'/css/superfish.min.css',array(),'r7');
        wp_enqueue_style('layer',$dir.'/css/layer.min.css',array(),'3.1.0');
        wp_enqueue_style('kratos',$dir.'/css/kratos.min.css',array(),KRATOS_VERSION);
        wp_enqueue_script('jquery',$dir.'/js/jquery.min.js',array(),'2.1.4');
        wp_enqueue_script('easing',$dir.'/js/jquery.easing.min.js',array(), '1.3.0'); 
        wp_enqueue_script('layer',$dir.'/js/layer.min.js',array(),'3.1.0');
        wp_enqueue_script('bootstrap',$dir.'/js/bootstrap.min.js',array(),'3.3.7');
        wp_enqueue_script('waypoints',$dir.'/js/jquery.waypoints.min.js',array(),'4.0.0');
        wp_enqueue_script('stellar',$dir.'/js/jquery.stellar.min.js',array(),'0.6.2');
        wp_enqueue_script('hoverIntents',$dir.'/js/hoverIntent.min.js',array(),'r7');
        wp_enqueue_script('superfish',$dir.'/js/superfish.js',array(),'1.0.0');
        wp_enqueue_script('kratos',$dir.'/js/kratos.js',array(),KRATOS_VERSION);
    }
    if(comments_open()&&is_single()||is_page()) wp_enqueue_script('OwO',$dir.'/js/OwO.min.js',array(),'1.0.1');
    $d2kratos = array(
         'thome'=> get_stylesheet_directory_uri(),
         'ctime'=> kratos_option('createtime'),
        'donate'=> kratos_option('paytext_head'),
          'scan'=> kratos_option('paytext'),
        'alipay'=> kratos_option('alipayqr_url'),
        'wechat'=> kratos_option('wechatpayqr_url')
    );
    wp_localize_script('kratos','xb',$d2kratos);
}
add_action('wp_enqueue_scripts','kratos_theme_scripts');

//Remove the head code
remove_action('wp_head','wp_print_head_scripts',9);
remove_action('wp_head','wp_generator');
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head','index_rel_link');
remove_action('wp_head','parent_post_rel_link',10,0);
remove_action('wp_head','start_post_rel_link',10,0);
remove_action('wp_head','adjacent_posts_rel_link_wp_head',10,0);
remove_action('wp_head','rel_canonical');
remove_action('wp_head','feed_links',2);
remove_action('wp_head','feed_links_extra',3);
remove_action('admin_print_scripts','print_emoji_detection_script');
remove_action('admin_print_styles','print_emoji_styles');
remove_action('wp_head','print_emoji_detection_script',7);
remove_action('wp_print_styles','print_emoji_styles');
remove_action('embed_head','print_emoji_detection_script');
remove_filter('the_content','wptexturize'); 
remove_filter('the_content_feed','wp_staticize_emoji');
remove_filter('comment_text_rss','wp_staticize_emoji');
remove_filter('wp_mail','wp_staticize_emoji_for_email');
add_filter('emoji_svg_url','__return_false');
add_filter('show_admin_bar','__return_false');
add_action('wp_enqueue_scripts','mt_enqueue_scripts',1);
function mt_enqueue_scripts() {wp_deregister_script('jquery');}

//Prohibit character escaping
$qmr_work_tags = array('the_title','the_excerpt','single_post_title','comment_author','comment_text','link_description','bloginfo','wp_title','term_description','category_description','widget_title','widget_text');
foreach ($qmr_work_tags as $qmr_work_tag) {remove_filter ($qmr_work_tag,'wptexturize');}
remove_filter('the_content','wptexturize');

//Add the page html
add_action('init','html_page_permalink',-1);
function html_page_permalink() {
    if(kratos_option('page_html')==1){
        global $wp_rewrite;
        if(!strpos($wp_rewrite->get_page_permastruct(),'.html')){
            $wp_rewrite->page_structure = $wp_rewrite->page_structure.'.html';
        }
    }
}

//Support webp upload
add_filter('upload_mimes','kratos_upload_webp');
function kratos_upload_webp ($existing_mimes=array()) {
  $existing_mimes['webp']='image/webp';
  return $existing_mimes;
}

//Remove the revision
remove_action('post_updated','wp_save_post_revision');

//Short code
remove_filter('the_content','wpautop');
add_filter('the_content','wpautop',12);

//Link manager
add_filter('pre_option_link_manager_enabled','__return_true');

//Init theme
add_action('load-themes.php','Init_theme');
function Init_theme() {
  global $pagenow;
  if('themes.php'==$pagenow&&isset($_GET['activated'])) {
    wp_redirect(admin_url('themes.php?page=kratos'));
    exit;
  }
}

//Remove the excess CSS selectors
add_filter('nav_menu_css_class','my_css_attributes_filter',100,1);
add_filter('nav_menu_item_id','my_css_attributes_filter',100,1);
add_filter('page_css_class','my_css_attributes_filter',100,1);
function my_css_attributes_filter($var) {return is_array($var)?array_intersect($var,array('current-menu-item','current-post-ancestor','current-menu-ancestor','current-menu-parent')):'';}

//The article heat
function most_comm_posts($days=30,$nums=5) {
    global $wpdb;
    date_default_timezone_set("PRC");
    $today = date("Y-m-d H:i:s");
    $daysago = date("Y-m-d H:i:s",strtotime($today)-($days*24*60*60));
    $result = $wpdb->get_results("SELECT comment_count,ID,post_title,post_date FROM $wpdb->posts WHERE post_date BETWEEN '$daysago' AND '$today' and post_type='post' and post_status='publish' ORDER BY comment_count DESC LIMIT 0 ,$nums");
    $output = '';
    if(empty($result)) {
        $output = '<li>暂时没有数据</li>';
    } else {
        foreach ($result as $topten) {
            $postid = $topten->ID;
            $title = $topten->post_title;
            $commentcount = $topten->comment_count;
            if($commentcount>=0) {
                $output .= '<a class="list-group-item visible-lg" title="'.$title.'" href="'.get_permalink($postid).'" rel="bookmark"><i class="fa  fa-book"></i> ';
                    $output .= strip_tags($title);
                $output .= '</a>';
                $output .= '<a class="list-group-item visible-md" title="'.$title.'" href="'.get_permalink($postid).'" rel="bookmark"><i class="fa  fa-book"></i> ';
                    $output .= strip_tags($title);
                $output .= '</a>';
            }
        }
    }
    echo $output;
}

//Add article type
add_theme_support('post-formats',array('gallery','video'));

//Keywords Description set
function kratos_keywords(){
    if(is_home()||is_front_page()){echo kratos_option('site_keywords');}
    elseif(is_category()){single_cat_title();}
    elseif(is_single()){
        echo trim(wp_title('',FALSE)).',';
        if(has_tag()){foreach((get_the_tags()) as $tag) {echo $tag->name.',';}}
        foreach((get_the_category()) as $category) {echo $category->cat_name.',';} 
    }
    elseif(is_search()){the_search_query();}
    else{echo trim(wp_title('',FALSE));}
}
function kratos_description(){
    if(is_home()||is_front_page()){echo trim(kratos_option('site_description'));}
    elseif(is_category()){$description = strip_tags(category_description());echo trim($description);}
    elseif(is_single()){ 
        if(get_the_excerpt()){echo get_the_excerpt();}
        else{global $post;$description = trim(str_replace(array("\r\n","\r","\n","　"," ")," ",str_replace("\"","'",strip_tags($post->post_content ))));echo mb_substr($description,0,220,'utf-8');}
    }
    elseif(is_search()){echo '“';the_search_query();echo '”为您找到结果 ';global $wp_query;echo $wp_query->found_posts;echo ' 个';}
    elseif(is_tag()){$description = strip_tags(tag_description());echo trim($description);}
    else{$description = strip_tags(term_description());echo trim($description);}
}

//Article outside chain optimization
function imgnofollow($content) {
    $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>";
    if(preg_match_all("/$regexp/siU",$content,$matches,PREG_SET_ORDER)){
        if(!empty($matches)){
            $srcUrl = get_option('siteurl');
            for ($i=0;$i<count($matches);$i++){
                $tag = $matches[$i][0];
                $tag2 = $matches[$i][0];
                $url = $matches[$i][0];
                $noFollow = '';
                $pattern = '/target\s*=\s*"\s*_blank\s*"/';
                preg_match($pattern,$tag2,$match,PREG_OFFSET_CAPTURE);
                if(count($match)<1) $noFollow .= ' target="_blank" ';
                $pattern = '/rel\s*=\s*"\s*[n|d]ofollow\s*"/';
                preg_match($pattern, $tag2, $match, PREG_OFFSET_CAPTURE);
                if(count($match)<1) $noFollow .= ' rel="nofollow" ';
                $pos = strpos($url,$srcUrl);
                if($pos===false){
                    $tag = rtrim ($tag,'>');
                    $tag .= $noFollow.'>';
                    $content = str_replace($tag2,$tag,$content);
                }
            }
        }
    }
    $content = str_replace(']]>',']]>',$content);
    return $content;
}
add_filter('the_content','imgnofollow');

//The title set
function kratos_wp_title($title,$sep) {
    global $paged,$page;
    if(is_feed()) return $title;
    $title .= get_bloginfo('name');
    $site_description = get_bloginfo('description','display');
    if($site_description&&(is_home()||is_front_page())) $title = "$title $sep $site_description";
    if($paged>=2||$page>=2) $title = "$title $sep " . sprintf(__('Page %s','kratos'),max($paged,$page));
    return $title;
}
add_filter('wp_title','kratos_wp_title',10,2);

//The admin control module
if(!function_exists('optionsframework_init')){
    define('OPTIONS_FRAMEWORK_DIRECTORY',get_template_directory_uri().'/inc/theme-options/');
    require_once dirname(__FILE__).'/inc/theme-options/options-framework.php';
    $optionsfile = locate_template('options.php');
    load_template($optionsfile);
}
function kratos_options_menu_filter($menu) {
  $menu['mode'] = 'menu';
  $menu['page_title'] = '主题设置';
  $menu['menu_title'] = '主题设置';
  $menu['menu_slug'] = 'kratos';
  return $menu;
}
add_filter('optionsframework_menu','kratos_options_menu_filter');

//The menu navigation registration
function kratos_register_nav_menu() {
        register_nav_menus(array('header_menu' => '顶部菜单'));
    }
add_action('after_setup_theme','kratos_register_nav_menu');

//Highlighting the active menu
function kratos_active_menu_class($classes) {
    if(in_array('current-menu-item',$classes) OR in_array('current-menu-ancestor',$classes)) $classes[] = 'active';
    return $classes;
}
add_filter('nav_menu_css_class','kratos_active_menu_class');

//More users' info
function get_client_ip() {
    if(getenv("HTTP_CLIENT_IP")&&strcasecmp(getenv("HTTP_CLIENT_IP"),"unknown")) $ip = getenv("HTTP_CLIENT_IP");
    elseif(getenv("HTTP_X_FORWARDED_FOR")&&strcasecmp(getenv("HTTP_X_FORWARDED_FOR"),"unknown")) $ip = getenv("HTTP_X_FORWARDED_FOR");
    elseif(getenv("REMOTE_ADDR")&&strcasecmp(getenv("REMOTE_ADDR"),"unknown")) $ip = getenv("REMOTE_ADDR");
    elseif(isset($_SERVER['REMOTE_ADDR'])&&$_SERVER['REMOTE_ADDR']&&strcasecmp($_SERVER['REMOTE_ADDR'],"unknown")) $ip = $_SERVER['REMOTE_ADDR'];
    else $ip = "unknown";
    return ($ip);
}
add_action('wp_login','insert_last_login');
function insert_last_login($login) {
    global $user_id;
    $user = get_userdatabylogin($login);
    update_user_meta($user->ID,'last_login',current_time('mysql'));
    $last_login_ip = get_client_ip();
    update_user_meta($user->ID,'last_login_ip',$last_login_ip);
}
add_filter('manage_users_columns','add_user_additional_column');
function add_user_additional_column($columns) {
    $columns['user_nickname'] = '昵称';
    $columns['user_url'] = '网站';
    $columns['reg_time'] = '注册时间';
    $columns['last_login'] = '上次登录';
    $columns['last_login_ip'] = '登录IP';
    unset($columns['name']);
    return $columns;
}
add_action('manage_users_custom_column','show_user_additional_column_content',10,3);
function show_user_additional_column_content($value,$column_name,$user_id) {
    $user = get_userdata($user_id);
    if('user_nickname'==$column_name) return $user->nickname;
    if('user_url'==$column_name) return '<a href="'.$user->user_url.'" target="_blank">'.$user->user_url.'</a>';
    if('reg_time'==$column_name) return get_date_from_gmt($user->user_registered);
    if('last_login'==$column_name&&$user->last_login) return get_user_meta($user->ID,'last_login',ture);
    if('last_login_ip'==$column_name) return get_user_meta($user->ID,'last_login_ip',ture);
    return $value;
}
add_filter("manage_users_sortable_columns",'cmhello_users_sortable_columns');
function cmhello_users_sortable_columns($sortable_columns) {
    $sortable_columns['reg_time'] = 'reg_time';
    return $sortable_columns;
}
add_action( 'pre_user_query', 'cmhello_users_search_order' );
function cmhello_users_search_order($obj) {
    if(!isset($_REQUEST['orderby'])||$_REQUEST['orderby']=='reg_time'){
        if(!in_array($_REQUEST['order'],array('asc','desc'))) $_REQUEST['order'] = 'desc';
        $obj->query_orderby = "ORDER BY user_registered ".$_REQUEST['order']."";
    }
}

//Custom login
function custom_login_logo() {
    echo '<link rel="stylesheet" id="wp-admin-css" href="'.get_bloginfo('template_directory').'/css/customlogin.min.css" type="text/css" />';
}
add_action('login_head','custom_login_logo');

//enable more tags
function sig_allowed_html_tags_in_comments() {
   define('CUSTOM_TAGS',true);
   global $allowedtags;
   $allowedtags = array(
      'img'=> array(
         'alt' => true,
         'class' => true,
         'height'=> true,
         'src' => true,
         'width' => true,
      ),
   );
}
add_action('init','sig_allowed_html_tags_in_comments',10);