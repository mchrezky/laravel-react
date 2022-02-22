<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Table\Inventory;

class InventoryController extends Controller
{
    
    public function get()
    {
        $data = Inventory::get();
        return response()
        ->json(['message' => 'Successfuly Showing Data','data' => $data]);
    }
    public function view($id)
    {
        $data = Inventory::where('id',$id)->get();
        return response()
        ->json(['message' => 'Successfuly Showing Data','data' => $data]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:255',
            'qty' => 'required|integer',
            'qty_min' => 'required|integer',
            'uom' => 'required|string|max:100',
            'expired' => 'required|string|max:100',
            'category' => 'required|integer|max:100',
            'mitra' => 'required|integer|max:100',
            'created_by' => 'required|integer|max:100',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $data = Inventory::create([
            'nama' => $request->nama,
            'ket' => $request->ket,
            'qty' => $request->qty,
            'qty_min' => $request->qty_min,
            'uom' => $request->uom,
            'expired' => $request->expired,
            'category' => $request->category,
            'mitra' => $request->mitra,
            'created_by' => $request->created_by,
        ]);

        if($data){
            return response()
                ->json(['message' => 'Insert Data Successfuly','data' => $data]);
        }else{
            return response()
            ->json(['message' => 'Insert Data Failed','data' => $data]);
        }
    }
    public function put(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer',
            'nama' => 'required|string|max:255',
            'qty' => 'required|integer',
            'qty_min' => 'required|integer',
            'uom' => 'required|string|max:100',
            'expired' => 'required|string|max:100',
            'category' => 'required|integer|max:100',
            'mitra' => 'required|integer|max:100',
            'updated_by' => 'required|integer|max:100',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $data = Inventory::where('id', $request->id)
        ->update([
            'nama' => $request->nama,
            'ket' => $request->ket,
            'qty' => $request->qty,
            'qty_min' => $request->qty_min,
            'uom' => $request->uom,
            'expired' => $request->expired,
            'category' => $request->category,
            'mitra' => $request->mitra,
            'updated_by' => $request->updated_by,
        ]);

        if($data){
            return response()
                ->json(['message' => 'Update Data Successfuly','data' => $data]);
        }else{
            return response()
            ->json(['message' => 'Update Data Failed','data' => $data]);
        }
    }
    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer',
            'updated_by' => 'required|integer|max:100',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $data = Inventory::where('id', $request->id)
        ->update([
            'flag' => 0,
            'updated_by' => $request->updated_by,
        ]);

        if($data){
            return response()
                ->json(['message' => 'Delete Data Successfuly','data' => $data]);
        }else{
            return response()
            ->json(['message' => 'Delete Data Failed','data' => $data]);
        }
    }
}