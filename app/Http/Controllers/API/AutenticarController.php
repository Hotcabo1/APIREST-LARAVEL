<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\AccesoRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AutenticarController extends Controller
{
    //
    public function registro(RegistroRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->roles()->attach($request->roles);

        return response()->json([
            'res' => true,
            'msg' => 'Usuario Registrado Correctamente'
        ],200);

    }

    public function acceso(AccesoRequest $request)
    {
        $user = User::with('roles')->where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
             throw ValidationException::withMessages([
                'msg' => ['Las credenciales son incorrectas!'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'res' => true,
            'msg' => [
                'token' => $token,
                'usuario' => $user
            ]
        ],200);
    }
    public function cerrarSesion(Request $request){

        // Revoke the token that was used to authenticate the current request...
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Token eliminado correctamente'
        ],200);

    }

}

