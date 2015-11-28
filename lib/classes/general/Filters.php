<?php

class Filters {

// temporarily using $_GET so we need to clean it up:
  public function GET($name=NULL, $value=false)
  {
    $content=(!empty($_GET[$name]) ? trim($_GET[$name]) : (!empty($value) && !is_array($value) ? trim($value) : false));
    if(is_numeric($content))
      return preg_replace("@([^0-9])@Ui", "", $content);
    else if(is_bool($content))
      return ($content?true:false);
    else if(is_float($content))
      return preg_replace("@([^0-9\,\.\+\-])@Ui", "", $content);
    else if(is_string($content))
    {
      return preg_replace("@([^a-zA-Z0-9\+\-\_\*\@\$\!\;\.\?\#\:\=\%\/\ ]+)@Ui", "", $content);
    }
    else false;
  }


}

?>
