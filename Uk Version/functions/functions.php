<?php

function get_title() {
    $url_path = $_SERVER['REQUEST_URI'];
    $url_path = explode("/", $url_path);
    return get_title_by_root_folder($url_path[1]);
}

function get_title_by_root_folder($url_path) {
    switch ($url_path) {
       case 'migration':
          return "Migration";
          break;
       
       case 'wills':
          return "Wills & Estates";
          break;
       
       case 'home_neighborhood':
          return "Home and Neighborhood";
          break;
       
       case 'managing_afairs':
          return "Managing your affairs";
          break;
       
       case 'mental_health':
          return "Mental Health";
          break;
       
       case 'personal_injury':
          return "Personal Injury";
          break;
       
       case 'young_people':
          return "Young People and the Law";
          break;
          
       case 'housing':
          return "Housing & Tenancy";
          break;
       case 'your_safety':
          return "Your Safety";
          break;
       
       default:
          return "";
          break;
    }
}