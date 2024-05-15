<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('login', 'Home::login');
$routes->post('logindetails', 'Home::logindetails');
$routes->get('AdminDashboard', 'AdminController::AdminDashboard');
$routes->get('create_emp', 'AdminController::createemployee');
$routes->get('edit_emp/(:any)', 'AdminController::createemployee/$1');


$routes->post('createemp', 'AdminController::createemp');
$routes->get('createproject', 'AdminController::createproject');
$routes->get('listofproject','AdminController::listofproject');
$routes->post('project', 'AdminController::project');
$routes->get('AddNewUser', 'AdminController::addNewUser');
$routes->get('edit_user/(:any)', 'AdminController::addNewUser/$1');
$routes->post('AdduserByadmin', 'AdminController::AdduserByadmin');
$routes->post('user_list', 'AdminController::adminList');
$routes->get('user_list', 'AdminController::adminList');
$routes->get('check_username_id', 'Home::check_username_id');
$routes->post('check_username_id', 'Home::check_username_id');
$routes->get('create_project', 'AdminController::createproject');
$routes->get('addTask', 'AdminController::addTask');
$routes->get('fetch-projects', 'AdminController::fetchProjects');
$routes->post('edit_project/(:any)', 'AdminController::set_project/$1');
$routes->get('edit_project/(:any)', 'AdminController::get_project/$1');
$routes->post('set_project', 'AdminController::set_project');
$routes->post('task', 'AdminController::task');
$routes->post('edit_task/(:any)', 'AdminController::set_task/$1');
$routes->get('edit_task/(:any)', 'AdminController::get_task/$1');
$routes->get('delete/(:any)/(:any)', 'AdminController::delete/$1/$1');
$routes->get('allotTask', 'AdminController::allotTask');
$routes->post('allotTask', 'AdminController::allotTaskDetails');
$routes->get('getEmployees', 'AdminController::getEmployees');
$routes->post('getEmployees', 'AdminController::getEmployees');
$routes->get('logout', 'Home::logout');
$routes->post('profile', 'EmployeeController::saveProfile');
// $routes->get('fetch-projects', 'AdminController::fetchProjects');

// employee Dashboard
$routes->get('EmployeeDashboard', 'EmployeeController::EmployeeDashboard');
$routes->get('saveSignupTime', 'EmployeeController::saveSignupTime');
$routes->post('punchAction', 'EmployeeController::punchAction');
$routes->get('leave_form', 'EmployeeController::leave_form');
$routes->post('leave-request', 'EmployeeController::leave_request');

$routes->get('myTasks', 'EmployeeController::myTasks');
$routes->post('save-timeout', 'EmployeeController::saveTimeOut');


$routes->get('leave_app', 'AdminController::leave_app');
$routes->post('leave_result', 'AdminController::leave_result');
$routes->get('getcount', 'AdminController::getcount');
$routes->get('admin_list', 'AdminController::admin_list');
$routes->get('AdminController/row_delete/(:num)', 'AdminController::row_delete/$1');
$routes->get('Daily_Task', 'AdminController::Daily_Task');
$routes->post('daily_work', 'AdminController::daily_work');
$routes->get('daily_report', 'AdminController::daily_report');
$routes->get('Create_meeting', 'AdminController::Create_meeting');
$routes->post('create_meetings', 'AdminController::create_meetings');
$routes->get('meetings', 'AdminController::meetings');
$routes->get('Join_meeting', 'AdminController::Join_meeting');
$routes->post('saveWorkingTime', 'EmployeeController::saveWorkingTime');
$routes->post('record-action', 'EmployeeController::recordAction');
$routes->post('check-start-time', 'EmployeeController::checkStartTime');

$routes->post('startTask', 'EmployeeController::startTask');
$routes->post('pauseTask', 'EmployeeController::pauseTask');
$routes->post('unpauseTask', 'EmployeeController::unpauseTask');
$routes->post('finishTask', 'EmployeeController::finishTask');
$routes->get('TestingTask', 'EmployeeController::TaskTesting');
$routes->get('TesterDashboard', 'EmployeeController::TesterDashboard');
$routes->get('createTestCase', 'EmployeeController::createTestCase');
$routes->post('save-test-case', 'EmployeeController::saveTestCase');

$routes->get('update_task_status', 'AdminController::update_task_status');
$routes->post('update_task_status', 'AdminController::update_task_status');



$routes->get('delete_data/(:any)/(:any)', 'AdminController::delete_data/$1/$1');

$routes->get('delete_compan/(:any)/(:any)', 'AdminController::delete_compan/$1/$1');



$routes->post('add_menu', 'AdminController::add_menu');
$routes->get('add_menu', 'AdminController::add_menu');



$routes->get('addmaintask', 'AdminController::addmaintask');
$routes->post('add_maintask', 'AdminController::add_maintask');
$routes->get('maintask_list', 'AdminController::maintask_list');

$routes->post('addmaintask/(:any)', 'AdminController::addmaintask/$1');
$routes->get('addmaintask/(:any)', 'AdminController::addmaintask/$1');

$routes->post('set_menu', 'AdminController::set_menu');


$routes->post('edit_menu/(:any)', 'AdminController::add_menu/$1');
$routes->get('edit_menu/(:any)', 'AdminController::get_menu/$1');

$routes->post('menu_list', 'AdminController::menu_list');
$routes->get('menu_list', 'AdminController::menu_list');


$routes->post('emp_list', 'AdminController::emp_list');
$routes->get('emp_list', 'AdminController::emp_list');

$routes->get('update_status', 'AdminController::update_status');
$routes->post('update_status', 'AdminController::update_status');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
