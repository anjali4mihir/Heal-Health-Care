<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
$route['default_controller'] = 'Healto';
$route['get-state'] = "Healto/get_state";
$route['get-city'] = "Healto/get_city";
$route['get-slider'] = "Healto/get_slider";
$route['get-query'] = "Healto/get_query";
$route['services'] = "Healto/services";
$route['services_list'] = "services";
$route['services/add'] = "services/add";
$route['admin/login'] = 'Login';
$route['about-us'] = 'Healto/about_us';
$route['contact-us'] = 'Healto/contact_us';
$route['securities'] = 'Healto/securities';
$route['term-condition'] = 'Healto/term_condition';
$route['privacy-policy'] = 'Healto/privacy_policy';
$route['site-setting'] = 'Admin/site';
$route['app-setting'] = 'Admin/app_setting';
$route['storeprofile-setting/(:any)'] = 'Partners/store_profile/$1';
$route['profile-setting/(:any)'] = 'Partners/my_profile/$1';
$route['partners/profile-edit'] = 'Partners/store_profile_edit';
$route['send-message'] = 'Healto/send_message';
$route['register'] = 'Healto/register';
$route['login'] = 'Healto/login';
$route['partners'] = 'Partners/login';
$route['logout'] = 'Healto/logout';
$route['my-dashboard'] = 'partners/my_dashboard';
$route['partners/forget-password'] = 'Partners/forgot_password';
$route['partners/profilefill-successfully'] = 'Partners/success_registration';
$route['registration-success/(:any)'] = 'Healto/registration_success/$1';
$route['our-services/(:any)'] = 'pathologyservices/list/$1';
$route['our-reports/(:any)'] = 'radiologyservices/list/$1';
$route['admin/forgot-password'] = 'Admin/forgot_password';
$route['admin/login'] = 'admin';
$route['vendors/profile-edit'] = 'vendors/edit';
$route['otp-check'] = 'healto/otp_check';
$route['services/(:any)'] = "Healto/services_deatils/$1";
$route['services_details/(:any)'] = "Healto/services_description/$1";
$route['orders/pending-order'] = "orders/order/1";
$route['orders/approved-order'] = "orders/order/2";
$route['orders/dispatch-order'] = "orders/order/3";
$route['orders/delivered-order'] = "orders/order/4";
$route['orders/cancelled-order'] = "orders/order/5";
$route['orders/rejected-order'] = "orders/order/6";
$route['requests/pending-request'] = "orders/order/1";
$route['requests/accepted-request'] = "orders/order/2";
$route['requests/pending-sample-collect'] = "orders/order/7";
$route['requests/sample-collected'] = "orders/order/3";
$route['requests/pending-report'] = "orders/order/8";
$route['requests/deliverd-report'] = "orders/order/4";
$route['requests/cancelled-request'] = "orders/order/5";
$route['requests/rejected-request'] = "orders/order/6";
$route['requests/pending-request'] = "orders/order/1";
$route['requests/accepted-request'] = "orders/order/2";
$route['requests/pending-appointment'] = "orders/order/7";
$route['requests/appointment-completed'] = "orders/order/3";
$route['requests/pending-report'] = "orders/order/8";
$route['requests/deliverd-report'] = "orders/order/4";
$route['requests/cancelled-request'] = "orders/order/5";
$route['requests/rejected-request'] = "orders/order/6";
$route['partners/app-setting'] = "partners/app_setting";
$route['securities'] = "Healto/securities";
$route['check_become_partners_email_exist_or_not'] = 'Partners/check_become_partners_email_exist_or_not';
$route['check_become_partners_mobile_exist_or_not'] = 'Partners/check_become_partners_mobile_exist_or_not';
$route['check_become_partners_pancard_exist_or_not'] = 'Partners/check_become_partners_pancard_exist_or_not';
$route['check_become_partners_adharcard_exist_or_not'] = 'Partners/check_become_partners_adharcard_exist_or_not';
$route['check_store_name_exist_or_not'] = 'Partners/check_store_name_exist_or_not';
$route['check_store_name_exist_or_not_by_admin'] = 'Vendors/check_store_name_exist_or_not';
$route['check_store_name_exist_or_not_by_admin_edit'] = 'Vendors/check_store_name_exist_or_not_edit';
$route['check_store_mobile_exist_or_not'] = 'Vendors/check_store_mobile_exist_or_not';
$route['check_store_email_exist_or_not'] = 'Vendors/check_store_email_exist_or_not';
$route['check_store_gstin_exist_or_not'] = 'Vendors/check_store_gstin_exist_or_not';

$route['check_medicine_exist_or_not_in_master'] = 'Inventory/check_medicine_exist_or_not';
$route['check_edit_medicine_exist_or_not_in_master'] = 'Inventory/check_edit_medicine_exist_or_not';

$route['check_pathology_test_exist_or_not_master'] = 'Inventory/check_pathology_test_exist_or_not_master';
$route['check_edit_pathology_test_exist_or_not_master'] = 'Inventory/check_edit_pathology_test_exist_or_not_master';

$route['check_radio_test_exist_or_not'] = 'Inventory/check_radio_test_exist_or_not';
$route['check_radio_edit_test_exist_or_not_master'] = 'Inventory/check_radio_edit_test_exist_or_not';

$route['check_provisional_test_exist_or_not'] = 'Inventory/check_provisional_test_exist_or_not';
$route['check_provisional_edit_test_exist_or_not'] = 'Inventory/check_provisional_edit_test_exist_or_not';

$route['check_possion_exist_or_not'] = 'Services/check_possion_exist_or_not';
$route['check_medicine_exist_or_not'] = 'Medicines/check_medicine_exist_or_not';
$route['check_edit_medicine_exist_or_not'] = 'Medicines/check_edit_medicine_exist_or_not';
$route['check_test_exist_or_not'] = 'pathologyservices/check_test_exist_or_not';
$route['check_category_exist_or_not'] = 'radiologyservices/check_category_exist_or_not';
$route['check_edit_category_exist_or_not'] = 'radiologyservices/check_edit_category_exist_or_not';
$route['check_edit_test_exist_or_not'] = 'pathologyservices/check_edit_test_exist_or_not';
$route['check_report_exist_or_not'] = 'radiologyservices/check_report_exist_or_not';
$route['check_edit_report_exist_or_not'] = 'radiologyservices/check_edit_report_exist_or_not';


$route['radiologyservices/test-modality'] = 'radiologyservices/modality';
$route['test'] = 'radiologyservices/test';


// for patient

$route['patient'] = 'Healto/patient';

$route['vendors/pending-approve'] = "vendors/list/pending";
$route['vendors/pharmacy-stores'] = "vendors/list/1";
$route['vendors/pathology-labs'] = "vendors/list/2";
$route['vendors/radiodiagnostic-centers'] = "vendors/list/3";
$route['vendors/register-doctors'] = "vendors/list/4";
$route['vendors/veterinary-doctors'] = "vendors/list/5";
$route['vendors/nurse'] = "vendors/list/6";
$route['vendors/physiotherapist'] = "vendors/list/7";
$route['patients'] = "vendors/list/8";
$route['vendors/rejected'] = "vendors/list/rejected";
$route['report/pharmacy-report'] = "Reports/admin_report/1";
$route['report-1/pharmacy-report-1'] = "Reports/admin_report/1";
$route['report-1/view/(:any)/(:any)'] = "Reports/view/$1/$1";
$route['report/view/(:any)/(:any)'] = "Reports/view/$1/$1";
$route['report/genrate_invoice/(:any)/(:any)'] = "Reports/genrate_invoice/$1/$1";
$route['report/pathologylabs-report'] = "Reports/admin_report/2";
$route['report-1/pathologylabs-report-2'] = "Reports/admin_report/2";
$route['report/radiology-report'] = "Reports/admin_report/3";
$route['report-1/radiology-report-3'] = "Reports/admin_report/3";
$route['report/doctors-report'] = "Reports/admin_report/4";
$route['report/veterinary-doctors-report'] = "Reports/admin_report/5";
$route['report/nurse-report'] = "Reports/admin_report/6";
$route['report/physiotherapist-report'] = "Reports/admin_report/7";
$route['admin_delete_all_inventory'] = 'Inventory/admin_delete_all_inventory1';
$route['admin_csv_structure_download/(:any)'] = 'Inventory/admin_csv_structure_download1/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
