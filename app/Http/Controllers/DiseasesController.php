<?php

namespace App\Http\Controllers;

use App\Diseases;
use App\Http\Requests\NewDiseaseRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\SuccessWithData;
use Illuminate\Http\Request;

class DiseasesController extends Controller
{
    public function index()
    {
        $diseases = Diseases::all();

        return new SuccessWithData($diseases);
    }

    public function create(NewDiseaseRequest $request)
    {
        $data = $request->all();

        Diseases::create($data);

        return new SuccessResponse('Disease Created Successfully');
    }

    public function show($id)
    {
        try {
            $disease = Diseases::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("disease not found", 404);
        }

        return new SuccessWithData($disease);
    }

    public function update($id, Request $request)
    {
        try {
            $disease = Diseases::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("disease not found", 404);
        }

        $data = $request->all();

        $disease->update($data);

        return new SuccessResponse("Details Updated Successfully");
    }

    public function destroy($id)
    {
        try {
            $disease = Diseases::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("disease not found", 404);
        }

        $disease->delete();

        return new SuccessResponse("disease Deleted Successfully");
    }
}
