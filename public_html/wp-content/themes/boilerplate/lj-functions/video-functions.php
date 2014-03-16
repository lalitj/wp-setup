<?php
function video_from_simplefield($simplefield_key, $width = 632, $height = 352, $autoplay = 0){
    $video_url = get_post_meta(get_the_ID(),$simplefield_key,true);
    if(!$video_url){
        return;
    }
    if(strpos($video_url, 'youtube')){ //youtube url
        $output = generate_youtube_iframe($video_url, $width, $height, $autoplay);
    }
    elseif(strpos($video_url, 'vimeo'))
    {
        $output = generate_vimeo_iframe($video_url, $width, $height, $autoplay);
    }
    $output = apply_filters('video_from_simplefield',$output);
    return $output;
}

function video_from_acf($acf_key, $width = 632, $height = 352,$video_url = ""){
    $auto_play = (isset($_GET['play']) && $_GET['play'] == 1 ) ? 1 : 0;
    if(!$video_url){
        $video_url = get_field($acf_key, get_the_ID());
        if(!$video_url){
            return;
        }
    }
    if(strpos($video_url, 'youtube')){ //youtube url
        $output = generate_youtube_iframe($video_url, $width, $height,$auto_play);
    }
    elseif(strpos($video_url, 'vimeo'))
    {
        $output = generate_vimeo_iframe($video_url, $width, $height,$auto_play);
    }
    $output = apply_filters('video_from_acf',$output);
    return $output;
}

function generate_vimeo_iframe($vimeo_code, $width = 632, $height = 352, $autoplay = 0){
    //$video_id = get_vimeo_video_id($vimeo_code);
    $video_id = get_new_vimeo_video_id($vimeo_code);
    return '<iframe src="http://player.vimeo.com/video/'.$video_id.'?autoplay='.$autoplay.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';
}

function generate_youtube_iframe($youtube_url, $width = 632, $height = 352, $autoplay = 0){
    $parsed_url = parse_url($youtube_url);
    parse_str($parsed_url['query'], $output);
    $v = $output['v'];
    return '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$v.'?rel=0&autoplay='.$autoplay.'" frameborder="0" allowfullscreen></iframe>';
}

function get_vimeo_video_id($vimeo_code){
    $str_before = ".vimeo.com/video/";
    $str_after = "?";
    $str_start = strpos($vimeo_code, $str_before) + strlen($str_before);
    $str_end = strpos($vimeo_code, $str_after, $str_start);
    return substr($vimeo_code,$str_start, $str_end-$str_start);
}

function get_new_vimeo_video_id($vimeo_url){
    $explode = explode('/',$vimeo_url);
    return end($explode);
}


function get_vimeo_thumbnail($video_id){
    $hash = unserialize(@file_get_contents("http://vimeo.com/api/v2/video/$video_id.php"));
    return $hash[0]['thumbnail_large']; //thumbnail_small, thumbnail_medium, thumbnail_large
}

function get_image_id_by_video_id($video_id) {
    global $wpdb;
    $prefix = $wpdb->prefix;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT post_id FROM " . $prefix . "postmeta" . " WHERE meta_key = '_wp_attached_file' and meta_value = 'video-thumbs/".$video_id.".jpg'"));
    return $attachment[0];
}

function generate_video_thumb($post_id = "", $simplefield = "", $video_url = ""){

    if(!$simplefield){
        $simplefield = "_simple_fields_fieldGroupID_17_fieldID_1_numInSet_0";
    }

    if(!$post_id){
        $post_id = get_the_ID();
    }

    if(empty($post_id)){
        return false;
    }

    $thumb_id = get_post_meta($post_id,'_video_auto_thumb',true);

    if($thumb_id){
        if ( wp_attachment_is_image( $thumb_id ) ){
            return $thumb_id;
        } else {
            delete_post_meta($post_id, '_video_auto_thumb');
        }
    }

    if(!$video_url){
        $video_url = get_post_meta($post_id, $simplefield,true);
    }

    if(empty($video_url)){
        return false;
    }

    if(strpos($video_url, 'youtube')){ //youtube url
        $parsed_url = parse_url($video_url);
        parse_str($parsed_url['query'], $output);
        $video_id = $output['v'];
        $image_src = "http://img.youtube.com/vi/".$video_id."/0.jpg";
    }
    elseif(strpos($video_url, 'vimeo'))
    {
        $video_id = get_new_vimeo_video_id($video_url);
        $image_src = get_vimeo_thumbnail($video_id);
    } else{
        return false;
    }

    $upload_dir = wp_upload_dir();  // Wordpress Upload Directory
    $image_path = $upload_dir['basedir']."/video-thumbs/".$video_id.'.jpg';
    $image_url = $upload_dir['baseurl']."/video-thumbs/".$video_id.'.jpg';
    if(file_exists($image_path)){ //video image already created
        $thumb_id = get_image_id_by_video_id($video_id);
        add_post_meta($post_id, '_video_auto_thumb', $thumb_id, true) or update_post_meta($post_id, '_video_auto_thumb', $thumb_id);
        return $thumb_id;
    }

    if($image_src){
        if(copy($image_src, $image_path)){
            $filename = $image_path;
        };
    }

    if($filename){

        $wp_filetype = wp_check_filetype(basename($filename), null );
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
        //include the image.php file for the function wp_generate_attachment_metadata() to work
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
        wp_update_attachment_metadata( $attach_id, $attach_data );

        add_post_meta($post_id, '_video_auto_thumb', $attach_id, true);

        return $attach_id;

    }

    return false;
}

function responsive_wrap_video($video){
    $output = '<div class="rve-embed-container">';
    $output .= $video;
    $output .= '</div>';
    return $output;
}

function responsive_wrap_video_oembed($video){
    $output = '<div class="video"><div class="rve-embed-container">';
    $output .= $video;
    $output .= '</div></div>';
    return $output;
}

add_filter('video_from_acf','responsive_wrap_video');
add_filter('oembed_result','responsive_wrap_video_oembed');
?>