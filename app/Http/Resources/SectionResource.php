<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "idseccion" => $this->idseccion,
            "titulo" => $this->titulo,
            "detalle" => $this->detalle,
            "estado" => $this->estado,
            "seccion" => $this->seccion,
            "estado" => $this->estado,
            "orden" => $this->orden,
            "seodetalle" => $this->seodetalle,
            "tipo" => $this->tipo,
            "foto" => $this->foto,
            "resumen" => $this->resumen,
            "seourl" => $this->seourl,
            "meta_titulo" => $this->meta_titulo,
            "costo" => $this->costo
        ];
    }
}
