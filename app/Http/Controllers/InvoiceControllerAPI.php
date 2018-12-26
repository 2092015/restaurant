<?php
/**
 * Created by PhpStorm.
 * User: ciscomen
 * Date: 18/12/2018
 * Time: 22:00
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Jsonable;

use App\Http\Resources\Invoice as InvoiceResource;
use Illuminate\Support\Facades\DB;

use App\Invoice;
use App\StoreInvoiceRequest;

class InvoiceControllerAPI extends Controller
{
    public function all(Request $request)
    {
        if ($request->has('page')) {
            return InvoiceResource::collection(Invoice::paginate(5));
        } else {
            return InvoiceResource::collection(Invoice::all());
        }

    }
    public function index(Request $request)
    {
        if ($request->has('page')) {
            return InvoiceResource::collection(Invoice::paginate(5));
        } else {
            return InvoiceResource::collection(Invoice::whereNotIn('state', ['paid'])->orderByRaw('date')->get());
        }

    }
    /*public function index2(Request $request)
    {
        if ($request->has('page')) {
            return InvoiceResource::collection(Invoice::paginate(5));
        } else {
            return DB::table('invoices')
                ->leftJoin('meals', 'invoices.meal_id', '=', 'meals.id')
                ->where('invoices.state','=','not paid')
                ->get();
            return InvoiceResource::collection(Invoice::all());

        }

    }*/
    public function paid(Request $request)
    {
        if ($request->has('page')) {

            return InvoiceResource::collection(Invoice::where('state', ['paid'])->paginate(5));
        } else {
            return InvoiceResource::collection(Invoice::where('state', ['paid'])->orderBy('date')->get());
        }

    }
    public function notpaid(Request $request)
    {
        if ($request->has('page')) {

            return InvoiceResource::collection(Invoice::where('state', ['not paid'])->paginate(5));
        } else {
            return InvoiceResource::collection(Invoice::where('state', ['not paid'])->orderBy('date')->get());
        }

    }
}