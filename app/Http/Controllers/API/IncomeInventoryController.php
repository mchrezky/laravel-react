<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Table\IncomeInventory;
use App\Models\Table\Inventory;

class IncomeInventoryController extends Controller
{
    
    public function get()
    {
        $data = IncomeInventory::get();
        return response()
        ->json(['message' => 'Successfuly Showing Data','data' => $data]);
    }
    public function view($id)
    {
        $data = IncomeInventory::where('id',$id)->get();
        return response()
        ->json(['message' => 'Successfuly Showing Data','data' => $data]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inventory_id' => 'required|integer|max:255',
            'qty' => 'required|integer',
            'in_qty' => 'required|integer',
            'in_price' => 'required|integer',
            'petani' => 'required|integer|max:100',
            'mitra' => 'required|integer|max:100',
            'created_by' => 'required|integer|max:100',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $data = IncomeInventory::create([
            'inventory_id' => $request->inventory_id,
            'ket' => $request->ket,
            'in_qty' => $request->in_qty,
            'in_price' => $request->in_price,
            'petani' => $request->petani,
            'mitra' => $request->mitra,
            'created_by' => $request->created_by,
        ]);

        if($data){
            $update = Inventory::where('id', $request->inventory_id)
            ->update([
                'qty' => $request->qty+$request->in_qty,
                'updated_by' => $request->updated_by,
            ]);
            return response()
                ->json(['message' => 'Insert Data Successfuly','data' => $data]);
        }else{
            return response()
            ->json(['message' => 'Insert Data Failed','data' => $data]);
        }
    }

}