<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "uuid"                  => $this->uuid,
            'payer'                 => new PayerResource($this->payer),
            'origemAmount'          => $this->origem_amount,
            'transectionAmount'     => $this->transection_amount,
            'webHook'               => $this->webhook,
            'gateway'               => new GatewayResource($this->gateway),
        ];
    }
}
