<?php
	//Route::any('/admin', 'Admin\LoginController@login');
Route::any('/admin/login', 'Admin\LoginController@login');
Route::get('/admin/logout', 'Admin\LoginController@logout');
Route::get('/admin/home', 'Admin\HomeController@home');
Route::any('/admin/terms-and-conditions','Admin\HomeController@terms');
Route::any('/admin/update_terms','Admin\HomeController@update_terms');
Route::any('/admin/meta-seo','Admin\HomeController@seo');
Route::any('/admin/update_seo','Admin\HomeController@update_seo');


// for Categories @ all routes
Route::any('/admin/categories/add','Admin\CategoriesController@add');
Route::get('/admin/categories','Admin\CategoriesController@index');
Route::any('/admin/categories/edit/{id}','Admin\CategoriesController@edit');
Route::get('/admin/categories/view/{id}','Admin\CategoriesController@view');
Route::get('/admin/categories/delete/{id}','Admin\CategoriesController@delete');
// @end Categories


// for faq @ all routes
Route::any('/admin/faq/add','Admin\FaqController@add');
Route::get('/admin/faq','Admin\FaqController@index');
Route::any('/admin/faq/edit/{id}','Admin\FaqController@edit');
Route::get('/admin/faq/view/{id}','Admin\FaqController@view');
Route::get('/admin/faq/delete/{id}','Admin\FaqController@delete');

// @end Categories

// for province @ all routes
Route::any('/admin/province/add','Admin\ProvinceController@add');
Route::get('/admin/province','Admin\ProvinceController@index');
Route::any('/admin/province/edit/{id}','Admin\ProvinceController@edit');
Route::get('/admin/province/view/{id}','Admin\ProvinceController@view');
Route::get('/admin/province/delete/{id}','Admin\ProvinceController@delete');
// @end province

// for population @ all routes
Route::any('/admin/population/add','Admin\PopulationController@add');
Route::get('/admin/population','Admin\PopulationController@index');
Route::any('/admin/population/edit/{id}','Admin\PopulationController@edit');
Route::get('/admin/population/view/{id}','Admin\PopulationController@view');
Route::get('/admin/population/delete/{id}','Admin\PopulationController@delete');
// @end population

// for over_you @ all routes
Route::any('/admin/over_you/add','Admin\OverYouController@add');
Route::get('/admin/over_you','Admin\OverYouController@index');
Route::any('/admin/over_you/edit/{id}','Admin\OverYouController@edit');
Route::get('/admin/over_you/view/{id}','Admin\OverYouController@view');
Route::get('/admin/over_you/delete/{id}','Admin\OverYouController@delete');
// @end over_you

// for services @ all routes
Route::any('/admin/services/add','Admin\ServicesController@add');
Route::get('/admin/services','Admin\ServicesController@index');
Route::any('/admin/services/edit/{id}','Admin\ServicesController@edit');
Route::get('/admin/services/view/{id}','Admin\ServicesController@view');
Route::get('/admin/services/delete/{id}','Admin\ServicesController@delete');
// @end services


// for members @ all routes
Route::any('/admin/members/add','Admin\MembersController@add');
Route::get('/admin/members','Admin\MembersController@index');
Route::any('/admin/members/edit/{id}','Admin\MembersController@edit');
Route::any('/admin/members/registration/{id}','Admin\MembersController@registration');
Route::get('/admin/members/view/{id}','Admin\MembersController@view');
Route::get('/admin/members/delete/{id}','Admin\MembersController@delete');
// @end members

// Profile Ads Routing 
Route::any('/admin/profile/add/{category}','Admin\ProfilesController@add');
Route::any('/admin/profile/index/{category}','Admin\ProfilesController@index');
Route::any('/admin/profile_agency/index/{category}','Admin\ProfilesAgencyController@index');
Route::any('/admin/profile/edit/{id}','Admin\ProfilesController@edit');
Route::get('/admin/profile/view/{id}','Admin\ProfilesController@view');
Route::get('/admin/profile/delete/{id}/{category}','Admin\ProfilesController@delete');
Route::get('/admin/profile/status/{id}/{category}','Admin\ProfilesController@status');

// top-agency-packages
Route::any('/admin/top-agency-packages/add','Admin\TopAgencyPackagesController@add');
Route::get('/admin/top-agency-packages','Admin\TopAgencyPackagesController@index');
Route::any('/admin/top-agency-packages/edit/{id}','Admin\TopAgencyPackagesController@edit');
Route::get('/admin/top-agency-packages/view/{id}','Admin\TopAgencyPackagesController@view');
Route::get('/admin/top-agency-packages/delete/{id}','Admin\TopAgencyPackagesController@delete');

// subida-agency-packages
Route::any('/admin/subida-agency-packages/add','Admin\SubidaAgencyPackagesController@add');
Route::get('/admin/subida-agency-packages','Admin\SubidaAgencyPackagesController@index');
Route::any('/admin/subida-agency-packages/edit/{id}','Admin\SubidaAgencyPackagesController@edit');
Route::get('/admin/subida-agency-packages/view/{id}','Admin\SubidaAgencyPackagesController@view');
Route::get('/admin/subida-agency-packages/delete/{id}','Admin\SubidaAgencyPackagesController@delete');

// top-individual-packages
Route::any('/admin/top-individual-packages/add','Admin\TopIndividualPackagesController@add');
Route::get('/admin/top-individual-packages','Admin\TopIndividualPackagesController@index');
Route::any('/admin/top-individual-packages/edit/{id}','Admin\TopIndividualPackagesController@edit');
Route::get('/admin/top-individual-packages/view/{id}','Admin\TopIndividualPackagesController@view');
Route::get('/admin/top-individual-packages/delete/{id}','Admin\TopIndividualPackagesController@delete');

// subida-individual-packages
Route::any('/admin/subida-individual-packages/add','Admin\SubidaIndividualPackagesController@add');
Route::get('/admin/subida-individual-packages','Admin\SubidaIndividualPackagesController@index');
Route::any('/admin/subida-individual-packages/edit/{id}','Admin\SubidaIndividualPackagesController@edit');
Route::get('/admin/subida-individual-packages/view/{id}','Admin\SubidaIndividualPackagesController@view');
Route::get('/admin/subida-individual-packages/delete/{id}','Admin\SubidaIndividualPackagesController@delete');

// agencies
Route::any('/admin/agencies/add','Admin\AgenciesController@add');
Route::get('/admin/agencies','Admin\AgenciesController@index');
Route::any('/admin/agencies/edit/{id}','Admin\AgenciesController@edit');
Route::get('/admin/agencies/view/{id}','Admin\AgenciesController@view');
Route::get('/admin/agencies/delete/{id}','Admin\AgenciesController@delete');
Route::get('/admin/agencies/status/{id}','Admin\AgenciesController@status');

// individual
Route::any('/admin/individual/add','Admin\IndividualController@add');
Route::get('/admin/individual','Admin\IndividualController@index');
Route::any('/admin/individual/edit/{id}','Admin\IndividualController@edit');
Route::get('/admin/individual/view/{id}','Admin\IndividualController@view');
Route::get('/admin/individual/delete/{id}','Admin\IndividualController@delete');
Route::get('/admin/individual/status/{id}','Admin\IndividualController@status'); 



// for email-accounts @ all routes
Route::get('/admin/email-accounts','Admin\EmailAccountsController@index');
Route::get('/admin/email-accounts/delete/{id}','Admin\EmailAccountsController@delete');
Route::any('/admin/email-accounts/multidelete','Admin\EmailAccountsController@multidelete');

// for email-accounts @ all routes
Route::get('/admin/contact-enquiry','Admin\ContactEnquiryController@index');
Route::get('/admin/contact-enquiry/delete/{id}','Admin\ContactEnquiryController@delete');

/// foront@all developer pp -routes
// single page there 


// Profile Ads Routing 
Route::any('/admin/top_anuncios_agency/index','Admin\TopAnunciosAgencyController@index');
Route::any('/admin/top_anuncios/index','Admin\TopAnunciosController@index');
Route::get('/admin/top_anuncios/view/{id}','Admin\TopAnunciosController@view');

Route::any('/admin/auto_subidas_anuncios_agency/index','Admin\AutoSubidasAnunciosAgencyController@index');
Route::any('/admin/auto_subidas_anuncios/index','Admin\AutoSubidasAnunciosController@index');
Route::get('/admin/auto_subidas_anuncios/view/{id}','Admin\AutoSubidasAnunciosController@view');
//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});



//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

// set lang

// @end happy_customer
Route::get('locale/{locale?}', array('as'=>'set-locale','uses'=>'HomeController@setLocale'));
// search filrer


$uri = $_SERVER["REQUEST_URI"];
	$uriArray = explode('/', $uri);

	$hostname = getenv('HTTP_HOST');
	$page_url2 = $uriArray[1];
	
Route::any('/','SearchController@index');
if ($page_url2=='escorts' || $page_url2=='chaperos' || $page_url2=='travestis') {
	Route::get('/{params?}', 'SearchController@index')->where('params', '(.*)');

	/* if (array_key_exists('4', $uriArray)) {
	$location = $uriArray[3];
	$keywords = $uriArray[4];
	Route::any('/'.$page_url2.'/'.$location.'/'.$keywords.'', 'SearchController@index');	
	}else if (array_key_exists('3', $uriArray)) {
	$location = $uriArray[3];	
	Route::any('/'.$page_url2.'/'.$location.'', 'SearchController@index');
	}else{
	Route::any('/'.$page_url2.'', 'SearchController@index');
	} */
}

Route::get('/profile/{category}/{province}/{population}/{title}/{id}', 'HomeController@view');

// @end happy_customer
Route::get('locale/{locale?}', array('as'=>'set-locale', 'uses'=>'HomeController@setLocale'));
Route::any('/ajax/population', 'AjaxController@population');
Route::any('/ajax/login', 'AjaxController@login');
Route::any('/ajax/register', 'AjaxController@register');
Route::any('/ajax/next_fetch_profile', 'AjaxController@next_fetch_profile');
Route::any('/ajax/previous_fetch_profile', 'AjaxController@previous_fetch_profile');
Route::any('/ajax/next_fetch_profile_favoritos', 'AjaxController@next_fetch_profile_favoritos');
Route::any('/ajax/previous_fetch_profile_favoritos', 'AjaxController@previous_fetch_profile_favoritos');
Route::any('/ajax/checkEmail', 'AjaxController@checkEmail');
Route::any('/ajax/checkMobile', 'AjaxController@checkMobile');
Route::any('/ajax/agency_packages', 'AjaxController@agency_packages');
Route::any('/ajax/member_packages', 'AjaxController@member_packages');
Route::any('/ajax/populationautocomplete', 'AjaxController@populationautocomplete');
Route::any('/ajax/populationautocompleteCount', 'AjaxController@populationautocompleteCount');
Route::any('/ajax/top_escorts_agency_packages', 'AjaxController@top_escorts_agency_packages');
Route::any('/ajax/top_escorts_individual_packages', 'AjaxController@top_escorts_individual_packages');
Route::any('/ajax/contact_support_agecncy', 'AjaxController@contact_support_agecncy');
Route::any('/ajax/contact_report', 'AjaxController@contact_report');
Route::any('/ajax/visualizaciones', 'AjaxController@visualizaciones');
Route::any('/ajax/visualizacione_chart/{id}', 'AjaxController@visualizacione_chart');
Route::any('/ajax/piesepuerto_chart/{id}', 'AjaxController@piesepuerto_chart');
Route::any('/ajax/top_anuncios_chart/{id}', 'AjaxController@top_anuncios_chart');
Route::any('/ajax/subida_zone_chart/{id}', 'AjaxController@subida_zone_chart');
Route::any('/ajax/favoritosLoad', 'AjaxController@favoritosLoad');
Route::any('/ajax/remove_favoritos', 'AjaxController@remove_favoritos');
Route::any('/ajax/conversion', 'AjaxController@conversion');
Route::any('/ajax/remove_favoritos_single', 'AjaxController@remove_favoritos_single');
Route::any('/ajax/favoritoTotal', 'AjaxController@favoritoTotal');
Route::any('/ajax/search', 'AjaxController@search');
Route::any('/ajax/agency_login', 'AjaxController@agency_login');
Route::any('/ajax/service_over', 'AjaxController@service_over');
Route::get('/ajax/favoritos', 'AjaxController@favoritos');
Route::any('/ajax/pushUrl/{id}', 'AjaxController@pushUrl');
Route::get('/members/email-password/{email}', 'MembersController@email_password');
Route::get('/members/resend/{email}', 'MembersController@resend');
Route::any('/members/update-password/{hash}','MembersController@update_password');
Route::any('/members/subida-zone-payment','MembersController@subida_zone_payment');
Route::any('/members/password-saved','MembersController@password_saved');
Route::any('/members/anuncios','MembersController@anuncios');
Route::any('/publish','MembersController@publish');
Route::any('/crear-anuncio','MembersController@profile');
Route::any('/logout','MembersController@logout');
Route::any('/members/control','MembersController@control');
Route::any('/members/password-lost','MembersController@password_lost');
Route::any('/members/reset-password/{hash}','MembersController@reset_password');
Route::any('/members/contrasena','MembersController@contrasena');
Route::any('/members/contact-us','MembersController@contact');
Route::any('/members/privacy-policy','MembersController@privacy');
Route::any('/members/subida-zone','MembersController@subida_zone');
Route::any('/members/zona-top-payment','MembersController@zona_top_payment');
Route::any('/members/zona-top','MembersController@zona_top');
Route::get('/members/status/{id}/{location}/{top_subida_profile_lists_id}/{type}','MembersController@status');
Route::any('/members/estadisticas/{id}','MembersController@estadisticas');
Route::any('/members/faq','MembersController@faq');
Route::any('/members/consumo','MembersController@consumo');

Route::any('/members/facturacion','MembersController@facturacion');

// Agency Pages
Route::any('/plan-agencia','AgencyController@plan_agencia');
Route::any('/register-agencia','AgencyController@register_agencia');
Route::any('/agencia-logout','AgencyController@logout');
Route::any('/agencia-login','AgencyController@login');
Route::any('/agencia-password-lost','AgencyController@password_lost');
Route::get('/agencia/email-verify/{email}', 'AgencyController@email_verify');
Route::get('/agencia/resend/{email}', 'AgencyController@resend');
Route::any('/agencia/verify/{hash}','AgencyController@verify');
Route::any('/agencia/reset-password/{hash}','AgencyController@update_password');
Route::any('/agencia/control','AgencyController@control');
Route::any('/agencia/create-add','AgencyController@create_add');
//anuncios
Route::any('/agencia/anuncios-activos','AgencyController@anuncios_activos');
Route::any('/agencia/subida-zone','AgencyController@subida_zone');
Route::any('/agencia/subida-zone-payment','AgencyController@subida_zone_payment');
Route::any('/agencia/subida-zone/{category}','AgencyController@subida_zone_category');
Route::any('/agencia/subida-zone/{category}/{id}','AgencyController@subida_zone_category_id');
Route::any('/agencia/subida-zone/{category}/{id}/{province}','AgencyController@subida_zone_category_id_province');
// top zona 
Route::any('/agencia/zona-top-payment','AgencyController@zona_top_payment');
Route::any('/agencia/zona-top','AgencyController@zona_top');
Route::any('/agencia/zona-top/{category}','AgencyController@zona_top_category');
Route::any('/agencia/zona-top/{category}/{id}','AgencyController@zona_top_category_id');
Route::any('/agencia/zona-top/{category}/{id}/{province}','AgencyController@zona_top_category_id_province');
//anuncios
Route::any('/agencia/crear-anuncio','AgencyController@profile');
Route::any('/agencia/crear-anuncio-update/{id}/{location}','AgencyController@profile_edit');
Route::get('/agencia/delete/{id}/{location}','AgencyController@delete');
Route::get('/agencia/status/{id}/{location}/{top_subida_profile_lists_id}/{type}','AgencyController@status');
Route::any('/agencia/faq','AgencyController@faq');
Route::any('/agencia/contrasena','AgencyController@contrasena');
Route::any('/agencia/contact-us','AgencyController@contact');
Route::any('/agencia/privacy-policy','AgencyController@privacy');
Route::any('/agencia/datos-de-agencia','AgencyController@profile_agencia');
Route::any('/agencia/consumo','AgencyController@consumo');
Route::any('/agencia/facturacion','AgencyController@facturacion');
Route::any('/agencia/imageCrop','AgencyController@imageCrop');
Route::any('/agencia/agenciaSave','AgencyController@agenciaSave');
Route::any('/estadisticas/{id}','PerformanceController@index');
Route::any('/agencia/{id}','HomeController@agencia');

// cron job
Route::get('/cron/top-zona','CronController@top_zona');
?>