<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	//principal
	public function home () {
	
		//deteccion
		if(Agent::isMobile()){
			
			return View::make("home-a");
			
		} else {
			return View::make("hello");
		}
		
	}
	
	public function cerca() {
		return "aqui va un mapa";
	}

	public function explora()
	{
		$delegaciones = DB::select("SELECT distinct delegacion_nombre, replace(lower(delegacion_nombre),' ','-') as link from mercados order by delegacion_nombre asc");
		
		$tipos = DB::select("SELECT DISTINCT tipo_desc, replace(lower(tipo_desc),' ','-') as link FROM mercados ORDER BY tipo_desc ASC");
		
		//var_dump($delegaciones);
		
		
		//hace la consulta con los mercados aleatorios para la prueba
		//$results = DB::select('SELECT * FROM mercados ORDER BY RANDOM() LIMIT 5');	
		
		//genera la vista
		return View::make('explora', array("delegaciones"=>$delegaciones,"tipos"=>$tipos));
	}

}
