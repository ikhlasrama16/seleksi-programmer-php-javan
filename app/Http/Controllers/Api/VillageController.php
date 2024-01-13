<?php

namespace App\Http\Controllers\Api;

use App\models\Village;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VillageController extends Controller
{
    public function index()
    {
        $villages = VIllage::all();
        if($villages -> count() > 0){
            return response()->json([
                'status' => 200,
                'message' => $villages
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'no data found'
            ], 404);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:25',
            'kode_pos' => 'required|digits:5',
            'kecamatan' => 'required|string|max:25',
            'kabupaten_kota' => 'required|string|max:25'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ]);
        }else{
            $village = Village::create([
                'nama' => $request->nama,
                'kode_pos' => $request->kode_pos,
                'kecamatan' => $request->kecamatan,
                'kabupaten_kota' => $request->kabupaten_kota,
            ]);
            if($village){
                return response()->json([
                    'status' => 200,
                    'message' => 'desa created sucessfully'
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'something went wrong'
                ], 500);
            }
        }
    }
    public function show($id)
    {
        $village = Village::find($id);
        if($village){
            return response()->json([
                'status' => 200,
                'message' => $village
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message'=>'no desa found'
            ], 404);
        }
    }
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:25',
            'kode_pos' => 'required|digits:5',
            'kecamatan' => 'required|string|max:25',
            'kabupaten_kota' => 'required|string|max:25'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ]);
        }else{
            $village = Village::find($id);
            
            
            if($village){
                $village->update([
                    'nama' => $request->nama,
                    'kode_pos' => $request->kode_pos,
                    'kecamatan' => $request->kecamatan,
                    'kabupaten_kota' => $request->kabupaten_kota,
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'desa updated sucessfully'
                ], 200);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'no data found'
                ], 404);
            }
        }
    }
    public function destroy($id)
    {
        $village = Village::find($id);
        if($village){
            $village->delete();
            return response()->json([
                'status' => 200,
                'message' => 'desa deleted sucessfully'
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'no data found'
            ], 404);
        }
    }
}
