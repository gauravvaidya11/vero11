<?php

 function getYouTubeIdFromURL($url=false) {
      if($url){
        if (stristr($url,'youtu.be/')){
          preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4];
        }else {
          @preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5];
        }
      }
 }
 function getVimeoVideoFromUrl($url) {
        if($url){
          $url =  "http://vimeo.com/api/oembed.json?url=".$url;
          $curl = curl_init($url);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($curl, CURLOPT_TIMEOUT, 30);
          curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
          $return = json_decode(curl_exec($curl));
          curl_close($curl);
          return $return;
        }else{
          return false;
        }
          
 }
 function getVineVideoThumb($id) {
        
         // $url = str_replace("/embed",'',$url);
         // $data = file_get_contents($url);
          $data = file_get_contents("http://vine.co/v/{$id}");
          //print_r($data);
          if(preg_match('~<\s*meta\s+property="(og:image)"\s+content="([^"]*)~i', $data)){
            preg_match('~<\s*meta\s+property="(og:image)"\s+content="([^"]*)~i', $data, $matches);
          }else{
            preg_match('~<\s*meta\s+property="(twitter:image)"\s+content="([^"]*)~i', $data, $matches);
          }
            
          //print_r($matches)      ;
          $image_url = '';
          if ( isset($matches[2]) ) {
           $image_url  = current(explode("?",$matches[2])); // Define the image URL here
          }
          return $image_url;
          // echo $image_url;die($id);//return $image_url;
     }
 function getYouTubeVideoThumb($id) {
          
         $image_url = "https://img.youtube.com/vi/$id/0.jpg";
         return $image_url;
  }
  function getVineId($url) {
        preg_match("#(?<=vine.co/v/)[0-9A-Za-z]+#", $url, $matches);
        if (isset($matches[0])) {
          return $matches[0];
        }
        return false;
}
function get_vine_thumbnail( $id )
{
$vine = file_get_contents("http://vine.co/u/{$id}");
preg_match('/property="og:image" content="(.*?)"/', $vine, $matches);
return ($matches[1]) ? $matches[1] : false;
} 
function get_vine_video_url($url) {

        if (strpos($url,'embed') !== false) {
        $vurl = $url.'/simple';
        } else {
        $vurl = $url.'/embed/simple';
        }

        return $vurl;
}