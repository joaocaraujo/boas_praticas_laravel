<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @params Builder $query
     * return Builder
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeDelivered($query)
    {
        return $query->where('status', 'delivered');
    }

    public function scopePaid($query)
    {
        return $query->where('paid', true);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function getFormattedStatusAttribute($key)
    {
        return $this->status == 'delivered' ? 'Enviado' : 'Envio pendente';
    }

    public function getFormattedPaidAttribute($key)
    {
        return $this->paid == 1 ? 'Pago' : 'Em aberto';
    }

    public function setTrackCodeAttribute($value)
    {
        $this->attributes['track_code'] = "#COD_{$value}{BR}";
    }
}
