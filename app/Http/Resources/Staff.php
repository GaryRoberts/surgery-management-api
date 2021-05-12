<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Staff extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'email' => $this->email,
            'staffType' => $this->staffType,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'phone' => $this->phone
        ];
    }
}
