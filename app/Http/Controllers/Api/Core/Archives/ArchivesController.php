<?php

namespace App\Http\Controllers\Api\Core\Archives;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArchivesController extends Controller
{
    public function __construct(

    )
    {
        //
    }

    public function uploadFile(Request $request)
    {
        try
        {
            //
        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function getFile(Request $request)
    {
        try
        {
            //
        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function deleteFile(Request $request)
    {
        try
        {
            //
        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }
}
