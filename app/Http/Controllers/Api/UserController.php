<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(): JsonResponse
      {
        $users = User::orderBy('id', 'DESC')->paginate(2);

        return response()->json([
            'status' => true,
            'users' => $users
        ], 200);
    }

    public function show(User $user): JsonResponse
    {
        $users = User::orderBy('id', 'DESC')->paginate(2);
        return response()->json([
            'status' => true,
            'user' => $user
        ], 200);
    }

    public function store(UserRequest $request): JsonResponse
    {
        // Iniciar a transacao no bd
        DB::beginTransaction();

        try {
        // deu bom
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            DB::commit();

        // retorna uma mensagem de sucesso
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuario cadastrado com sucesso"
            ], 201);

        } catch (Exception $e) {
            //deu bucho
            DB::rollBack();

            // retorna uma mensagem de erro
            return response()->json([
                'status' => false,
                'message' => "Usuario nao cadastrado"
            ], 400);

        }
    }

    public function update(UserRequest $request, User $user): JsonResponse
    {
        DB::beginTransaction();

        try {
            // editar o registro no bd
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuario editado com sucesso"
            ], 200);

        } catch (Exception $e) {
            // paiou
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Usuario nao editado"
            ], 400);

        }

    }

    public function destroy(User $user)
    {
        try {
            // apagar o registro no bd
            $user->delete();

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuario apagado com sucesso"
            ], 200);

        } catch (Exception $e) {

            return response()->json([
                'status' => false,
                'message' => "Usuario nao cadastrado"
            ], 400);
        }
    }

}
