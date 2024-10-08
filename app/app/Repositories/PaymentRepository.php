<?php

namespace App\Repositories;

use App\Models\Payments;
use App\Repositories\Contracts\PaymentRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function store(array $data): Payments
    {
        Log::info(json_encode($data));

        $payment = Payments::create($data)->refresh();
        $payment->status()->create($data['status']);

        if (array_key_exists('fee', $data)) {
            foreach ($data['fee'] as $key => $value) {
                $payment->feeDetails()->create($value);
            }
        }

        if (array_key_exists('card', $data))
            $payment->detailCards()->create($data['card']);

        if (array_key_exists('pix', $data))
            $payment->detailPix()->create($data['pix']);

        return $payment->refresh();
    }

    public function index()
    {
        return Auth::user()->company->payments->get();
    }

    public function update(array $data, string $uuid): Payments
    {
        $payment = Auth::user()->company->payments->where('uuid', $uuid)->firstOrFail();
        $payment->update($data);

        return $payment->refres();
    }

    public function show(string $uuid): Payments
    {
        return Auth::user()->company->payments->where('uuid', $uuid)->firstOrFail();
    }

    public function webhook(string $uuid, array $data): Payments
    {
        return Auth::user()->company->payments->where('uuid', $uuid)->firstOrFail();
    }

    public function storeStatus(string $uuid, array $data): Payments
    {
        return Auth::user()->company->payments->where('uuid', $uuid)->status->create($data)->refres();
    }
}
