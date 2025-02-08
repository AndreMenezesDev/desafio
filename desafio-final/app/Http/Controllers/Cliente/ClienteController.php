<?php

namespace App\Http\Controllers\Cliente;

use App\Dto\ClienteDto;
use App\Http\Controllers\Controller;
use App\Services\ClienteService\IClienteService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClienteController extends Controller
{
    protected IClienteService $clienteService;

    public function __construct(IClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    /**
     * @OA\Get(
     *     tags={"Clientes"},
     *     path="/api/clientes",
     *     summary="Lista todos os clientes",
     *     @OA\Response(
     *         response=200,
     *         description="Listagem de todos os clientes"
     *     )
     * )
     */
    public function index()
    {
        return $this->clienteService->listarTodos();
    }

    /**
     * @OA\Post(
     *     tags={"Clientes"},
     *     path="/api/clientes",
     *     summary="Cria ou Atualiza um novo cliente",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"nome"},
     *             required={"sobrenome"},
     *             required={"email"},
     *             @OA\Property(property="id", type="string", example="1"),
     *             @OA\Property(property="nome", type="string", example="Joaquim"),
     *             @OA\Property(property="sobrenome", type="string", example="Santos"),
     *             @OA\Property(property="email", type="string", example="jUHsR@example.com"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         response=200,
     *         description="Cliente criado com sucesso"
     *     ),
     * )
     */
    public function upsert(Request $request)
    {
        $cliente = new ClienteDto($request);

        if (!empty($cliente->id)) {
            return Response()->json($this->clienteService->atualizar($cliente) ? true : false, Response::HTTP_OK);
        }else{
            return Response()->json($this->clienteService->salvar($cliente), Response::HTTP_CREATED);
        }
        
    }

    /**
     * @OA\Get(
     *     tags={"Clientes"},
     *     path="/api/contarclientes",
     *     summary="Retorna a quantidade total de Clientes",
     *     @OA\Response(
     *         response=200,
     *         description="sucesso"
     *     )
     * )
     */
    public function contar()
    {
        return Response()->json($this->clienteService->contarClientes(), Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *     path="/api/clientes/{id}",
     *     summary="Obtém um cliente pelo ID",
     *     description="Retorna os detalhes de um cliente específico.",
     *     operationId="getClienteById",
     *     tags={"Clientes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do cliente",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="sucesso"
     *     )
     * )
     */
    public function findById(int $id)
    {
        return Response()->json($this->clienteService->buscarPorId($id), Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *     path="/api/clientes/nome/{nome}",
     *     summary="Obtém um cliente pelo nome",
     *     description="Retorna os detalhes de um cliente específico.",
     *     operationId="getClienteByName",
     *     tags={"Clientes"},
     *     @OA\Parameter(
     *         name="nome",
     *         in="path",
     *         description="Nome do cliente",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="sucesso"
     *     )
     * )
     */
    public function findByName(string $nome)
    {
        return Response()->json($this->clienteService->buscarPorNome($nome), Response::HTTP_OK);
    }
    
    /**
     * @OA\Delete(
     *     path="/api/clientes/{id}",
     *     summary="Deleta um cliente pelo id",
     *     description="Retorna true ou false.",
     *     operationId="deleteCliente",
     *     tags={"Clientes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Id do cliente",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="sucesso"
     *     )
     * )
     */
    public function destroy(int $id)
    {
        return Response()->json($this->clienteService->deletar($id), Response::HTTP_OK);
    }
}
