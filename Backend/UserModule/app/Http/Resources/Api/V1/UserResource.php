<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'first_name' => $this->first_name,
            'avatars' => $this->profil,
            'date_naissance' => $this->date_naissance,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_verified' => $this->is_verified,
            'email_verified_at' => $this->email_verified_at,
            'genre' =>$this->genre,
            'role' => $this->role,
            'artisan'=>when($this->isArtisan(),$this->artisan),
            'client' =>when($this->isClient(), $this->client),
            'admin'=>When($this->isAdmin(),$this->admin),
        ];
    }
}
