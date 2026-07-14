<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Siaportal');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
// Use a Closure so CI4.0.3 never tries to echo a RedirectResponse object
$routes->set404Override(function() {
    header('Location: ' . base_url());
    exit();
});
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
$routes->get('/', 'Siaportal::index');

// Explicit routes — bypasses Linux case-sensitive auto-routing
// (directories are 'appoint/' lowercase but namespace is App\Controllers\Appoint)

// --- Appoint (staff booking view) ---
$routes->get( 'appoint/Appoint/index',               'Appoint\Appoint::index');
$routes->get( 'appoint/Appoint/add',                 'Appoint\Appoint::add');
$routes->post('appoint/Appoint/add',                 'Appoint\Appoint::add');
$routes->get( 'appoint/Appoint/edit/(:num)',          'Appoint\Appoint::edit/$1');
$routes->post('appoint/Appoint/edit/(:num)',          'Appoint\Appoint::edit/$1');
$routes->get( 'appoint/Appoint/delete/(:num)',        'Appoint\Appoint::delete/$1');
$routes->get( 'appoint/Appoint/ics/(:num)/(:any)',                  'Appoint\Appoint::ics/$1/$2');
$routes->get( 'appoint/Appoint/reschedule_request/(:num)/(:any)',  'Appoint\Appoint::reschedule_request/$1/$2');
$routes->post('appoint/Appoint/reschedule_request/(:num)/(:any)',  'Appoint\Appoint::reschedule_request/$1/$2');
$routes->get( 'appoint/Appoint/cancel_request/(:num)/(:any)',      'Appoint\Appoint::cancel_request/$1/$2');
$routes->post('appoint/Appoint/cancel_request/(:num)/(:any)',      'Appoint\Appoint::cancel_request/$1/$2');
$routes->post('appoint/Appoint/check_availability',  'Appoint\Appoint::check_availability');
$routes->get( 'appoint/Appoint/get_prospects_json',  'Appoint\Appoint::get_prospects_json');
$routes->post('appoint/Appoint/book_from_prospect',  'Appoint\Appoint::book_from_prospect');

// --- AppointAdmin (appointment admin panel) ---
$routes->get( 'appoint/AppointAdmin/login',          'Appoint\AppointAdmin::login');
$routes->post('appoint/AppointAdmin/login',          'Appoint\AppointAdmin::login');
$routes->get( 'appoint/AppointAdmin/logout',         'Appoint\AppointAdmin::logout');
$routes->get( 'appoint/AppointAdmin/dashboard',      'Appoint\AppointAdmin::dashboard');
$routes->get( 'appoint/AppointAdmin/approve/(:num)', 'Appoint\AppointAdmin::approve/$1');
$routes->get( 'appoint/AppointAdmin/reject/(:num)',  'Appoint\AppointAdmin::reject/$1');
$routes->post('appoint/AppointAdmin/set_status/(:num)', 'Appoint\AppointAdmin::set_status/$1');
$routes->post('appoint/AppointAdmin/assign/(:num)',  'Appoint\AppointAdmin::assign/$1');
$routes->post('appoint/AppointAdmin/bulk_action',        'Appoint\AppointAdmin::bulk_action');
$routes->post('appoint/AppointAdmin/check_slot',         'Appoint\AppointAdmin::check_slot');
$routes->post('appoint/AppointAdmin/check_member_slot',  'Appoint\AppointAdmin::check_member_slot');
$routes->get( 'appoint/AppointAdmin/send_reminder/(:num)','Appoint\AppointAdmin::send_reminder/$1');
$routes->get( 'appoint/AppointAdmin/daily_summary',       'Appoint\AppointAdmin::daily_summary');
$routes->post('appoint/AppointAdmin/reschedule/(:num)',   'Appoint\AppointAdmin::reschedule/$1');
$routes->get( 'appoint/AppointAdmin/team_schedule',       'Appoint\AppointAdmin::team_schedule');
$routes->get( 'appoint/AppointAdmin/team_schedule_export','Appoint\AppointAdmin::team_schedule_export');

// --- Agreement ---
$routes->get( 'agreement/Agreement/dashboard',       'Agreement\Agreement::dashboard');
$routes->post('agreement/Agreement/start_from_application/(:num)', 'Agreement\Agreement::start_from_application/$1');
$routes->get( 'agreement/Agreement/detail/(:num)',   'Agreement\Agreement::detail/$1');
$routes->get( 'agreement/Agreement/search_clients',  'Agreement\Agreement::search_clients');
$routes->get( 'agreement/Agreement/applications_for_client/(:num)', 'Agreement\Agreement::applications_for_client/$1');
$routes->post('agreement/Agreement/save/(:num)',     'Agreement\Agreement::save/$1');
$routes->post('agreement/Agreement/generate_link/(:num)', 'Agreement\Agreement::generate_link/$1');

// --- Agreement Sign (public, no login — reached via emailed signing link) ---
$routes->get( 'agreement/sign/(:any)',           'Agreement\Sign::index/$1');
$routes->post('agreement/sign/(:any)/draft',     'Agreement\Sign::draft/$1');
$routes->post('agreement/sign/(:any)/submit',    'Agreement\Sign::submit/$1');
$routes->post('agreement/sign/(:any)/decline',   'Agreement\Sign::decline/$1');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
