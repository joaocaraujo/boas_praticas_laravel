<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status', 'track_code'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('status', function(Builder $builder){
            $builder->where('status', '<>', 'cancel');
        });
    }

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
        switch($this->status) {
            case 'pending' :
                return "Envio pendente";
            break;

            case 'delivered' :
                return "Enviado";
            break;

            case 'cancel' :
                return "Pedido cancelado";
            break;
        }
    }

    public function getFormattedPaidAttribute($key)
    {
        if ($this->status == 'cancel') {
            return "Reprovado";
        }
        return $this->paid == 1 ? 'Pago' : 'Em aberto';
    }

    public function setTrackCodeAttribute($value)
    {
        $this->attributes['track_code'] = "#COD_{$value}{BR}";
    }
}
