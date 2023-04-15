<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
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
