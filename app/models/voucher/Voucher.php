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


    //my query scopes
    public function scopeStatus($query, $status)
    {
        return $query->where('status', '=', $status);
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
