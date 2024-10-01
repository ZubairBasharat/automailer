<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nombre" => $this->nombre,
            "email" => $this->email,
            "apellido" => $this->apellido,
            "telefono" => $this->telefono,
            "estado" => $this->estado,
            "rut" => $this->rut,
            "direccion" => $this->direccion,
            "comuna" => $this->comuna,
            "asegurador" => $this->asegurador,
            "fecha" => $this->fecha
        ];
    }
}
