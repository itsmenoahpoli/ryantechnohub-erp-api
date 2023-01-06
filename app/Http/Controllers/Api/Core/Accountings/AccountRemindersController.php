<?php

namespace App\Http\Controllers\Api\Core\Accountings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Repositories\Interfaces\IAccountRemindersRepository;
use App\Http\Requests\Accountings\AccountReminderRequest;

class AccountRemindersController extends Controller
{
    private IAccountRemindersRepository $repository;

    public function __construct(
        IAccountRemindersRepository $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try
        {
            $params = $request->query();
            $data = $this->repository->getAccountReminders($params);

            return response()->json([
                'error' => false,
                'message' => 'Account reminders list',
                'data' => $data
            ], 200);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountReminderRequest $request)
    {
        try
        {
            $data = $this->repository->createAccountReminder($request->validated());
            
            return response()->json($data, 201);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)  
    {
        try
        {
            $data = $this->repository->getAccountReminder($id);
            
            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountReminderRequest $request, $id)
    {
        try
        {
            $data = $this->repository->updateAccountReminder($data);
            
            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $data = $this->repository->deleteAccountReminder($id);
            
            return response()->json($data, 204);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
}
