<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Http\Requests\NewDoctorRequest;
use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\SuccessWithData;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();

        return new SuccessWithData($doctors);
    }

    public function create(NewDoctorRequest $request)
    {
        $data = $request->all();

        Doctor::create($data);

        return new SuccessResponse('DOctor Created Successfully');
    }

    public function show($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("Doctor not found", 404);
        }

        return new SuccessWithData($doctor);
    }

    public function update($id, Request $request)
    {
        try {
            $doctor = Doctor::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("doctor not found", 404);
        }

        $data = $request->only(['name']);

        $doctor->update($data);

        return new SuccessResponse("Details Updated Successfully");
    }

    public function destroy($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
        } catch (\Exception $e) {
            return new ErrorResponse("doctor not found", 404);
        }

        $doctor->delete();

        return new SuccessResponse("Data Deleted Successfully");
    }
}
