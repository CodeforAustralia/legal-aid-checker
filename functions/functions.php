<?php

function get_title() {
    $url_path = $_SERVER['REQUEST_URI'];
    $url_path = explode("/", $url_path);
    return get_title_by_root_folder($url_path[1]);
}

function get_title_by_root_folder($url_path) {
    switch ($url_path) {
       case 'crime_fines':
          return "Crime and Fines";
          break;
       
       case 'family':
          return "Family";
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
       
       case 'money':
          return "Money";
          break;
       
       case 'young_people':
          return "Young People and the Law";
          break;
          
       case 'your_rights':
          return "Your rights";
          break;
       case 'your_safety':
          return "Your Safety";
          break;
       
       default:
          return "";
          break;
    }
}