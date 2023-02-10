<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            // 'foto'=>1,
            // 'qrcode'=>$this->qrcode,
            // 'deskripsi'=>$this->deskripsi,
            // 'harga'=>$this->harga,
            // 'harga_promo'=>$this->harga_promo,
            // // 'stok'=>$this->stok,
            // // 'price_buy'=>auth()->user()->member && auth()->user()->member->is_active == 1 ? $this->harga_promo : $this->harga,
            // 'user'=>''
        ];
    }
}
