<?php

namespace App\Http\Controllers;

use App\Events\BuyVoucherNotificationEvent;
use App\Mail\NotifyAdminMail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Voucher;
use App\Http\Resources\Voucher as VoucherResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Mail\Notification;


class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get vouchers
//        $vouchers=Voucher::paginate(15);
//        $vouchers=Voucher::all();
//        $vouchers=DB::table('vouchers')->get()->toArray();
        $vouchers = Voucher::status('active')->get();
        $user = Auth::user()->id;
        //dd($user);
//        $vouchers=User::find(1)->vouchers()->get();
//dd($vouchers);
        //Return collection of vouchers as a resource
        return VoucherResource::collection($vouchers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $status
     * @return \Illuminate\Http\Response
     */
    public function show($status)
    {
//        \Mail::to('matildamariwa3@gmail.com')->send(new Notification(Auth::user()));


        //Get a single voucher
        $voucher = Voucher::vouchers(Auth::user()->id, $status)->get();

        //return single article as a resource
        return new VoucherResource($voucher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $voucher = Voucher::find($id);
        $voucher->user_id = 1;
        $voucher->status = 'bought';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function buy(Request $request)
    {

//        event(new BuyVoucherNotificationEvent(Auth::user(),));
        //dd($request);
        $voucher = Voucher::find($request->input('id'));
        $voucher->user_id = Auth::user()->id;
        $voucher->status = 'bought';
        $voucher->payment_code = $request->input('transactionCode');
        $voucher->payment_method = $request->input('method');
        $voucher->save();

        $username=Auth::user()->name;
        $email=Auth::user()->email;
        event(new BuyVoucherNotificationEvent($username,$email,"One Voucher Bought"));
//        \Mail::to('kamau.karitu@gmail.com')->send(new NotifyAdminMail($username,'VOUCHER BOUGHT EVENT','DETAILS'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function give(Request $request)
    {

        $verification_code=rand ( 10000 , 99999 );
        //
        $voucher = Voucher::find($request->input('id'));
//        $voucher->status='bought';
        if($voucher->verification_code!=' '){
            $voucher->verification_code=$verification_code;
            $voucher->email = $request->input('email');
            $voucher->save();
        }else{
            return response('Record Not found', 404)
                ->header('Content-Type', 'text/plain');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function redeem(Request $request)
    {
        //
        $voucher = Voucher::find($request->input('voucher'));
//        $voucher->status='bought';
        $voucher->status = 'redeemed';
        $voucher->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function claim(Request $request)
    {
        //

        Log::info($request);
        //Get a single voucher
        $voucher = Voucher::voucherVerification($request->input('voucher'), $request->input('verification'))->firstOrFail();




        $voucher->user_id=Auth::user()->id;
        $voucher->verification_code=null;
        $voucher->email=null;
        $voucher->save();




        //return single article as a resource
        //return new VoucherResource($voucher);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        $amount = $request->input('amount');
        $number = $request->input('number');
        $expiry = $request->input('expiry');

        Log:info($request->input('amount'));



        for ($i = 0; $i < $number; $i++) {

            Voucher::create([
                'code' => 'XXXXXX',
                'amount' => $amount,
                'status' => 'active',
                'expiry_date' => $expiry
            ]);


        }

        //
        //$voucher = Voucher::find($request->input('voucher'));
//        $voucher->status='bought';
        //$voucher->status='redeemed';
        //$voucher->save();
    }


    public function code()
    {

        $values = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');


        return code;
    }


}
