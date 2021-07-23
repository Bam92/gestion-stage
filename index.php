<?php

/**
 * @author Abel L Mbula
 * Front controller
 *
 * Load controllers
 */
require __DIR__ . '/vendor/autoload.php';

require_once './src/Controllers/controllers.php';
require_once './src/Controllers/Student.php';

// use Attendancy\Controller\StudentController as StudentCtl;

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

    case '/groups/list':
        group_list_action();
        break;

    case '/groups/add':
        group_add_action();
        break;

    case '/oop':
        return (new \Attendancy\Controller\StudentController())->sayHello();
        break;

    default:
        http_response_code(404);
        echo '<html><body><h1>Page not found</h1></body></html>';
        break;
}