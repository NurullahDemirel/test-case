<?php

namespace App\Http\Controllers;

use App\Models\AirPort;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AirPortController extends Controller
{
    public function airports(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'searchString' => 'required',
            'type' => ['required', Rule::in([AirPort::SHORTCODE, AirPort::NAME, AirPort::CITY, AirPort::COUNTRY])],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $type = $request->get('type');
        return  response()->json([
            'error' => 0,
            'data' => AirPort::query()->where($type, 'like', "%" . $request->get('searchString') . "%")
                ->select('id', 'shortcode', 'name', 'country', 'city', 'location')
                ->get()
        ]);
    }
}
