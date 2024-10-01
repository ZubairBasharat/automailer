<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AdministratorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "idadministrador" => $this->idadministrador,
            "nombres" => $this->nombres,
            "email" => $this->email,
            "apellidos" => $this->apellidos,
            "usuario" => $this->usuario,
            "estadoadm" => $this->estadoadm,
        ];
    }
}
