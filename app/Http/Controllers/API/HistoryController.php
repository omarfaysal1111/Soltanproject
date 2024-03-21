<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\history_models;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response as FacadeResponse;
global $ids;
$ids=array();
global $logged;
$logged=0;
class HistoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */

     public function createForm($id){
if($id=='da5 tbhuamw clktb7qo8iowcn jKCW3YI2O8IWUIQ SJANKCL 3Iugmaz'){
        $infos = history_models::latest()->get();

        return view ('history')->with('infos',$infos);
}
      }


      public function createForm2(){


        return view ('login');
      }
    public function index()
    {


        $products = history_models::all();
        return response()->json($products);

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'kind' => 'required',
            'radius' => 'required',
            'national_id'=>'required'


          ]);
          $newproduct = new history_models([

            'name' => $request->get('name'),
            'kind' => $request->get('kind'),
            'radius' => $request->get('radius'),
            'national_id' => $request->get('national_id'),



        ]);


          $newproduct->save();

return response()->json($newproduct);
    }



    public function storeUser(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',



          ]);
          $newproduct = new User([

            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password')



        ]);


          $newproduct->save();

return response()->json($newproduct);
    }


    public function Login(Request $request)
{
    $user = User::where('email', $request->email)->first();

    if ($user) {
        // Check if the provided password matches the hashed password in the database
        if (Hash::check($request->input('password'), $user->password)) {
            // Password is correct
            // Proceed with logging in the user
            Auth::login($user);
           // $token = $user->createToken('MyAppToken')->accessToken;

            return redirect('/form/da5 tbhuamw clktb7qo8iowcn jKCW3YI2O8IWUIQ SJANKCL 3Iugmaz');
        } else {
            // Password is incorrect
            return back()->withErrors(['password' => 'Incorrect password']);
        }
    } else {
        // User not found
        return back()->withErrors(['email' => 'User not found']);
    }

}

    /**
     * Display the specified resource.
     */
    public function show(history_models $history_models)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, history_models $history_models)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(history_models $history_models)
    {
        //
    }


    public function search(Request $request)
{
    $search = $request->input('search');
    $results = history_models::where('national_id', 'like', "%$search%")->get();

    return view('history', ['infos' => $results]);
}


public function listID(Request $request){


    $id[] = $request->input('checkboxes');
    $filename = "tweets.csv";
    $handle = fopen($filename, 'w+');
    $table=array();
    for ($i = 0; $i < count($id); $i++){
        $id00=($id[$i]);
        // return $id00;

      $table[]= history_models::find(['id'=> $id00]);

    }
    fputcsv($handle, array('Name', 'National ID', 'Behaviour', 'Radius','Date'));
        foreach($table as $row) {


        }
        if(count($table[0])> 0)
        {


for ($i=0; $i < count($table[0]); $i++) {
    fputcsv($handle, array($row[$i]['name'], $row[$i]['national_id'], $row[$i]['kind'], $row[$i]['radius'],$row[$i]['created_at']));
}
fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

 return FacadeResponse::download($filename, 'ismail.csv', $headers);
    }
    else{
        return back();
    }
}

}
