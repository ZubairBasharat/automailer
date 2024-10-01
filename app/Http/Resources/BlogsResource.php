<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BlogsResource extends JsonResource
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
            "titulo" => $this->titulo,
            "seourl" => $this->seourl,
            "fecha_update" => $this->fecha_update,
            "resumen" => $this->resumen,
            "detalle" => $this->detalle,
            "archivo" => $this->archivo ? Storage::exists($this->archivo) ? Storage::url($this->archivo) : null : "",
            "estado" => $this->estado,
            "fecha_publicacion" => $this->fecha_publicacion,
            "meta_titulo" => $this->meta_titulo,
            "meta_descripcion" => $this->meta_descripcion,
        ];
    }
}
