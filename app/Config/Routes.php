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

$routes->get('add_client', 'AdminController::add_client');
$routes->get('edit_client/(:any)', 'AdminController::add_client/$1');

$routes->post('set_client', 'AdminController::set_client');

$routes->post('client_list', 'AdminController::client_list');
$routes->get('client_list', 'AdminController::client_list');

$routes->get('add_dailyblog', 'AdminController::add_dailyblog');
$routes->get('edit_dailyblog/(:any)', 'AdminController::add_dailyblog/$1');

$routes->post('set_dailyblog', 'AdminController::set_dailyblog');

$routes->post('dailyblog_list', 'AdminController::dailyblog_list');
$routes->get('dailyblog_list', 'AdminController::dailyblog_list');

$routes->get('add_debitnote', 'AdminController::add_debitnote');
$routes->get('edit_debitnote/(:any)', 'AdminController::add_debitnote/$1');
$routes->post('set_debitnote', 'AdminController::set_debitnote');
$routes->get('debitnote/(:any)', 'AdminController::debitnote/$1');



$routes->post('debitnote_list', 'AdminController::debitnote_list');
$routes->get('debitnote_list', 'AdminController::debitnote_list');


$routes->get('add_invoice', 'AdminController::add_invoice');
$routes->get('edit_invoice/(:any)', 'AdminController::add_invoice/$1');
$routes->post('set_invoice', 'AdminController::set_invoice');
$routes->get('invoice/(:any)', 'AdminController::invoice/$1');
$routes->get('proforma/(:any)', 'AdminController::proforma/$1');
$routes->post('get_po_details','AdminController::get_po_details');
// app/Config/Routes.php

$routes->get('/download-invoice/(:num)', 'AdminController::downloadInvoice/$1');





$routes->post('invoice_list', 'AdminController::invoice_list');
$routes->get('invoice_list', 'AdminController::invoice_list');



$routes->get('add_proforma', 'AdminController::add_proforma');
$routes->get('edit_proforma/(:any)', 'AdminController::add_proforma/$1');
$routes->post('set_proforma', 'AdminController::set_proforma');
$routes->get('proforma/(:any)', 'AdminController::proforma/$1');

$routes->post('proforma_list', 'AdminController::proforma_list');
$routes->get('proforma_list', 'AdminController::proforma_list');

$routes->get('add_po', 'AdminController::add_po');
$routes->get('edit_po/(:any)', 'AdminController::add_po/$1');
$routes->get('set_po', 'AdminController::set_po');

$routes->post('set_po', 'AdminController::set_po');

$routes->post('po_list', 'AdminController::po_list');
$routes->get('po_list', 'AdminController::po_list');

$routes->get('add_memo', 'AdminController::add_memo');
$routes->post('set_memo', 'AdminController::set_memo');
$routes->get('edit_memo/(:any)', 'AdminController::add_memo/$1');

$routes->post('memo_list', 'AdminController::memo_list');
$routes->get('memo_list', 'AdminController::memo_list');

$routes->get('memo', 'EmployeeController::show_memo');

$routes->post('save-memo-reply', 'EmployeeController::save_memo_reply');
$routes->get('get-memo-details', 'EmployeeController::getMemoDetails');


$routes->post('set_currency', 'AdminController::set_currency');
$routes->get('currency_list', 'AdminController::currency_list');
$routes->post('currency_list', 'AdminController::currency_list');
$routes->get('add_currency', 'AdminController::add_currency');
$routes->get('edit_currency/(:any)', 'AdminController::add_currency/$1');


$routes->post('checkEmailExistence', 'AdminController::checkEmailExistence');

$routes->post('createemp', 'AdminController::createemp');
$routes->get('createproject', 'AdminController::createproject');
$routes->get('listofproject','AdminController::listofproject');
$routes->post('project', 'AdminController::project');
$routes->get('AddNewUser', 'AdminController::addNewUser');
// $routes->get('edit_user/(:any)', 'AdminController::addNewUser/$1');
$routes->get('edit_user/(:any)', 'AdminController::createemployee/$1');

$routes->post('AdduserByadmin', 'AdminController::AdduserByadmin');
$routes->post('user_list', 'AdminController::adminList');
$routes->get('user_list', 'AdminController::adminList');
$routes->get('check_username_id', 'Home::check_username_id');
$routes->post('check_username_id', 'Home::check_username_id');
$routes->get('create_project', 'AdminController::createproject');
$routes->get('addTask', 'AdminController::addTask');
$routes->get('fetch-projects', 'AdminController::fetchProjects');
$routes->post('edit_project/(:any)', 'AdminController::createproject/$1');
$routes->get('edit_project/(:any)', 'AdminController::createproject/$1');
$routes->post('set_project', 'AdminController::set_project');
$routes->post('task', 'AdminController::task');
$routes->post('edit_task/(:any)', 'AdminController::set_task/$1');
$routes->get('edit_task/(:any)', 'AdminController::get_task/$1');

$routes->post('edit_task/(:any)', 'AdminController::set_task/$1');
$routes->get('edit_task/(:any)', 'AdminController::get_tasklist/$1');


$routes->get('delete/(:any)/(:any)', 'AdminController::delete/$1/$1');
$routes->get('allotTask', 'AdminController::allotTask');
$routes->post('allotTask', 'AdminController::allotTaskDetails');
$routes->get('getEmployees', 'AdminController::getEmployees');
$routes->post('getEmployees', 'AdminController::getEmployees');
$routes->get('logout', 'Home::logout');
$routes->post('profile', 'EmployeeController::saveProfile');
// $routes->get('fetch-projects', 'AdminController::fetchProjects');
$routes->get('taskList', 'AdminController::taskList');
$routes->get('assignedTaskList', 'AdminController::completedTaskList');
// app/Config/Routes.php

$routes->get('fetch_subtasks', 'AdminController::fetch_subtasks');
$routes->post('fetch_subtasks', 'AdminController::fetch_subtasks');


$routes->get('search_data', 'AdminController::search_data');
$routes->post('search_data', 'AdminController::search_data');



// employee Dashboard
$routes->get('EmployeeDashboard', 'EmployeeController::EmployeeDashboard');
$routes->get('saveSignupTime', 'EmployeeController::saveSignupTime');
$routes->get('getPunchStatus', 'EmployeeController::getPunchStatus');
$routes->post('punchAction', 'EmployeeController::punchAction');
$routes->get('leave_form', 'EmployeeController::leave_form');
$routes->get('leave_list', 'EmployeeController::leave_form');

$routes->post('leave-request', 'EmployeeController::leave_request');

$routes->get('myTasks', 'EmployeeController::myTasks');
$routes->post('save-timeout', 'EmployeeController::saveTimeOut');

$routes->get('showProfile', 'EmployeeController::showProfile');


$routes->get('corrections', 'EmployeeController::corrections');

$routes->post('corrections_startTask', 'EmployeeController::corrections_startTask');
$routes->post('corrections_pauseTask', 'EmployeeController::corrections_pauseTask');
$routes->post('corrections_unpauseTask', 'EmployeeController::corrections_unpauseTask');
$routes->post('corrections_finishTask', 'EmployeeController::corrections_finishTask');
// $routes->post('update_task_status', 'TaskController::updateTaskStatus');



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

$routes->get('createTestCase/(:any)', 'EmployeeController::createTestCase/$1');
$routes->post('createTestCase/(:any)', 'EmployeeController::createTestCase/$1');

$routes->post('save-test-case', 'EmployeeController::saveTestCase');

$routes->get('update_task_status', 'AdminController::update_task_status');
$routes->post('update_task_status', 'AdminController::update_task_status');



$routes->get('delete_data/(:any)/(:any)', 'AdminController::delete_data/$1/$1');
$routes->get('deactive_data/(:any)/(:any)', 'AdminController::deactive_data/$1/$1');
$routes->get('active_data/(:any)/(:any)', 'AdminController::active_data/$1/$1');




$routes->get('delete_compan/(:any)/(:any)', 'AdminController::delete_compan/$1/$1');



$routes->post('add_menu', 'AdminController::add_menu');
$routes->get('add_menu', 'AdminController::add_menu');

$routes->get('add_department', 'AdminController::add_department');
$routes->post('add_departments', 'AdminController::add_departments');

$routes->get('department_list', 'AdminController::department_list');

$routes->post('edit_deparment/(:any)', 'AdminController::add_department/$1');
$routes->get('edit_deparment/(:any)', 'AdminController::add_department/$1');

$routes->get('addmaintask', 'AdminController::addmaintask');
$routes->post('add_maintask', 'AdminController::add_maintask');
$routes->get('maintask_list', 'AdminController::maintask_list');

$routes->post('add_Services', 'AdminController::add_Services');
$routes->get('addservices', 'AdminController::addservices');
$routes->get('services_list', 'AdminController::services_list');
$routes->get('addservices/(:any)', 'AdminController::addservices/$1');


$routes->get('add_notifications', 'AdminController::add_notifications');
$routes->post('set_notification', 'AdminController::set_notification');
$routes->get('notification_list', 'AdminController::notification_list');
$routes->get('show_notification', 'EmployeeController::show_notification');


$routes->get('likeNotification', 'AdminController::likeNotification');
$routes->post('likeNotification', 'AdminController::likeNotification');

$routes->get('thumbNotification', 'AdminController::thumbNotification');
$routes->post('thumbNotification', 'AdminController::thumbNotification');

    
$routes->get('likeDailyblog', 'EmployeeController::likeDailyblog');
$routes->post('likeDailyblog', 'EmployeeController::likeDailyblog');






$routes->post('addmaintask/(:any)', 'AdminController::addmaintask/$1');
$routes->get('addmaintask/(:any)', 'AdminController::addmaintask/$1');

$routes->post('set_menu', 'AdminController::set_menu');


$routes->post('edit_menu/(:any)', 'AdminController::add_menu/$1');
$routes->get('edit_menu/(:any)', 'AdminController::get_menu/$1');

$routes->post('menu_list', 'AdminController::menu_list');
$routes->get('menu_list', 'AdminController::menu_list');


$routes->post('emp_list', 'AdminController::emp_list');
$routes->get('emp_list', 'AdminController::emp_list');

$routes->post('emp_list_data', 'AdminController::emp_list_data');
$routes->get('emp_list_data', 'AdminController::emp_list_data');

$routes->get('update_status', 'AdminController::update_status');
$routes->post('update_status', 'AdminController::update_status');

$routes->get('update_payment_status', 'AdminController::update_payment_status');
$routes->post('update_payment_status', 'AdminController::update_payment_status');



$routes->get('chatuser', 'AdminController::chatuser');
$routes->post('chat', 'AdminController::chatwithteacher');
$routes->get('chatuser/(:any)', 'AdminController::singlechat/$1');


$routes->get('search', 'AdminController::search');
$routes->post('search', 'AdminController::search');


$routes->get('search/(any)', 'AdminController::singlechat/$i');
$routes->post('search/(any)', 'AdminController::singlechat/$i');


$routes->get('insertChat', 'AdminController::insertChat');


$routes->post('insertChat', 'AdminController::insertChat');


$routes->get('getChatCount', 'AdminController::getChatCount');

$routes->get('getnotificationchatCount', 'AdminController::getnotificationchatCount');




$routes->post('update_seen_status', 'AdminController::update_seen_status');
$routes->get('update_seen_status', 'AdminController::update_seen_status');



$routes->post('attendance', 'AdminController::generateMonthlyAttendanceReport');
$routes->get('attendance', 'AdminController::generateMonthlyAttendanceReport');


$routes->post('getallmonthdata', 'AdminController::getallmonthdata');
$routes->get('getallmonthdata', 'AdminController::getallmonthdata');

$routes->post('mattendance', 'EmployeeController::generateMonthlyAttendanceReportm');
$routes->get('mattendance', 'EmployeeController::generateMonthlyAttendanceReportm');

$routes->post('getallmonthdatam', 'EmployeeController::getallmonthdatam');
$routes->get('getallmonthdatam', 'EmployeeController::getallmonthdatam');

$routes->post('get_attendance_list', 'AdminController::get_attendance_list');
$routes->get('get_attendance_list', 'AdminController::get_attendance_list');

$routes->post('get_absent_list', 'AdminController::get_absent_list');
$routes->get('get_absent_list', 'AdminController::get_absent_list');

// $routes->post('get_dailyTask_list', 'AdminController::get_dailyTask_list');
$routes->get('get_dailyTask_list', 'AdminController::get_dailyTask_list');


$routes->get('CompletedTasks', 'EmployeeController::CompletedTasks');





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
