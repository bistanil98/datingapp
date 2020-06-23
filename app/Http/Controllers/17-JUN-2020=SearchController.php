<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\UsersTable;
use DB;
use Session;
use Mail;
use App\Jobs\SendEmailJob;
use App\Http\Middleware\SuperCustomer;
use Config;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        // there are onl y function allow same auth 
		$this->middleware(SuperCustomer::class, ['only' => ['book']]);
		// Alternativly
		//$this->middleware('auth', ['except' => ['index', 'show']]);
    }

   

	  public function index(Request $request)  { 	
			$nacionalidad = array();
			$services = array();
			$schedule = array();
			$novedad = array();
			$tipo = array();
			$height = array();
			$age = array();
			$hair = array();
			$price = array();
			$location = array();
			$keywords = array();
			$title = "";   
			$h1_title = "";   
			$meta_title = "";   
			$meta_description = "";  
			$uri = $_SERVER["REQUEST_URI"];
			$results = explode('/', trim($uri,'/'));
			foreach($results as $index){
			if (strpos($index, 'buscar') !== false) {
				$keywords = explode('-',$index);			
				unset($keywords[array_key_last ($keywords)]);
			}
			if (strpos($index, 'donde') !== false) {
				$location = explode('-',$index);			
				unset($location[array_key_last ($location)]);
			}
			if (strpos($index, 'nacionalidad') !== false) {
				$nacionalidad = explode('-',$index);			
				unset($nacionalidad[array_key_last ($nacionalidad)]);
			}
			if (strpos($index, 'servicios') !== false) {
				$services = explode('-',$index);			
				unset($services[array_key_last ($services)]);
			}
			if (strpos($index, 'horario') !== false) {
				$schedule = explode('-',$index);			
				unset($schedule[array_key_last ($schedule)]);
			}
			if (strpos($index, 'noveda') !== false) {
				$novedad = explode('-',$index);			
				unset($novedad[array_key_last ($novedad)]);
			}
			if (strpos($index, 'tipo') !== false) {
				$tipo = explode('-',$index);			
				unset($tipo[array_key_last ($tipo)]);
			}
			
			if (strpos($index, 'estatura') !== false) {
				$height = explode('-',$index);			
				unset($height[array_key_last ($height)]);
			}	
			
			if (strpos($index, 'edad') !== false) {
				$age = explode('-',$index);			
				unset($age[array_key_last ($age)]);
			}
			
			if (strpos($index, 'pelo') !== false) {
				$hair = explode('-',$index);			
				unset($hair[array_key_last ($hair)]);
			}
			if (strpos($index, 'euros') !== false) {
				$price = explode('-',$index);			
				unset($price[array_key_last ($price)]);
			}	
			}
			$searchFilter = array(
			'location'=>$location,
			'keywords'=>$keywords,
			'nationality'=>$nacionalidad,
			'services'=>$services,
			'schedule'=>$schedule,
			'novedad'=>$novedad,
			'tipo'=>$tipo,
			'height'=>$height,
			'age'=>$age,
			'hair'=>$hair,
			'price'=>$price
			);
			
			$uriArray = explode('/', $uri);
			$hostname = getenv('HTTP_HOST');
			$page_url2 = $uriArray[1];			
			if ($page_url2=='escorts' || $page_url2=='chaperos' || $page_url2=='travestis') {
				$category = $page_url2;
				$categoryName = ucwords($page_url2);						
				if(!empty($searchFilter['location']) || 
				!empty($searchFilter['keywords']) || 
				!empty($searchFilter['nationality']) || 
				!empty($searchFilter['services']) || 
				!empty($searchFilter['schedule']) || 
				!empty($searchFilter['novedad']) || 
				!empty($searchFilter['tipo']) || 
				!empty($searchFilter['height']) || 
				!empty($searchFilter['age']) || 
				!empty($searchFilter['hair']) || 
				!empty($searchFilter['price'])
				){
					
					if(!empty($searchFilter['location']) && !empty($searchFilter['keywords'])){		
					//echo "sdfdfxcasasxc";die;
						$title = ucwords(str_replace(".", " ", $searchFilter['keywords'][0])).' en '.ucwords($searchFilter['location'][0]).' '.$categoryName.' y putas en ';	
						$h1_title = $categoryName.' y putas '.str_replace(".", " ", $searchFilter['keywords'][0]).' en '. ucwords($searchFilter['location'][0]);   
						$meta_title = (city_subcity_seo($location[0])->meta_title);  
						$meta_description = (city_subcity_seo($location[0])->meta_description);  	
					}else if(
					!empty($searchFilter['location'])  || 
					!empty($searchFilter['nationality']) || 
					!empty($searchFilter['services']) || 
					!empty($searchFilter['schedule']) || 
					!empty($searchFilter['novedad']) || 
					!empty($searchFilter['tipo']) || 
					!empty($searchFilter['height']) || 
					!empty($searchFilter['age']) || 
					!empty($searchFilter['hair']) || 
					!empty($searchFilter['price'])){
					//echo "sdfdfxcssssssssssssasasxc";die;
					//get single
					if(!empty($searchFilter['location']) && array_key_exists('0', $searchFilter['location'])){
						if(!empty($searchFilter['price'])){
						$title = 'Entre '.$searchFilter['price'][0].' € y '.$searchFilter['price'][1].' € en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas entre '.$searchFilter['price'][0].' € y '.$searchFilter['price'][1].' € en '. ucwords($searchFilter['location'][0]);   			
						}else if(!empty($searchFilter['age'])){					
						$title = 'Entre '.$searchFilter['age'][0].' y '.$searchFilter['age'][1].' años en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas entre '.$searchFilter['age'][0].' y '.$searchFilter['age'][1].' años en '. ucwords($searchFilter['location'][0]);   			
						}else if(!empty($searchFilter['height'])){					
						$title = 'Entre '.$searchFilter['height'][0].' y '.$searchFilter['height'][1].' estatura en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas entre '.$searchFilter['height'][0].' y '.$searchFilter['height'][1].' estatura en '. ucwords($searchFilter['location'][0]); 
						}else if(!empty($searchFilter['schedule'])){					
						$title = 'Entre '.$searchFilter['schedule'][0].' y '.$searchFilter['schedule'][1].' horario en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas entre '.$searchFilter['schedule'][0].' y '.$searchFilter['schedule'][1].' horario en '. ucwords($searchFilter['location'][0]);   			
						}else if(!empty($searchFilter['tipo'])){	
						if(count($searchFilter['tipo'])==1){
						if($searchFilter['tipo'][0]=='verificado'){
						$title = 'Verificadas en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas verificadas en '.ucwords($searchFilter['location'][0]).'';
						}else if($searchFilter['tipo'][0]=='videos'){
						$title = 'Videos en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas videos en '.ucwords($searchFilter['location'][0]).'';
						}else if($searchFilter['tipo'][0]=='agencia'){
						$title = 'Agencia en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';     
						$h1_title = $categoryName.' y putas agencia en '.ucwords($searchFilter['location'][0]).'';
						}else if($searchFilter['tipo'][0]=='independiente'){
						$title = 'Independientes en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas independientes en '.ucwords($searchFilter['location'][0]).'';
						}						
						}else{
						$title = seo($category)->title;   
						$h1_title = seo($category)->h1_title; 						
						}
						}else if(!empty($searchFilter['nationality'])){
						//dd($searchFilter['nationality']);die;
						 if($searchFilter['nationality'][0]!='all'){ 
						 $title = ''.ucwords(str_replace(".", " ", $searchFilter['nationality'][0])).' en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas '.(str_replace(".", " ", $searchFilter['nationality'][0])).' en '.ucwords($searchFilter['location'][0]).'';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas '.(str_replace(".", " ", $searchFilter['nationality'][0])).', disfruta de un sexo inolvidable con '.$category.' en '.ucwords($searchFilter['location'][0]).'';	
						 }else{
							$title = seo($category)->title;   
							$h1_title = seo($category)->h1_title;   
							$meta_title = seo($category)->meta_title;   
							$meta_description = seo($category)->meta_description; 
						 }
						}else if(!empty($searchFilter['hair'])){	
						if(count($searchFilter['hair'])==1){						
						if($searchFilter['hair'][0]=='rubio'){
						$title = 'Rubio en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas rubio en '.ucwords($searchFilter['location'][0]).'';
						$meta_title = $title;
					$meta_description = 'Anuncios eróticos de putas rubio, disfruta de un sexo inolvidable con '.$category.' en '.ucwords($searchFilter['location'][0]).'';									
						}else if($searchFilter['hair'][0]=='moreno'){
						$title = 'Moreno en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas moreno en '.ucwords($searchFilter['location'][0]).'';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas moreno, disfruta de un sexo inolvidable con '.$category.' en '.ucwords($searchFilter['location'][0]).'';								
						}else if($searchFilter['hair'][0]=='castano'){
						$title = 'Castano en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';     
						$h1_title = $categoryName.' y putas castano en '.ucwords($searchFilter['location'][0]).'';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas castano, disfruta de un sexo inolvidable con '.$category.' en '.ucwords($searchFilter['location'][0]).'';									
						}else if($searchFilter['hair'][0]=='peli.rojo'){
						$title = ' Peli Rojo en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas  peli rojo en '.ucwords($searchFilter['location'][0]).'';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas  peli rojo, disfruta de un sexo inolvidable con '.$category.' en '.ucwords($searchFilter['location'][0]).'';								
						}						
						}else{
							$title = seo($category)->title;   
							$h1_title = seo($category)->h1_title;   
							$meta_title = seo($category)->meta_title;   
							$meta_description = seo($category)->meta_description; 				
						}	
						}else if(!empty($searchFilter['services'])){	
						if(count($searchFilter['services'])==1){						
						$title = ''.ucwords(str_replace(".", " ", $searchFilter['services'][0])).' en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas '.str_replace(".", " ", $searchFilter['services'][0]).' en '.ucwords($searchFilter['location'][0]).'';		
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas '.str_replace(".", " ", $searchFilter['services'][0]).', disfruta de un sexo inolvidable con '.$category.' en '.ucwords($searchFilter['location'][0]).'.'; 																					
						}else{
							$title = seo($category)->title;   
							$h1_title = seo($category)->h1_title;   
							$meta_title = seo($category)->meta_title;   
							$meta_description = seo($category)->meta_description; 				
						}
						}else if(!empty($searchFilter['novedad'])){
						if($searchFilter['novedad'][0]==0){	
						$title = 'Últimos any días en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas Últimos any días en '.ucwords($searchFilter['location'][0]).'';		
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas Últimos any días, disfruta de un sexo inolvidable con '.$category.' en '.ucwords($searchFilter['location'][0]).'.'; 																					
						}else{
						$title = 'Últimos '.$searchFilter['novedad'][0].' días en '.ucwords($searchFilter['location'][0]).' '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas Últimos '.$searchFilter['novedad'][0].' días en '.ucwords($searchFilter['location'][0]).'';		
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas Últimos '.$searchFilter['novedad'][0].' días, disfruta de un sexo inolvidable con '.$category.' en '.ucwords($searchFilter['location'][0]).'.'; 																					
						}
					}else{
						$title = $categoryName.' y putas en '. ucwords($searchFilter['location'][0]);   
						$h1_title = $categoryName.' y putas en '. ucwords($searchFilter['location'][0]);
					}						
						$meta_title = (city_subcity_seo($location[0])->meta_title);  
						$meta_description = (city_subcity_seo($location[0])->meta_description);
					}else{
					//echo "sdfsdfsdf----";die;
					if(!empty($searchFilter['price'])){
					$title = 'Entre '.$searchFilter['price'][0].' € y '.$searchFilter['price'][1].' € en Espana '. $categoryName.' y putas';   
					$h1_title = $categoryName.' y putas entre '.$searchFilter['price'][0].' € y '.$searchFilter['price'][1].' € en Espana';  		
					$meta_title = $title;				
					$meta_description = 'Anuncios eróticos de putas entre '.$searchFilter['price'][0].' € y '.$searchFilter['price'][1].' €, disfruta de un sexo inolvidable con '.$category.' en Espana.';
					}else if(!empty($searchFilter['age'])){					
						$title = 'Entre '.$searchFilter['age'][0].' y '.$searchFilter['age'][1].' años en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas entre '.$searchFilter['age'][0].' y '.$searchFilter['age'][1].' años en Espana'; 	
						$meta_title = $title;
					$meta_description = 'Anuncios eróticos de putas entre '.$searchFilter['age'][0].' y '.$searchFilter['age'][1].', disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
					}else if(!empty($searchFilter['height'])){					
						$title = 'Entre '.$searchFilter['height'][0].' y '.$searchFilter['height'][1].' estatura en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas entre '.$searchFilter['height'][0].' y '.$searchFilter['height'][1].' estatura en Espana';		
						$meta_title = $title;
					$meta_description = 'Anuncios eróticos de putas entre '.$searchFilter['height'][0].' y '.$searchFilter['height'][1].' estatura, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
					}else if(!empty($searchFilter['schedule'])){					
						$title = 'Entre '.$searchFilter['schedule'][0].' y '.$searchFilter['schedule'][1].' horario en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas entre '.$searchFilter['schedule'][0].' y '.$searchFilter['schedule'][1].' horario en Espana';		
						$meta_title = $title;
					$meta_description = 'Anuncios eróticos de putas entre '.$searchFilter['schedule'][0].' y '.$searchFilter['schedule'][1].' horario, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
					}else if(!empty($searchFilter['tipo'])){	
						if(count($searchFilter['tipo'])==1){
						if($searchFilter['tipo'][0]=='verificado'){
						$title = 'Verificadas en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas verificadas en Espana';
						$meta_title = $title;
					$meta_description = 'Anuncios eróticos de putas verificadas, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
						}else if($searchFilter['tipo'][0]=='videos'){
						$title = 'Videos en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas videos en Espana';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas videos, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
						}else if($searchFilter['tipo'][0]=='agencia'){
						$title = 'Agencia en Espana '. $categoryName.' y putas';     
						$h1_title = $categoryName.' y putas agencia en Espana';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas agencia, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
						}else if($searchFilter['tipo'][0]=='independiente'){
						$title = 'Independientes en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas independientes en Espana';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas independientes, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
						}						
						}else{
							$title = seo($category)->title;   
							$h1_title = seo($category)->h1_title;   
							$meta_title = seo($category)->meta_title;   
							$meta_description = seo($category)->meta_description; 				
						}
								
					}else if(!empty($searchFilter['nationality'])){
						//dd($searchFilter['nationality']);die;
						 if($searchFilter['nationality'][0]!='all'){
						 $title = ''.ucwords(str_replace(".", " ", $searchFilter['nationality'][0])).' en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas '.(str_replace(".", " ", $searchFilter['nationality'][0])).' en Espana';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas '.(str_replace(".", " ", $searchFilter['nationality'][0])).', disfruta de un sexo inolvidable con '.$category.' en Espana.'; 	
						 }else{
							$title = seo($category)->title;   
							$h1_title = seo($category)->h1_title;   
							$meta_title = seo($category)->meta_title;   
							$meta_description = seo($category)->meta_description; 
						 }
						}else if(!empty($searchFilter['hair'])){	
						if(count($searchFilter['hair'])==1){						
						if($searchFilter['hair'][0]=='rubio'){
						$title = 'Rubio en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas rubio en Espana';
						$meta_title = $title;
					$meta_description = 'Anuncios eróticos de putas rubio, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
						}else if($searchFilter['hair'][0]=='moreno'){
						$title = 'Moreno en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas moreno en Espana';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas moreno, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
						}else if($searchFilter['hair'][0]=='castano'){
						$title = 'Castano en Espana '. $categoryName.' y putas';     
						$h1_title = $categoryName.' y putas castano en Espana';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas castano, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
						}else if($searchFilter['hair'][0]=='peli.rojo'){
						$title = ' Peli Rojo en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas  peli rojo en Espana';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas  peli rojo, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
						}						
						}else{
							$title = seo($category)->title;   
							$h1_title = seo($category)->h1_title;   
							$meta_title = seo($category)->meta_title;   
							$meta_description = seo($category)->meta_description; 				
						}
						}else if(!empty($searchFilter['services'])){	
						if(count($searchFilter['services'])==1){						
						$title = ''.ucwords(str_replace(".", " ", $searchFilter['services'][0])).' en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas '.str_replace(".", " ", $searchFilter['services'][0]).' en Espana';
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas '.str_replace(".", " ", $searchFilter['services'][0]).', disfruta de un sexo inolvidable con '.$category.' en Espana.'; 																					
						}else{
							$title = seo($category)->title;   
							$h1_title = seo($category)->h1_title;   
							$meta_title = seo($category)->meta_title;   
							$meta_description = seo($category)->meta_description; 				
						}
						}else if(!empty($searchFilter['novedad'])){
						if($searchFilter['novedad'][0]==0){	
						$title = 'Últimos any días en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas Últimos any días en Espana';		
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas Últimos any días, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 																					
						}else{
						$title = 'Últimos '.$searchFilter['novedad'][0].' días en Espana '. $categoryName.' y putas';   
						$h1_title = $categoryName.' y putas Últimos '.$searchFilter['novedad'][0].' días en Espana';		
						$meta_title = $title;
						$meta_description = 'Anuncios eróticos de putas Últimos '.$searchFilter['novedad'][0].' días, disfruta de un sexo inolvidable con '.$category.' en Espana.'; 																					
						}		
					}
				}
				
					}else if(!empty($searchFilter['location'])){
					//echo "sdfdfxsdsdcxc";die;
						$title = $categoryName.' y putas en '. ucwords($searchFilter['location'][0]);   
						$h1_title = $categoryName.' y putas en '. ucwords($searchFilter['location'][0]);   			
						$meta_title = (city_subcity_seo($location[0])->meta_title);  
						$meta_description = (city_subcity_seo($location[0])->meta_description);  						
					}else if(!empty($searchFilter['keywords'])){
					//echo "sdfdfxcasasxc";die;
					$title = ucwords(str_replace(".", " ", $searchFilter['keywords'][0])).' en Espana '.$categoryName.' y putas en ';	
					$h1_title = $categoryName.' y putas '.str_replace(".", " ", $searchFilter['keywords'][0]).' en Espana';	
					$meta_title = ucwords(str_replace(".", " ", $searchFilter['keywords'][0])).' en Espana '.$categoryName.' y putas en ';					
					$meta_description = 'Anuncios eróticos de putas '.str_replace(".", " ", $searchFilter['keywords'][0]).', disfruta de un sexo inolvidable con '.$category.' en Espana.'; 											
					}					
					
				}else{
				//echo "sdfdfxcxc";die;
					$title = seo($category)->title;   
					$h1_title = seo($category)->h1_title;   
					$meta_title = seo($category)->meta_title;   
					$meta_description = seo($category)->meta_description; 
				}
			}else{
			//echo "sdfdfxsdsdcxc";die;
				$category = 'escorts';
				$title = seo($category)->title;   
				$h1_title = seo($category)->h1_title;   
				$meta_title = seo($category)->meta_title;   
				$meta_description = seo($category)->meta_description;  				
			}		
		
		 
		$data = array(
		'title'=>rawurldecode($title),
		'h1_title'=>rawurldecode($h1_title),
		'meta_title'=>rawurldecode($meta_title),
		'meta_description'=>rawurldecode($meta_description),
		);	
		
		$ip = request()->ip();
       
		$topLimit = 15;
		$subidaLimit = 75;
		
		$intervelTime = 10;
		$now =  date('Y-m-d'); 
		$time =  date('H:i:s');		
		
		$start_time =  date('Y-m-d h:i:s');
		$end_time = \Carbon\Carbon::parse($start_time)->addSeconds($intervelTime)->format('Y-m-d h:i:s');
			$hitTime = array(
				'type'=>'first'			
				);
			$top_zona_query = $this->top_zona($category,$now,$topLimit, $hitTime,$searchFilter);			
			$top_zona =  $top_zona_query['top_zona_records'];			
			$top_zona_check = $top_zona_query['top_zona_count'];			
			$top_zona_records = round($top_zona_check/$topLimit);
		
			
			$ads_id = [];
			foreach ($top_zona as $plocations)
			{
				$ads_id[] = $plocations->id;
			}
			$IDS = implode(',', $ads_id);
			
			
			
			$ads_seen_history_check = DB::table('ads_seen_history')			
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)
			->where('start_time', '<=', $start_time)
			->where('end_time', '>=', $start_time)
			->where('type', 'top')			
			->limit(1)
			->count();
			
			if($ads_seen_history_check>0){
			
			$ads_seen_history = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)
			->where('start_time', '<=', $start_time)
			->where('end_time', '>=', $start_time)
			->where('type', 'top')
			->first();
			  $GETId = explode(',',$ads_seen_history->ads_id);			
				//// in get history time
				$hitTime = array(
				'type'=>'history',
				'ids'=>$GETId
				);
				$top_zona_query = $this->top_zona($category,$now,$topLimit, $hitTime,$searchFilter);			
				 $top_zona =  $top_zona_query['top_zona_records'];
				
			}else{
			
			
			// check and delete every grather then total row
			$ads_seen_history_count = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)	
			->where('type', 'top')
			->count();
			
			if($ads_seen_history_count>=$top_zona_records){			
				DB::table("ads_seen_history")
				->where('ip_address', $ip)	
				->where('type', 'top')	
				->orderby('id', '=', 'asc')			
				->delete();
			}
			
			if($ads_seen_history_count>0){
				
			
			
			// END check and delete every grather then total row
			 if($ads_seen_history_count>1){
			 
			$ads_seen_history = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'asc')
			->where('ip_address', $ip)	
			->where('type', 'top')
			->get();
			 }else{
			 	$ads_seen_history = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'asc')
			->where('ip_address', $ip)	
			->where('type', 'top')
			->get();
			 }
		
			
				$ads_id1 = [];
				foreach ($ads_seen_history as $plocations)
				{
				$ads_id1[] = $plocations->ads_id;
				}	
				
				
				$IDS = collect($ads_id1)->flatten(1)->groupBy('y')->toArray();
					$response_array = array();
					foreach ($ads_id1 as $post) {
						$response_array[] = $post;
					}
					
					$output = implode(" ", $response_array);
					$response_array2 = str_replace(' ',',',$output);
				    $GETId222 = explode(',',$response_array2);
					$hitTime = array(
					'type'=>'duplicate',
					'ids'=>$GETId222
					);
					$top_zona_query = $this->top_zona($category,$now,$topLimit, $hitTime,$searchFilter);			
					$top_zona =  $top_zona_query['top_zona_records'];

				$ads_id3 = [];
					foreach ($top_zona as $plocations)
					{
					$ads_id3[] = $plocations->id;
					}
					$IDS2 = implode(',', $ads_id3);
					
					$ads_seen_history_count = DB::table('ads_seen_history')	
					->select('ads_id')
					->orderby('id', '=', 'desc')
					->where('ip_address', $ip)		
					->where('type', 'top')
					->count();
					// INSERT LOG
					if(!empty($IDS2)){
					DB::table('ads_seen_history')	
					->insert(
					[
					'type' =>'top',	
					'ip_address' =>$ip,	
					'ads_id' =>$IDS2,	
					'start_time' =>$start_time,	
					'end_time' =>$end_time,	
					'created_at'=>$start_time			
					]);
					}
					// END
					
				}else{
				
					// INSERT LOG
					if(!empty($IDS)){
					
						DB::table('ads_seen_history')	
						->insert(
						[
						'type' =>'top',	
						'ip_address' =>$ip,	
						'ads_id' =>$IDS,	
						'start_time' =>$start_time,	
						'end_time' =>$end_time,	
						'created_at'=>$start_time			
						]);
					}
						// END
					
				}
			}
			
			//// subida
			// delete evere 2 days ago ads
			//$yesterday = date("Y-m-d", strtotime( '-2 days' ) );
			//$countYesterday = DB::table('subida_ads_seen_history')->whereDate('created_at', $yesterday )->delete();
			// end every tow days ago ads delete
			$hitTime = array(
					'type'=>'checkTotal'
					);
			$subida_query  = $this->subida_ad($category,$now,$time,$subidaLimit, $hitTime,$searchFilter);	
			
			$subidaLimit = $subida_query['subida_count'] -10;
			/* if($checkTotal->count() >= 75){
					$subidaLimit = $checkTotal->count()-5;
			}else{
					$subidaLimit = $checkTotal->count()-5;
			} */
			$hitTime = array(
					'type'=>'first'
					);
			$subida_query  = $this->subida_ad($category,$now,$time,$subidaLimit, $hitTime,$searchFilter);
			$subida  = $subida_query['subida_records'];
			
			// there are check @count 
			$subida_records = round(count($subida)/$subidaLimit);		
			// there are check already records
			$subida_ads_seen_history = DB::table('ads_seen_history')			
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)
			->where('start_time', '<=', $start_time)
			->where('end_time', '>=', $start_time)
			->where('type', 'subida')
			->limit(1)
			->first();
			
			if($subida_ads_seen_history!=null){					
			  $ads_id = explode(',',$subida_ads_seen_history->ads_id);			
			  $ads_id2 = explode(',',$subida_ads_seen_history->ads_id2);			
			  $ads_id3 = explode(',',$subida_ads_seen_history->ads_id3);			
			  $ads_id4 = explode(',',$subida_ads_seen_history->ads_id4);			
			  $GETId = array_merge($ads_id, $ads_id2, $ads_id3, $ads_id4);
				//$subida = 
				$hitTime = array(
					'type'=>'history',
					'GETId'=>$GETId
					);
			$subida_query  = $this->subida_ad($category,$now,$time,$subidaLimit, $hitTime,$searchFilter);
			$subida  = $subida_query['subida_records'];
			}else{
			
			// check and delete every grather then total row
			$subida_ads_seen_history_count = DB::table('ads_seen_history')			
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)	
			->where('type', 'subida')
			->first();
			
			
			// check already have a recods
			if($subida_ads_seen_history_count!=null){
			  
			  $ads_id = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id));
			  $ads_id2 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id2));
			  $ads_id3 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id3));
			  $ads_id4 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id4));
			  $ads_id5 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id5));
			  $ads_id6 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id6));
			  $ads_id7 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id7));
			  $ads_id8 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id8));
			  $ads_id9 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id9));
			  $ads_id10 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id10));
			  $ads_id11 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id11));
			  $ads_id12 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id12));
			  $ads_id13 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id13));
			  $ads_id14 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id14));
			  $ads_id15 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id15));
			
			 $GETId222 = array_merge(
			 $ads_id,
			 $ads_id2, 
			 $ads_id3,
			 $ads_id4,
			 $ads_id5,
			 $ads_id6,
			 $ads_id7,
			 $ads_id8,
			 $ads_id9,
			 $ads_id10,
			 $ads_id11,
			 $ads_id12,
			 $ads_id13,
			 $ads_id14,
			 $ads_id15
			 );			 
			$subida_check  = 
				$hitTime = array(
					'type'=>'subida_check',
					'GETId222'=>$GETId222
					);
			$subida_query  = $this->subida_ad($category,$now,$time,$subidaLimit=5, $hitTime,$searchFilter);
			$subida_check  = $subida_query['subida_records'];
			
					shuffle($ads_id);
					shuffle($ads_id2);
					shuffle($ads_id3);
					shuffle($ads_id4);
					shuffle($ads_id5);
					shuffle($ads_id6);
					shuffle($ads_id7);
					shuffle($ads_id8);
					shuffle($ads_id9);
					shuffle($ads_id10);
					shuffle($ads_id11);
					shuffle($ads_id12);
					shuffle($ads_id13);
					shuffle($ads_id14);
					shuffle($ads_id15);
				
					$ads_id_first = [];
					foreach ($subida_check as $plocations)
					{
					$ads_id_first[] = $plocations->id;
					}
					$IDS2 = implode(',', $ads_id_first);
					
					// INSERT LOG
			$AginStore = array_merge(
			$ads_id_first,
			$ads_id,
			$ads_id2,
			 $ads_id3,
			 $ads_id4,
			 $ads_id5,
			 $ads_id6,
			 $ads_id7,
			 $ads_id8,
			 $ads_id9,
			 $ads_id10,
			 $ads_id11,
			 $ads_id12,
			 $ads_id13,
			 $ads_id14);		
			
			$subidaStore = array();
			foreach($AginStore as $new){
				$hitTime = array(
					'type'=>'subida_single',
					'id'=>$new
					);
			$subida_query  = $this->subida_ad($category,$now,$time,$subidaLimit, $hitTime,$searchFilter);
			$subidaStore[]   = $subida_query['subida_records'];
				//$subidaStore[]  = 
			
			}
			$subida_first = array_filter($subidaStore);
			
			// check ads balance
			$balance = $subidaLimit - count($subida_first);
			$new_merge = array_merge($GETId222,$ads_id_first);
			$hitTime = array(
					'type'=>'last_subida',
					'new_merge'=>$new_merge
					);
			$subida_query  = $this->subida_ad($category,$now,$time,$subidaLimit=$balance, $hitTime,$searchFilter);
			$last_subida   = $subida_query['subida_records'];
				
			$subida = array_merge($subida_first,$last_subida);
			
			
					if(!empty($IDS2)){
					
					DB::table('ads_seen_history')	
						->insert(
						[
						'type' =>'subida',	
						'ip_address' =>$ip,	
						'ads_id' =>$IDS2,	
						'start_time' =>$start_time,	
						'end_time' =>$end_time,	
						'created_at'=>$start_time			
						]);
						$ads_seen_history_id_secondTime = DB::getPdo()->lastInsertid();;
						DB::table('ads_seen_history')
						->where('id',$ads_seen_history_id_secondTime)
						->update([		
						'ads_id2' => $subida_ads_seen_history_count->ads_id,		
						'ads_id3' => $subida_ads_seen_history_count->ads_id2,		
						'ads_id4' => $subida_ads_seen_history_count->ads_id3,		
						'ads_id5' => $subida_ads_seen_history_count->ads_id4,		
						'ads_id6' => $subida_ads_seen_history_count->ads_id5,		
						'ads_id7' => $subida_ads_seen_history_count->ads_id6,		
						'ads_id8' => $subida_ads_seen_history_count->ads_id7,		
						'ads_id9' => $subida_ads_seen_history_count->ads_id8,		
						'ads_id10' => $subida_ads_seen_history_count->ads_id9,		
						'ads_id11' => $subida_ads_seen_history_count->ads_id10,		
						'ads_id12' => $subida_ads_seen_history_count->ads_id11,		
						'ads_id13' => $subida_ads_seen_history_count->ads_id12,		
						'ads_id14' => $subida_ads_seen_history_count->ads_id13,		
						'ads_id15' => $subida_ads_seen_history_count->ads_id14
						]);
						
						foreach($AginStore as $ads_id_new){
									DB::table('subida_ads_seen_history')	
									->insert([									
									'ip_address' =>$ip,	
									'ads_id' =>$ads_id_new,																			
									'created_at'=>$start_time,
									]);
									
						}

					}
					// END
					
				}else{
				// store ids with show
				$ads_id = [];
				foreach ($subida as $plocations){
				$ads_id[] = $plocations->id;
				}
				$IDS = implode(',', $ads_id);
				$idsStore = explode(',',$IDS) ;
				
				$partition = $this->partition($idsStore, 5);
				
				if(array_key_exists(0, $partition) == true){
				$ads_id1 = implode(',', $partition[0]); 
				}else{
				$ads_id1 = '';
				}
				
				if(array_key_exists(1, $partition) == true){
				$ads_id2 = implode(',', $partition[1]);
				}else{
				$ads_id2 = '';
				}
				
				if(array_key_exists(2, $partition) == true){
				$ads_id3 = implode(',', $partition[2]); 
				}else{
				$ads_id3 = '';
				}
				
				if(array_key_exists(3, $partition) == true){
				$ads_id4 = implode(',', $partition[3]); 
				}else{
				$ads_id4 = '';
				}
				
				if(array_key_exists(4, $partition) == true){
				$ads_id5 = implode(',', $partition[4]); 
				}else{
				$ads_id5 = '';
				}
				if(array_key_exists(5, $partition) == true){
				$ads_id6 = implode(',', $partition[5]); 
				}else{
				$ads_id6 = '';
				}
				
				if(array_key_exists(6, $partition) == true){
				$ads_id7 = implode(',', $partition[6]); 
				}else{
				$ads_id7 = '';
				}
				
				if(array_key_exists(7, $partition) == true){
				$ads_id8 = implode(',', $partition[7]); 
				}else{
				$ads_id8 = '';
				}
				
				if(array_key_exists(8, $partition) == true){
				$ads_id9 = implode(',', $partition[8]); 
				}else{
				$ads_id9 = '';
				}
				
				if(array_key_exists(9, $partition) == true){
				$ads_id10 = implode(',', $partition[9]); 
				}else{
				$ads_id10 = '';
				}
				
				if(array_key_exists(10, $partition) == true){
				$ads_id11 = implode(',', $partition[10]); 
				}else{
				$ads_id11 = '';
				}
					
				
				if(array_key_exists(11, $partition) == true){
				$ads_id12 = implode(',', $partition[11]); 
				}else{
				$ads_id12 = '';
				}
				
				if(array_key_exists(12, $partition) == true){
				$ads_id13 = implode(',', $partition[12]); 
				}else{
				$ads_id13 = '';
				}
				
				if(array_key_exists(13, $partition) == true){
				$ads_id14 = implode(',', $partition[13]); 
				}else{
				$ads_id14 = '';
				}
				
				if(array_key_exists(14, $partition) == true){
				$ads_id15 = implode(',', $partition[14]); 
				}else{
				$ads_id15 = '';
				}
				
			
			
					// INSERT LOG
					if(!empty($IDS)){					
						DB::table('ads_seen_history')	
						->insert(
						[
						'type' =>'subida',	
						'ip_address' =>$ip,	
						'ads_id' =>$ads_id1,	
						'start_time' =>$start_time,	
						'end_time' =>$end_time,	
						'created_at'=>$start_time			
						]);
						$ads_seen_history_id = DB::getPdo()->lastInsertid();;
						DB::table('ads_seen_history')
						->where('id',$ads_seen_history_id)
						->update([		
						'ads_id2' => $ads_id2,		
						'ads_id3' => $ads_id3,		
						'ads_id4' => $ads_id4,		
						'ads_id5' => $ads_id5,		
						'ads_id6' => $ads_id6,		
						'ads_id7' => $ads_id7,		
						'ads_id8' => $ads_id8,		
						'ads_id9' => $ads_id9,		
						'ads_id10' => $ads_id10,		
						'ads_id11' => $ads_id11,		
						'ads_id12' => $ads_id12,		
						'ads_id13' => $ads_id13,		
						'ads_id14' => $ads_id14,		
						'ads_id15' => $ads_id15
						]);
					
						foreach($idsStore as $ads_id){
									DB::table('subida_ads_seen_history')	
									->insert([									
									'ip_address' =>$ip,	
									'ads_id' =>$ads_id,																			
									'created_at'=>$start_time,
									]);
									
							}
					}
						// END
					
					}
			}
			$subidaIds = [];
			foreach ($subida as $subidaData)
			{
				$subidaIds[] = $subidaData->id;
			}
			
			$top_zonaIds = [];
			foreach ($top_zona as $top_zonaData)
			{
				$top_zonaIds[] = $top_zonaData->id;
			}
	
			$hitTime = array(
				'type'=>'get_subida_going_address'	,		
				'subidaIds'=>$subidaIds,		
				'top_zonaIds'=>$top_zonaIds,		

				);
				 $get_subida_going_address =  $this->free_ad($category,0,$hitTime,$searchFilter);		
		
			shuffle($get_subida_going_address); 
			
			//END ESCORT FREEE
			/*-----------------start free ads----------------*/
        return view('front.search.index',['location'=>$location,'keywords'=>$keywords,'top_zona'=>$top_zona,'subida'=>$subida,'category'=>$category,'get_subida_going_address'=>$get_subida_going_address, 'nacionalidad'=>$nacionalidad, 'services'=>$services, 'schedule'=>$schedule, 'novedad'=>$novedad, 'tipo'=>$tipo, 'height'=>$height, 'age'=>$age, 'hair'=>$hair, 'price'=>$price],$data); 
    }
	public function setLocale($locale=null){	
		Session::put('lang', $locale);	
		return redirect(url(URL::previous()));
    }
	
	function partition(Array $list, $p) {
	$partition = array_chunk($list, $p);
    return $partition;
}

	function getHour($profile_ads_id) {			 	
			$timeslot  = DB::table('top_subida_profile_lists')
			->select('from_date_time','to_date_time','seen_daily')												
			->where('profile_ads_id', $profile_ads_id)
			->first();			
			$ts1 = strtotime($timeslot->from_date_time);
			$ts2 = strtotime($timeslot->to_date_time);
			$diff = abs($ts1 - $ts2) / 3600;
			if(!empty($diff) && $diff>0 && $timeslot->seen_daily>0){			
				return $diff/$timeslot->seen_daily;
			}else{
			return 0;
			}
			
}
	
	function top_zona($category,$now,$topLimit,$hitTime,$searchFilter){		
			$top_zona_query = DB::table('top_subida_profile_lists');
			$top_zona_query->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id');
			$top_zona_query->leftJoin('province', 'province.id', '=', 'profile_ads.province');
			$top_zona_query->leftJoin('tariffs', 'tariffs.profile_id', '=', 'profile_ads.id');
			$top_zona_query->leftJoin('schedule', 'schedule.profile_ads_id', '=', 'profile_ads.id');
			$top_zona_query->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'province.name',
			'profile_ads.population',
			'profile_ads.member_id',
			'profile_ads.role',
			'profile_ads.title',
			'profile_ads.profile_pic',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category'
			);
			$top_zona_query->where('top_subida_profile_lists.type', 'top');
			$top_zona_query->where('profile_ads.status', '1');
			$top_zona_query->where('profile_ads.user_status', '1');
			$top_zona_query->where('profile_ads.category', $category);
			$top_zona_query->where('top_subida_profile_lists.from_date', '<=', $now);
			$top_zona_query->where('top_subida_profile_lists.to_date', '>=', $now);
			$top_zona_query->orderByRaw('RAND()');
			$top_zona_query->groupBy('top_subida_profile_lists.profile_ads_id');
			
				if(!empty($searchFilter['keywords'])){				
				foreach($searchFilter['keywords'] as $keywords){				
					if($keywords=='whatsapp'){
							$top_zona_query->where('profile_ads.contact_me_by_whatsApp', 'Yes');
					}else if($keywords=='agencia'){
							$top_zona_query->where('profile_ads.role', 'Agency');
					}else if($keywords=='independiente'){
							$top_zona_query->where('profile_ads.role', 'Individual');
					}else if($keywords=='selfies'){
							for($i=1; $i<=1; $i++) {
								$top_zona_query->whereNotNull('profile_ads.selfie_'.$i);
							};								
					}else{
					//over_you services hair eyes					
						 $top_zona_query->where(function($top_zona_query) use($keywords) {	
						$keywords = rawurldecode(str_replace(".", " ", $keywords));
						   for($i=1; $i<=4; $i++) {		
								if($i==1){
								$top_zona_query->orWhere('profile_ads.hair', 'like', "%$keywords%");
								}
									if($i==2){
									
								$top_zona_query->orWhere('profile_ads.services', 'like', "%$keywords%");
								}
									if($i==3){
								$top_zona_query->orWhere('profile_ads.over_you', 'like', "%$keywords%");
								}
									if($i==4){
								$top_zona_query->orWhere('profile_ads.eyes', 'like', "%$keywords%");
								}
							};
						});
					}
				}
		}	
		
			if($hitTime['type']=='history'){
				$top_zona_query->whereIn('profile_ads.id',   $hitTime['ids']);
			}
			
			if($hitTime['type']=='duplicate'){
				$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['ids']);
			}	
			
			if(!empty($searchFilter['location'])){	
			$field = ['province.name','profile_ads.population'];
			$string = $searchFilter['location'][0];
			$top_zona_query->Where(function ($top_zona_query) use($string, $field) {
             for ($i = 1; $i <=2; $i++){
				if($i==1){
				 $top_zona_query->orwhere('province.name', 'like',  '%' . $string .'%');
				}
				if($i==2){
				 $top_zona_query->orwhere('profile_ads.population', 'like',  '%' . $string .'%');
				}
               
             }      
        });
				/* foreach($searchFilter['location'] as $location){													
					$top_zona_query->where('province.name', 'like','%' .$location. '%');	
				} */
		}	
				
				if(!empty($searchFilter['nationality'])){				
						foreach($searchFilter['nationality'] as $nationality){
							if($nationality!='all'){		
							$nationality = rawurldecode(strtolower(str_replace(".", " ", $nationality)));
							$top_zona_query->where('profile_ads.nationality', 'like','%' .$nationality. '%');				
							}
						}
				}	
				
				if(!empty($searchFilter['novedad'])){				
						foreach($searchFilter['novedad'] as $novedad){
							if($novedad!='0'){							
								$date = \Carbon\Carbon::today()->subDays($novedad);				
								$top_zona_query->whereDate('profile_ads.created_at', '>=', $date);		
							}
						}
				}	
				
					if(!empty($searchFilter['schedule'])){
						$i = 1;
						foreach($searchFilter['schedule'] as $schedule){
							if($i==1){
								if($schedule>0){										
									$top_zona_query->where('schedule.from_1', '>=',  $schedule);
								}
							}
							if($i==2){
								if($schedule<24){
									$top_zona_query->where('schedule.unit_1', '<=',  $schedule);
								}
							}
							$i++;
						}
				}	
				
				if(!empty($searchFilter['services'])){				
				$top_zona_services = $searchFilter['services'];
				 $top_zona_query->where(function($top_zona_query) use($top_zona_services) {
                        foreach($top_zona_services as $term) {							
							$term = rawurldecode(str_replace(".", " ", $term));
                            $top_zona_query->orWhere('profile_ads.services', 'like', "%$term%");
                        };
                    });	
				}	
				if(!empty($searchFilter['tipo'])){				
				$tipo = $searchFilter['tipo'];
				 $top_zona_query->where(function($top_zona_query) use($tipo) {
                        foreach($tipo as $term) {
							if($term=='independiente'){
							$top_zona_query->orWhere('profile_ads.role', 'like', "%individual%");
							}
							if($term=='agencia'){
							$top_zona_query->orWhere('profile_ads.role', 'like', "%agency%");
							}
                        };
                    });	
				}	
				if(!empty($searchFilter['tipo'])){				
					$tipo = $searchFilter['tipo'];				 
                        foreach($tipo as $term) {
						if($term=='verificado'){
							$top_zona_query->where('profile_ads.telephone_verify', 1);
						}
						if($term=='videos'){								
							for($i=1; $i<=1; $i++) {
								$top_zona_query->whereNotNull('profile_ads.video_'.$i);
							};								
						}
                        };
                    
				}
				
					if(!empty($searchFilter['age'])){
						$i = 1;
						foreach($searchFilter['age'] as $age){
							if($i==1){
								if($age>18){
									$top_zona_query->where('profile_ads.age', '>=',  $age);
								}
							}
							if($i==2){
								if($age<60){
									$top_zona_query->where('profile_ads.age', '<=',  $age);
								}
							}
							$i++;
						}
				}	
				
					if(!empty($searchFilter['height'])){
						$i = 1;
						foreach($searchFilter['height'] as $height){
							if($i==1){
								if($height>90){
								$top_zona_query->where('profile_ads.height', '>=',  $height);
								}
							}
							if($i==2){
								if($height<250){
									$top_zona_query->where('profile_ads.height', '<=',  $height);	
								}
							}
							$i++;
						}
				}	
				
					if(!empty($searchFilter['price'])){
						$i = 1;
						foreach($searchFilter['price'] as $price){
							if($i==1){
							if($price>25){
								$top_zona_query->where('profile_ads.tariffs', '>=',  $price);
							}

							}
							if($i==2){
							if($price<400){
								$top_zona_query->where('profile_ads.tariffs', '<=',  $price);
							}
							}
							$i++;
						}
				}
				if(!empty($searchFilter['hair'])){				
				$top_zona_hair = $searchFilter['hair'];
				 $top_zona_query->where(function($top_zona_query) use($top_zona_hair) {
                        foreach($top_zona_hair as $term) {
							$term = str_replace(".", " ", $term);							
                            $top_zona_query->orWhere('profile_ads.hair', 'like', "%$term%");
                        };
                    });	
				}
			if($hitTime['type']=='first'){
				$top_zona_query->limit($topLimit);
			}
			$top_zona = $top_zona_query->get();	
			$top_zona_check = $top_zona_query->count();
			return array('top_zona_records'=>$top_zona, 'top_zona_count'=>$top_zona_check);
			}
	
			function subida_ad($category,$now,$time,$subidaLimit,$hitTime,$searchFilter){		
			$top_zona_query = DB::table('top_subida_profile_lists');
			$top_zona_query->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id');
			$top_zona_query->leftJoin('province', 'province.id', '=', 'profile_ads.province');
			$top_zona_query->leftJoin('tariffs', 'tariffs.profile_id', '=', 'profile_ads.id');
			$top_zona_query->leftJoin('schedule', 'schedule.profile_ads_id', '=', 'profile_ads.id');
			$top_zona_query->leftJoin('subida_ads_seen_history', 'top_subida_profile_lists.profile_ads_id', '=', 'subida_ads_seen_history.ads_id');
			$top_zona_query->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.member_id',
			'profile_ads.population',
			'profile_ads.role',
			'profile_ads.profile_pic',
			'profile_ads.title',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category',
			'top_subida_profile_lists.seen_daily',
			'top_subida_profile_lists.from_date_time',
			'top_subida_profile_lists.to_date_time',
			'top_subida_profile_lists.seen_daily',
			DB::raw('IFNULL(COUNT(subida_ads_seen_history.id),0) AS balance')
			);
			$top_zona_query->where('top_subida_profile_lists.type', 'subida');
			$top_zona_query->where('profile_ads.status', '1');
			$top_zona_query->where('profile_ads.user_status_subida', '1');
			$top_zona_query->where('profile_ads.category', $category);
			$top_zona_query->where('top_subida_profile_lists.from_date', '<=', $now);
			$top_zona_query->where('top_subida_profile_lists.to_date', '>=', $now);
			$top_zona_query->where('top_subida_profile_lists.from_date_time', '<=', $time);
			$top_zona_query->where('top_subida_profile_lists.to_date_time', '>=', $time) ;
			
			$top_zona_query->groupBy('top_subida_profile_lists.profile_ads_id');
				if(!empty($searchFilter['keywords'])){				
				foreach($searchFilter['keywords'] as $keywords){				
					if($keywords=='whatsapp'){
							$top_zona_query->where('profile_ads.contact_me_by_whatsApp', 'Yes');
					}else if($keywords=='agencia'){
							$top_zona_query->where('profile_ads.role', 'Agency');
					}else if($keywords=='independiente'){
							$top_zona_query->where('profile_ads.role', 'Individual');
					}else if($keywords=='selfies'){
							for($i=1; $i<=1; $i++) {
								$top_zona_query->whereNotNull('profile_ads.selfie_'.$i);
							};								
					}else{
					//over_you services hair eyes					
						 $top_zona_query->where(function($top_zona_query) use($keywords) {
						 $keywords = str_replace(".", " ", $keywords);
						   for($i=1; $i<=4; $i++) {		
								if($i==1){
								$top_zona_query->orWhere('profile_ads.hair', 'like', "%$keywords%");
								}
									if($i==2){
								$top_zona_query->orWhere('profile_ads.services', 'like', "%$keywords%");
								}
									if($i==3){
								$top_zona_query->orWhere('profile_ads.over_you', 'like', "%$keywords%");
								}
									if($i==4){
								$top_zona_query->orWhere('profile_ads.eyes', 'like', "%$keywords%");
								}
							};
						});
					}
				}
		}	
		
			if($hitTime['type']=='history'){
				$top_zona_query->whereIn('profile_ads.id',   $hitTime['ids']);
			}
			
			if($hitTime['type']=='duplicate'){
				$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['ids']);
			}	
		/* 	if(!empty($searchFilter['location'])){				
				foreach($searchFilter['location'] as $location){													
					$top_zona_query->where('province.name', 'like','%' .$location. '%');	
				}
		}	 */
		if(!empty($searchFilter['location'])){	
			$field = ['province.name','profile_ads.population'];
			$string = $searchFilter['location'][0];
			$top_zona_query->Where(function ($top_zona_query) use($string, $field) {
             for ($i = 1; $i <=2; $i++){
				if($i==1){
				 $top_zona_query->orwhere('province.name', 'like',  '%' . $string .'%');
				}
				if($i==2){
				 $top_zona_query->orwhere('profile_ads.population', 'like',  '%' . $string .'%');
				}
               
             }      
        });
				/* foreach($searchFilter['location'] as $location){													
					$top_zona_query->where('province.name', 'like','%' .$location. '%');	
				} */
		}
				
				if(!empty($searchFilter['nationality'])){				
						foreach($searchFilter['nationality'] as $nationality){
							if($nationality!='all'){	
							$nationality = rawurldecode(strtolower(str_replace(".", " ", $nationality)));
							$top_zona_query->where('profile_ads.nationality', 'like','%' .$nationality. '%');				
							}
						}
				}	
				
				if(!empty($searchFilter['novedad'])){				
						foreach($searchFilter['novedad'] as $novedad){
							if($novedad!='0'){							
								$date = \Carbon\Carbon::today()->subDays($novedad);				
								$top_zona_query->whereDate('profile_ads.created_at', '>=', $date);		
							}
						}
				}	
				
					if(!empty($searchFilter['schedule'])){
						$i = 1;
						foreach($searchFilter['schedule'] as $schedule){
							if($i==1){
								if($schedule>0){										
									$top_zona_query->where('schedule.from_1', '>=',  $schedule);
								}
							}
							if($i==2){
								if($schedule<24){
									$top_zona_query->where('schedule.unit_1', '<=',  $schedule);
								}
							}
							$i++;
						}
				}	
				
				if(!empty($searchFilter['services'])){				
				$top_zona_services = $searchFilter['services'];
				 $top_zona_query->where(function($top_zona_query) use($top_zona_services) {
                        foreach($top_zona_services as $term) {
							$term = rawurldecode(str_replace(".", " ", $term));
                            $top_zona_query->orWhere('profile_ads.services', 'like', "%$term%");
                        };
                    });	
				}	
				if(!empty($searchFilter['tipo'])){				
				$tipo = $searchFilter['tipo'];
				 $top_zona_query->where(function($top_zona_query) use($tipo) {
                        foreach($tipo as $term) {
							if($term=='independiente'){
							$top_zona_query->orWhere('profile_ads.role', 'like', "%individual%");
							}
							if($term=='agencia'){
							$top_zona_query->orWhere('profile_ads.role', 'like', "%agency%");
							}
                        };
                    });	
				}	
				if(!empty($searchFilter['tipo'])){				
					$tipo = $searchFilter['tipo'];				 
                        foreach($tipo as $term) {
						if($term=='verificado'){
							$top_zona_query->where('profile_ads.telephone_verify', 1);
						}
						if($term=='videos'){								
							for($i=1; $i<=1; $i++) {
								$top_zona_query->whereNotNull('profile_ads.video_'.$i);
							};								
						}
                        };
                    
				}
				
					if(!empty($searchFilter['age'])){
						$i = 1;
						foreach($searchFilter['age'] as $age){
							if($i==1){
								if($age>18){
									$top_zona_query->where('profile_ads.age', '>=',  $age);
								}
							}
							if($i==2){
								if($age<60){
									$top_zona_query->where('profile_ads.age', '<=',  $age);
								}
							}
							$i++;
						}
				}	
				
					if(!empty($searchFilter['height'])){
						$i = 1;
						foreach($searchFilter['height'] as $height){
							if($i==1){
								if($height>90){
								$top_zona_query->where('profile_ads.height', '>=',  $height);
								}
							}
							if($i==2){
								if($height<250){
									$top_zona_query->where('profile_ads.height', '<=',  $height);	
								}
							}
							$i++;
						}
				}	
				
					if(!empty($searchFilter['price'])){
						$i = 1;
						foreach($searchFilter['price'] as $price){
							if($i==1){
							if($price>25){
								$top_zona_query->where('profile_ads.tariffs', '>=',  $price);
							}

							}
							if($i==2){
							if($price<400){
								$top_zona_query->where('profile_ads.tariffs', '<=',  $price);
							}
							}
							$i++;
						}
				}
				if(!empty($searchFilter['hair'])){				
				$top_zona_hair = $searchFilter['hair'];
				 $top_zona_query->where(function($top_zona_query) use($top_zona_hair) {
                        foreach($top_zona_hair as $term) {
							$term = str_replace(".", " ", $term);							
                            $top_zona_query->orWhere('profile_ads.hair', 'like', "%$term%");
                        };
                    });	
				}
			
			if($hitTime['type']=='first'){
				$top_zona_query->limit($subidaLimit);
				$top_zona_query->orderByRaw('RAND()');
				$top_zona_query->orderby('top_subida_profile_lists.from_date', '=', 'desc');
			}
			if($hitTime['type']=='history'){
				$top_zona_query->whereIn('profile_ads.id',   $hitTime['GETId']);				
			}
			
			if($hitTime['type']=='subida_check'){
				$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['GETId222']);		
				$top_zona_query->limit($subidaLimit);
				$top_zona_query->orderby('top_subida_profile_lists.from_date', '=', 'desc');
			}
			if($hitTime['type']=='subida_single'){
				$top_zona_query->where('profile_ads.id',   $hitTime['id']);				
			}
			
			if($hitTime['type']=='last_subida'){
				$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['new_merge']);	
				$top_zona_query->limit($subidaLimit);
			}
			if($hitTime['type']=='subida_single'){
				$subida = $top_zona_query->get()->first();					
			}else{			
				$subida = $top_zona_query->get()->all();			
			}
			
			$subida_count_check = $top_zona_query->count();
			return array('subida_records'=>$subida, 'subida_count'=>$subida_count_check);
			}
	
	function free_ad($category,$topLimit,$hitTime,$searchFilter){		
			$top_zona_query = DB::table('profile_ads');
			$top_zona_query->leftJoin('top_subida_profile_lists', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id');
			$top_zona_query->leftJoin('province', 'province.id', '=', 'profile_ads.province');
			$top_zona_query->leftJoin('tariffs', 'tariffs.profile_id', '=', 'profile_ads.id');
			$top_zona_query->leftJoin('schedule', 'schedule.profile_ads_id', '=', 'profile_ads.id');
			$top_zona_query->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'province.name',
			'profile_ads.member_id',
			'profile_ads.population',
			'profile_ads.role',
			'profile_ads.title',
			'profile_ads.profile_pic',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category'
			);
			$top_zona_query->where('profile_ads.status', '1');
			$top_zona_query->where('profile_ads.user_status_subida', '1');
			$top_zona_query->where('profile_ads.user_status', '1');
			$top_zona_query->where('profile_ads.category', $category);		
			$top_zona_query->groupBy('profile_ads.id');
			//$top_zona_query->groupBy('top_subida_profile_lists.profile_ads_id');
			if($hitTime['type']=='freeAds'){				
				$top_zona_query->limit($topLimit);
				$top_zona_query->orderby('profile_ads.created_at', '=', 'desc');
				$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['subidaIds']);
				$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['top_zonaIds']);
			}	
			
			if($hitTime['type']=='get_subida_going_4Ads'){				
				$top_zona_query->limit($topLimit);
				$top_zona_query->orderByRaw('RAND()');
				$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['subidaIds']);
				$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['top_zonaIds']);
				$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['freeAds']);
			}
			if($hitTime['type']=='get_subida_going_address'){ 
				$top_zona_query->orderByRaw('RAND()');
				$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['subidaIds']);
				$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['top_zonaIds']);
				//$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['freeAds']);
				//$top_zona_query->whereNotIn('profile_ads.id',   $hitTime['get_subida_going_4AdsIds']);
			}
			
				if(!empty($searchFilter['keywords'])){				
				foreach($searchFilter['keywords'] as $keywords){				
					if($keywords=='whatsapp'){
							$top_zona_query->where('profile_ads.contact_me_by_whatsApp', 'Yes');
					}else if($keywords=='agencia'){
							$top_zona_query->where('profile_ads.role', 'Agency');
					}else if($keywords=='independiente'){
							$top_zona_query->where('profile_ads.role', 'Individual');
					}else if($keywords=='selfies'){
							for($i=1; $i<=1; $i++) {
								$top_zona_query->whereNotNull('profile_ads.selfie_'.$i);
							};								
					}else{
					//over_you services hair eyes					
						 $top_zona_query->where(function($top_zona_query) use($keywords) {	
						$keywords = rawurldecode(str_replace(".", " ", $keywords));
						   for($i=1; $i<=4; $i++) {		
								if($i==1){
								$top_zona_query->orWhere('profile_ads.hair', 'like', "%$keywords%");
								}
									if($i==2){
								$top_zona_query->orWhere('profile_ads.services', 'like', "%$keywords%");
								}
									if($i==3){
								$top_zona_query->orWhere('profile_ads.over_you', 'like', "%$keywords%");
								}
									if($i==4){
								$top_zona_query->orWhere('profile_ads.eyes', 'like', "%$keywords%");
								}
							};
						});
					}
				}
		}	
		
		
				/* if(!empty($searchFilter['location'])){				
						foreach($searchFilter['location'] as $location){													
							$top_zona_query->where('province.name', 'like','%' .$location. '%');	
						}
				} */	
				if(!empty($searchFilter['location'])){	
			$field = ['province.name','profile_ads.population'];
			$string = $searchFilter['location'][0];
			$top_zona_query->Where(function ($top_zona_query) use($string, $field) {
             for ($i = 1; $i <=2; $i++){
				if($i==1){
				 $top_zona_query->orwhere('province.name', 'like',  '%' . $string .'%');
				}
				if($i==2){
				 $top_zona_query->orwhere('profile_ads.population', 'like',  '%' . $string .'%');
				}
               
             }      
        });
				/* foreach($searchFilter['location'] as $location){													
					$top_zona_query->where('province.name', 'like','%' .$location. '%');	
				} */
		}
								
				if(!empty($searchFilter['nationality'])){				
						foreach($searchFilter['nationality'] as $nationality){
							if($nationality!='all'){				
							$nationality = rawurldecode(strtolower(str_replace(".", " ", $nationality)));
							$top_zona_query->where('profile_ads.nationality', 'like','%' .$nationality. '%');				
							}
						}
				}	
				
				if(!empty($searchFilter['novedad'])){				
						foreach($searchFilter['novedad'] as $novedad){
							if($novedad!='0'){							
								$date = \Carbon\Carbon::today()->subDays($novedad);				
								$top_zona_query->whereDate('profile_ads.created_at', '>=', $date);		
							}
						}
				}	
				
					if(!empty($searchFilter['schedule'])){
						$i = 1;
						foreach($searchFilter['schedule'] as $schedule){
							if($i==1){
								if($schedule>0){										
									$top_zona_query->where('schedule.from_1', '>=',  $schedule);
								}
							}
							if($i==2){
								if($schedule<24){
									$top_zona_query->where('schedule.unit_1', '<=',  $schedule);
								}
							}
							$i++;
						}
				}	
				
				if(!empty($searchFilter['services'])){				
				$top_zona_services = $searchFilter['services'];
				 $top_zona_query->where(function($top_zona_query) use($top_zona_services) {
                        foreach($top_zona_services as $term) {
							$term = rawurldecode(str_replace(".", " ", $term));
                            $top_zona_query->orWhere('profile_ads.services', 'like', "%$term%");
                        };
                    });	
				}	
				if(!empty($searchFilter['tipo'])){				
				$tipo = $searchFilter['tipo'];
				 $top_zona_query->where(function($top_zona_query) use($tipo) {
                        foreach($tipo as $term) {
							if($term=='independiente'){
							$top_zona_query->orWhere('profile_ads.role', 'like', "%individual%");
							}
							if($term=='agencia'){
							$top_zona_query->orWhere('profile_ads.role', 'like', "%agency%");
							}
                        };
                    });	
				}	
				if(!empty($searchFilter['tipo'])){				
					$tipo = $searchFilter['tipo'];				 
                        foreach($tipo as $term) {
						if($term=='verificado'){
							$top_zona_query->where('profile_ads.telephone_verify', 1);
						}
						if($term=='videos'){								
							for($i=1; $i<=1; $i++) {
								$top_zona_query->whereNotNull('profile_ads.video_'.$i);
							};								
						}
                        };
                    
				}
				
					if(!empty($searchFilter['age'])){
						$i = 1;
						foreach($searchFilter['age'] as $age){
							if($i==1){
								if($age>18){
									$top_zona_query->where('profile_ads.age', '>=',  $age);
								}
							}
							if($i==2){
								if($age<60){
									$top_zona_query->where('profile_ads.age', '<=',  $age);
								}
							}
							$i++;
						}
				}	
				
					if(!empty($searchFilter['height'])){
						$i = 1;
						foreach($searchFilter['height'] as $height){
							if($i==1){
								if($height>90){
								$top_zona_query->where('profile_ads.height', '>=',  $height);
								}
							}
							if($i==2){
								if($height<250){
									$top_zona_query->where('profile_ads.height', '<=',  $height);	
								}
							}
							$i++;
						}
				}	
				
					if(!empty($searchFilter['price'])){
						$i = 1;
						foreach($searchFilter['price'] as $price){
							if($i==1){
							if($price>25){							
								$top_zona_query->where('profile_ads.tariffs', '>=',  $price);
							}

							}
							if($i==2){
							if($price<400){
								$top_zona_query->where('profile_ads.tariffs', '<=',  $price);
							}
							}
							$i++;
						}
				}
				if(!empty($searchFilter['hair'])){				
				$top_zona_hair = $searchFilter['hair'];
				 $top_zona_query->where(function($top_zona_query) use($top_zona_hair) {
                        foreach($top_zona_hair as $term) {
							$term = str_replace(".", " ", $term);							
                            $top_zona_query->orWhere('profile_ads.hair', 'like', "%$term%");
                        };
                    });	
				}
		
			$top_zona = $top_zona_query->get()->all();				
			return $top_zona;
			}
}
