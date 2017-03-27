<?php 




class MusicController extends BaseController {

  public function index() {
	 		
   
   return Composer::where( 'id', '>=',  1)->select(array('name','country','century'))->remember(10)->get();


  }

  public function showComposer_byCountry($country) {

    $results = Composer::where('country', $country)->select(array('id','name','century'))->get();
    return (count($results)? $results : $this->modelNotFound()); 

  }
 /*
  *  check user status before presenting the view 
  *  @  get api/composers/add 
  *
  */ 
  public function useForm() {
   
  return  $this->validateUser() > 1 ?  View::make('add'): $this->modelNotFound('Sorry,your account  has restriced access', 403);
  }

  /*
   * @ post api/composers/add
   */
  public function addComposer () {

  $input = Input::all();
  $name = preg_replace('/[^a-zA-Z]/', ' ', $input['name'] );
  $country  = preg_replace('/[^a-zA-Z]/', ' ',$input['country']);
  $century = preg_replace('/[^a-zA-Z1-9]/','', $input['century']);

  try {
  $comp = new Composer;   
  $comp->name = $name;
  $comp->century= $century;
  $comp->country = $country;
  
  if ($comp->save()) {  

     return "Thank you The Composer $name is now in our records";  
    } 
  } 
  
   catch (\Illuminate\Database\QueryException $e) {

     if  (preg_match('/Duplicate entry/', $e->getMessage())) { 

       return $this->modelNotFound('Duplicate Entry', 422); } else 

        dd('Sorry something went wrong');
     }
 
  }
  protected function deleteComposer($id) {
    // check for admin user 
    if ($this->validateUser() > 2) {

          if (Composer::destroy($id)) {

            return "record number: $id is deleted";
          } 
            else { return  $this->modelNotFound();  }
    } else 
    { 
      return $this->modelNotFound('Sorry,your account  has restriced access', 403);
    }

}  
  protected function modelNotFound($message='Records not found', $statusCode=204){

       return Response::json(['error' => $message,'status'=> $statusCode]);
  }
  public function validateUser(){

  $user_id = Session::get('se_id');
 
  return DB::table('users')->where('id', $user_id)->pluck('privileges') ?: false;
  }
}