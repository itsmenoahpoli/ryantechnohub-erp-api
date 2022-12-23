<?php

namespace App\Http\Controllers\Api\Core\Stores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Http\Requests\Stores\StorePosRequest;
use App\Http\Requests\Stores\StorePosLoginRequest;
use App\Repositories\Interfaces\IStorePosRepository;

class StorePosController extends Controller
{
    private IStorePosRepository $repository;

    public function __construct(
        IStorePosRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function authenticate(StorePosLoginRequest $request)
    {
        try
        {
            $data = $this->repository->authenticate((object) $request->validated());

            if (!$data->authenticated)
            {
                return response()->json('Invalid POS credentials', 401);
            }

            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)  : JsonResponse
    {    
        try
        {
            $params = $request->query();
            $data = $this->repository->getAllPOS($params);
            
            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePosRequest $request)  : JsonResponse
    {    
        try
        {
            $data = $this->repository->createPos($request->validated());
            return response()->json($data, 201);
        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)  : JsonResponse
    {    
        try
        {

        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePosRequest $request, $id)  : JsonResponse
    {    
        try
        {

        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)  : JsonResponse
    {    
        try
        {

        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }
}
