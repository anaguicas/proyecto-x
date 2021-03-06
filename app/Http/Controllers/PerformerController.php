<?php
namespace App\Http\Controllers;

use App\Http\Request\RegistroFormRequest;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PerformerRepo;
use App\Repositories\UsersRepo;
use App\Repositories\CreditCardRepo;
use Validator;

use Auth;
use Session;
use Redirect;

class PerformerController extends Controller{

	private $PerformerRepo;
	private $UsersRepo;

	public function __construct(){
		$this->PerformerRepo 	= New PerformerRepo();
		$this->UsersRepo 		= New UsersRepo();	
		$this->creditRepo	= New CreditCardRepo;
	}

	public function Country(){
		$country = array(
			'Afganistán' => 'Afganistán','Albania' => 'Albania','Alemania' => 'Alemania','Andorra' => 'Andorra','Angola' => 'Angola',
			'Antigua y Barbuda' => 'Antigua y Barbuda','Arabia Saudita' => 'Arabia Saudita',
			'Argelia' => 'Argelia',
			'Argentina' => 'Argentina','Armenia' => 'Armenia','Australia' => 'Australia','Austria' => 'Austria',
			'Azerbaiyán' => 'Azerbaiyán',
			'Bahamas' => 'Bahamas','Bangladés' => 'Bangladés','Barbados' => 'Barbados','Baréin' => 'Baréin','Bélgica' => 'Bélgica','Belice' => 'Belice',
			'Benín' => 'Benín','Bielorrusia' => 'Bielorrusia','Birmania' => 'Birmania','Bolivia' => 'Bolivia','Bosnia y Herzegovina' => 'Bosnia y Herzegovina',
			'Botsuana' => 'Botsuana','Brasil' => 'Brasil','Brunéi' => 'Brunéi','Bulgaria' => 'Bulgaria','Burkina Faso' => 'Burkina Faso',
			'Burundi' => 'Burundi','Bután' => 'Bután','Cabo Verde' => 'Cabo Verde','Camboya' => 'Camboya','Camerún' => 'Camerún',
			'Canadá' => 'Canadá','Catar' => 'Catar','Chad' => 'Chad','Chile' => 'Chile','China' => 'China','Chipre' => 'Chipre',
			'Ciudad del Vaticano' => 'Ciudad del Vaticano','Colombia' => 'Colombia','Comoras' => 'Comoras','Corea del Norte' => 'Corea del Norte',
			'Corea del Sur' => 'Corea del Sur','Costa de Marfil' => 'Costa de Marfil','Costa Rica' => 'Costa Rica','Croacia' => 'Croacia','Cuba' => 'Cuba',
			'Dinamarca' => 'Dinamarca','Dominica' => 'Dominica','Ecuador' => 'Ecuador','Egipto' => 'Egipto','El Salvador' => 'El Salvador',
			'Emiratos Árabes Unido' => 'Emiratos Árabes Unidos','Eritrea' => 'Eritrea',
			'Eslovaquia' => 'Eslovaquia','Eslovenia' => 'Eslovenia','España' => 'España','Estados Unidos' => 'Estados Unidos','Estonia' => 'Estonia',
			'Etiopía' => 'Etiopía','Filipinas' => 'Filipinas','Finlandia' => 'Finlandia','Fiyi' => 'Fiyi','Francia' => 'Francia',
			'Gabón' => 'Gabón','Gambia' => 'Gambia','Georgia' => 'Georgia','Ghana' => 'Ghana','Granada' => 'Granada','Grecia' => 'Grecia',
			'Guatemala' => 'Guatemala','Guyana' => 'Guyana','Guinea' => 'Guinea','Guinea ecuatorial' => 'Guinea ecuatorial',
			'Guinea-Bisáu' => 'Guinea-Bisáu','Haití' => 'Haití','Honduras' => 'Honduras','Hungría' => 'Hungría','India' => 'India',
			'Indonesia' => 'Indonesia','Irak' => 'Irak','Irán' => 'Irán','Irlanda' => 'Irlanda','Islandia' => 'Islandia',
			'Islas Marshall' => 'Islas Marshall','Islas Salomón' => 'Islas Salomón','Israel' => 'Israel','Italia' => 'Italia','Jamaica' => 'Jamaica',
			'Japón' => 'Japón','Jordania' => 'Jordania','Kazajistán' => 'Kazajistán','Kenia' => 'Kenia','Kirguistán' => 'Kirguistán','Kiribati' => 'Kiribati',
			'Kuwait' => 'Kuwait','Laos' => 'Laos','Lesoto' => 'Lesoto','Letonia' => 'Letonia','Líbano' => 'Líbano','Liberia' => 'Liberia',
			'Libia' => 'Libia','Liechtenstein' => 'Liechtenstein','Lituania' => 'Lituania','Luxemburgo' => 'Luxemburgo','Madagascar' => 'Madagascar',
			'Malasia' => 'Malasia','Malaui' => 'Malaui','Maldivas' => 'Maldivas','Malí' => 'Malí','Malta' => 'Malta','Marruecos' => 'Marruecos','Mauricio' => 'Mauricio',
			'Mauritania' => 'Mauritania','México' => 'México','Micronesia' => 'Micronesia','Moldavia' => 'Moldavia','Mónaco' => 'Mónaco','Mongolia' => 'Mongolia',
			'Montenegro' => 'Montenegro','Mozambique' => 'Mozambique','Namibia' => 'Namibia','Nauru' => 'Nauru','Nepal' => 'Nepal','Nicaragua' => 'Nicaragua','Níger' => 'Níger',
			'Nigeria' => 'Nigeria','Noruega' => 'Noruega','Nueva Zelanda' => 'Nueva Zelanda','Omán' => 'Omán','Países Bajos' => 'Países Bajos',
			'Pakistán' => 'Pakistán','Palaos' => 'Palaos','Panamá' => 'Panamá','Papúa Nueva Guinea' => 'Papúa Nueva Guinea','Paraguay' => 'Paraguay','Perú' => 'Perú',
			'Polonia' => 'Polonia', 'Portugal' => 'Portugal','Reino Unido' => 'Reino Unido','República Centroafricana' => 'República Centroafricana',
			'República Checa' => 'República Checa','República de Macedonia' => 'República de Macedonia','República del Congo' => 'República del Congo',
			'República Democrática del Congo' => 'República Democrática del Congo','República Dominicana' => 'República Dominicana',
			'República Sudafricana' => 'República Sudafricana','Ruanda' => 'Ruanda','Rumanía' => 'Rumanía',	'Rusia' => 'Rusia',
			'Samoa' => 'Samoa','San Cristóbal y Nieves' => 'San Cristóbal y Nieves','San Marino' => 'San Marino','San Vicente y las Granadinas' => 'San Vicente y las Granadinas',
			'Santa Lucía' => 'Santa Lucía','Santo Tomé y Príncipe' => 'Santo Tomé y Príncipe','Senegal' => 'Senegal','Serbia' => 'Serbia',
			'Seychelles' => 'Seychelles','Sierra Leona' => 'Sierra Leona','Singapur' => 'Singapur','Siria' => 'Siria',
			'Somalia' => 'Somalia','Sri Lanka' => 'Sri Lanka','Suazilandia' => 'Suazilandia','Sudán' => 'Sudán','Sudán del Sur' => 'Sudán del Sur',
			'Suecia' => 'Suecia','Suiza' => 'Suiza','Surinam' => 'Surinam','Tailandia' => 'Tailandia','Tanzania' => 'Tanzania',
			'Tayikistán' => 'Tayikistán','Timor Oriental' => 'Timor Oriental','Togo' => 'Togo','Tonga' => 'Tonga','Trinidad y Tobago' => 'Trinidad y Tobago',
			'Túnez' => 'Túnez','Turkmenistán' => 'Turkmenistán','Turquía' => 'Turquía','Tuvalu' => 'Tuvalu','Ucrania' => 'Ucrania','Uganda' => 'Uganda',
			'Uruguay' => 'Uruguay','Uzbekistán' => 'Uzbekistán','Vanuatu' => 'Vanuatu','Venezuela' => 'Venezuela','Vietnam' => 'Vietnam',
			'Yemen' => 'Yemen','Yibuti' => 'Yibuti','Zambia' => 'Zambia','Zimbabue' => 'Zimbabue'
			);

		return $country;
	}

	public function Bank(){

		$bank = array(
			'Davivienda' => 'Davivienda',
			'Bancolombia' => 'Bancolombia',
			'Banco de Bogota' => 'Banco de Bogotá'
			);

		return $bank;
	}

	public function Inicio(){
		
		//validacion de inicio de sesion
		if(Auth::check() and Auth::user()->user_type == 1){
			$id = Auth::user()->id;
			return view('performers/inicio',['id' => $id]);
		}else{
			return Redirect::to('/');
		}
	}

	public function FormRegister(){		

		$country = $this->Country();
		$bank	 = $this->Bank();

		return view('performers/registro', ['country' => $country, 'bank' => $bank]);
	}

	public function Register(Request $request){

		$validation = validator::make($request->all(), [			
			'perfor_name' 			=> 'required',
			'last_name' 			=> 'required',
			'identification' 		=> 'required|numeric',
			'photo_identification'	=> 'required|mimes:jpeg,jpg,png|max:10240',
			'city' 					=> 'required',
			'country'				=> 'required',
			'name' 					=> 'required|unique:users',	
			'email' 				=> 'required|email|max:255|unique:users',		
			'password' 				=> 'required|min:6|confirmed',
			'password_confirmation'	=> 'required|min:6',
			'birthdate'				=> 'required|date',
			'bank'					=> 'required'
			]);		

		if($validation->fails()){
			return redirect()->back()->withInput()->withErrors($validation->errors());			
		}else{
			$imagen = $request->file('photo_identification');

			$new_name = time().$imagen->getClientOriginalName();
			$img_dir = env('IMG_UPLOAD');
			$img_url = env('MEDIA_URL')."/img/uploads/".$new_name;
			$imagen->move($img_dir,$new_name);
			$datos_user = array(
				'username' 	=> $request->input('name'),
				'email'		=> $request->input('email'),
				'user_type'	=> 1,
				'password'	=> $request->input('password')
				);

			$user = $datos_user['email'];

			/*if($this->UsersRepo->validateUser($user)){
				return redirect()->back()->with('error','There was a problem. Please try again.');
			}*/

			$this->UsersRepo->addUser($datos_user);

			$performer_user = $this->UsersRepo->findUser($user)->first()->id;

			$datos_performer = array(
				'name'					=> $request->input('perfor_name'),
				'last_name'				=> $request->input('last_name'),
				'identification'		=> $request->input('identification'),
				'photo_identification'	=> $img_url,
				'city'					=> $request->input('city'),
				'country'				=> $request->input('country'),
				'username' 				=> $request->input('name'),	
				/*'birthdate'				=> $request->input('birthdate'),	*/
				'birthdate'				=> $request->input('birthdate'),
				'id_user'				=> $performer_user
				);

			$datos_card = array(
				'bank'					=> $request->input('bank'),
				'number'				=> $request->input('number'),
				'id_user'				=> $performer_user,
				'bank'					=> $request->input('bank')
				);

			$credit_card = $this->creditRepo->addCreditCard($datos_card);

			if($this->PerformerRepo->addPerformer($datos_performer)){
				return redirect()->back()->with('message','Successfull');
			}else{
				return redirect()->back()->with('error','There was a problem. Please try again.');
			}
		}
	}

	public function getEditar($id){
		$bank	 = $this->Bank();
		$country = $this->Country();		
		$performers = $this->PerformerRepo->editProfile($id);	

		$performer =  array(
            'perfor_name'       	=> $performers[0]->perfor_name,
            'last_name'      		=> $performers[0]->last_name,
            'identification'    	=> $performers[0]->identification,
            'photo_identification' 	=> $performers[0]->photo_identification,
            'city'       			=> $performers[0]->city,
            'country'           	=> $performers[0]->country,
            'bank'              	=> $performers[0]->bank,
            'number'            	=> $performers[0]->number,
            'email'					=> $performers[0]->email,
            'name'          		=> $performers[0]->name
            );
		
		return view('performers/editarPerfil', compact('performer','id','bank','country'));		
	}

	public function putEditar(){

		$validation = validator::make(\Input::all(),[
			'perfor_name'		=> 'required',
			'last_name'			=> 'required',
			'identification'	=> 'required|numeric',
			'city'				=> 'required',
			'country'			=> 'required',
			//'birthdate'			=> 'required|date',
			'email'				=> 'required|email|max:255',
			'name'				=> 'required',
			'bank'				=> 'required',
			'number'			=> 'required'
			]);
        
        if($validation->passes()){
        	$datos_user = array(
                'username'  => \Input::get('name'),
                'email'     => \Input::get('email')
                );
            
            $id = Auth::user()->id;

            $datos_performer = array(
            	'perfor_name'		=> \Input::get('perfor_name'),
            	'last_name'			=> \Input::get('last_name'),
            	'identification'	=> \Input::get('identification'),
            	'city'				=> \Input::get('city'),
            	'country'			=> \Input::get('country')
            	);

            $datos_card = array(
                'bank'                  => \Input::get('bank'),
                'number'                => \Input::get('number')
            );

            if($this->PerformerRepo->update($id,$datos_performer) && $this->creditRepo->update($id, $datos_card) && $this->UsersRepo->update($id,$datos_user)){
        		return redirect()->back()->with('message','User update successful.');            	
            }else{
            	return redirect()->back()->with('error','There was a problem updating user information. Please try again');
            }
        }else{
        	return redirect()->back()->withInput()->withErrors($validation->errors());
        }
	}
}
