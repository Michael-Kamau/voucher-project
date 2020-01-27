<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    //
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    protected $fillable = ['user_id','code','amount','status','expiry_date'];

    //my query scopes
    public function scopeStatus($query, $status)
    {
        return $query->where('status', '=', $status);
    }

    //get vouchers by status
    public function scopeVouchers($query,$user, $status)
    {
        //dd($query->where('user_id',$user)->where('status','bought')->get());
        return $query->where([
            'user_id'=> $user,
            'status'=> $status
        ]);
    }

    public function scopeMyActive($query, $id)
    {
        return $query->where('user_id', '=', $id);
    }

    public function scopeMyRedeemed($query, $id)
    {
        return $query->where([
            ['id', '=', id],
            ['status', '=', 'redeemed']
        ]);
    }


}
