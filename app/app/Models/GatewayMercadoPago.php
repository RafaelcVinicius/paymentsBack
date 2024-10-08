<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatewayMercadoPago extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'gateway_mercado_pago';
    protected $fillable = ['gateway_user_id', 'access_token', 'public_key', 'refresh_token', 'scope', 'live_mode', 'expires_on'];
}
