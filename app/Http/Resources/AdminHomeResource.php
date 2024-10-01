<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AdminHomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "idbanner" => $this->idbanner,
            "titulo" => $this?->titulo,
            "link" => $this?->link,
            "estado" => $this?->estado,
            "orden" => $this?->orden,
            "tipo" => $this?->tipo,
            'foto' => $this->foto ? Storage::exists($this->foto) ? Storage::url($this->foto) : null : "",
            "archivo" => $this->archivo,
            "texto1" => $this->texto1,
            "texto2" => $this->texto2,
            "link2" => $this?->link2,
        ];
    }
}
