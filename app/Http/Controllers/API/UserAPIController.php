<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserAPIController extends Controller
{

  public $successStatus = 200;
  public $invalidInput = 422;
  public $invalidFields = 401;

  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'password' => 'required',
      'email' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json(['error' => $validator->errors()], $this->invalidFields);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return response()->json(['error' => "Por favor verifique el correo o contraseña."], $this->invalidFields);
    }

    return response()->json(['success' => $user->createToken("myApp")->plainTextToken], $this->successStatus);
  }

  public function loginFacebook(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required',
      'accessToken' => 'required'
    ]);

    if ($validator->fails()) {
      return response()->json(['error' => $validator->errors()], $this->invalidFields);
    }

    if (User::where('email', $request->email)->count() > 0) {
      $response = Http::get('https://graph.facebook.com/me?access_token=' . $request->accessToken);
      if (isset(json_decode($response->body())->id)) {
        if (json_decode($response->body())->id === $request->id) {
          // login al usuario
          $success['token'] =  User::where('email', $request->email)->first()->createToken('MyApp')->plainTextToken;
          return response()->json(['success' => $success], $this->successStatus);
        }
      }
    }
    $response = Http::get('https://graph.facebook.com/me?access_token=' . $request->accessToken);
    if (isset(json_decode($response->body())->id)) {
      if (json_decode($response->body())->id === $request->id) {
        // registra al usuario
        $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required|email'
        ]);
        if ($validator->fails()) {
          return response()->json(['error' => $validator->errors()], $this->invalidFields);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->id . $request->name);
        $user->save();
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        return response()->json(['success' => $success], $this->successStatus);
      }
    }
    return response()->json(['success' => false]);
  }

  public function loginGoogle(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required',
      'accessToken' => 'required'
    ]);

    if ($validator->fails()) {
      return response()->json(['error' => $validator->errors()], $this->invalidFields);
    }

    if (User::where('email', $request->email)->count() > 0) {
      $client = new \Google_Client(['client_id' => '798203051322-56dhp4rkle586vt3smpj5rdbr3k2fndm.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend
      $payload = $client->verifyIdToken($request->accessToken);

      if ($payload) {
        if ($request->email == $payload['email']) {
          $success['token'] =  User::where('email', $request->email)->first()->createToken('MyApp')->plainTextToken;
          return response()->json(['success' => $success], $this->successStatus);
        }
      } else {
        // Invalid ID token
        return response()->json(['success' => false, "message" => "Error Invalid token login Google"]);
      }
    }
    $client = new \Google_Client(['client_id' => '798203051322-56dhp4rkle586vt3smpj5rdbr3k2fndm.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend
    $payload = $client->verifyIdToken($request->accessToken);
    if ($payload) {
      if ($request->email == $payload['email']) {
        $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required|email'
        ]);
        if ($validator->fails()) {
          return response()->json(['error' => $validator->errors()], $this->invalidFields);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->id . $request->name);
        $user->save();
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        return response()->json(['success' => $success], $this->successStatus);
      }
      return response()->json(['success' => false, "message" => "Error register Google"]);
    } else {
      // Invalid ID token
      return response()->json(['success' => false, "message" => "Invalid Token login Google"]);
    }
    return response()->json(['success' => false, "message" => "Error login Google"]);
  }

  public function register(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'password' => 'required',
        'email' => 'required|email|unique:users,email',
        'name' => 'required',
        'last_name' => 'required'
      ],
      [
        "email.unique" => "El email ya se encuentra registrado."
      ]

    );
    if ($validator->fails()) {
      return response()->json(['error' => $validator->errors()], $this->invalidFields);
    }
    $user = User::create([
      'name' => $request['name'] . " " . $request['last_name'],
      'email' => $request['email'],
      'password' => Hash::make($request['password']),
    ]);
    return response()->json(['success' => $user->createToken("myApp")->plainTextToken], $this->successStatus);
  }
}
