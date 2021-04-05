<?php
/**
 * front controller
 * 
 * load models and controllers
 */
require_once './src/model/model.php';
require_once './src/Controllers/controller.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($request) {
    case '':
    case '/':    
    case '/index.php':  
        home_action();
        break;  
        
    case '/students/list':  
        students_list_action();
        break; 
    case '/students/add':  
        students_add_action();
        break;       
    case '/attendance/list':  
        attendance_list_action();
        break; 
    case '/attendance/add':  
        attendance_add_action();
        break;    
    default:
        http_response_code(404);
        echo '<html><body><h1>Page not found</h1></body></html>';
        break;    
}