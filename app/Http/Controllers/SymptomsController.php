<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewDiseaseRequest;
use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\SuccessWithData;
use Illuminate\Http\Request;
use App\Symptoms;

class SymptomsController extends Controller
{
    public function index()
    {
        $symptoms = Symptoms::all();

        return new SuccessWithData($symptoms);
    }

    public function create(NewDiseaseRequest $request)
    {
        $data = $request->all();

        Symptoms::create($data);

        return new SuccessResponse('symptom Created Successfully');
    }

    public function show($id)
    {
        try {
            $symptom = Symptoms::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("symptom not found", 404);
        }

        return new SuccessWithData($symptom);
    }

    public function update($id, Request $request)
    {
        try {
            $symptom = Symptoms::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("symptom not found", 404);
        }

        $data = $request->all();

        $symptom->update($data);

        return new SuccessResponse("Details Updated Successfully");
    }

    public function destroy($id)
    {
        try {
            $symptom = Symptoms::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("symptom not found", 404);
        }

        $symptom->delete();

        return new SuccessResponse("symptom Deleted Successfully");
    }
}
