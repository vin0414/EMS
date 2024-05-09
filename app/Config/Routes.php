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
$routes->get('/new-expense','Home::newExpense');
$routes->get('/upload','Home::Upload');
$routes->get('/manage-expenses','Home::manageExpenses');
$routes->get('/edit-rental/(:any)','Home::editRental/$1');
$routes->get('/contracts','Home::listContracts');
$routes->get('/edit/(:any)','Home::editContract/$1');
$routes->get('/generate-expense','Home::generateExpense');
$routes->get('/settings','Home::Settings');
//reports
$routes->get('/rent-expense','Home::rentExpense');
$routes->get('/expense-report','Home::expenseReport');
//functions for Home Controller
$routes->post('save-contract','Home::saveContract');
$routes->get('search-contract','Home::searchContract');
$routes->get('list-of-contracts','Home::expiredContracts');
$routes->post('edit-contract','Home::updateContract');
$routes->post('save-code','Home::saveCode');
$routes->post('remove-code','Home::removeCode');
$routes->get('view-details','Home::viewDetails');
$routes->post('modify-code','Home::modifyCode');
$routes->post('save-rental-entry','Home::saveEntry');
$routes->get('list-rentals','Home::listRentals');
$routes->post('delete-item','Home::deleteItem');
$routes->post('send-item','Home::sendItem');
$routes->post('delete-all','Home::deleteAll');
$routes->post('send-all','Home::sendAll');
$routes->post('update-rent','Home::updateRent');
//functions for Manage Controller
$routes->get('all-rental-expense','ManageController::getAllRentExpense');
$routes->post('generate-rent-expense','ManageController::generateRentExpense');
$routes->get('load-pending-rent-expense','ManageController::pendingRentExpense');
$routes->post('upload-proof-file','ManageController::uploadProof');
$routes->post('upload-proof-receipt','ManageController::uploadReceipt');
$routes->get('load-pending-other-expense','ManageController::otherExpense');
//dashboard function
$routes->get('chart-expense','Home::chartExpense');

$routes->group('',['filter'=>'AuthCheck'],function($routes)
{

});

$routes->group('',['filter'=>'AlreadyLoggedIn'],function($routes)
{

});
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
