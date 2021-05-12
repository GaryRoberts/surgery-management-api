<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Patient extends JsonResource
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
            'fname' => $this->fname,
            'lname' => $this->lname,
            'dob' => $this->dob,
            'contactNumber' => $this->contactNumber,
        ];
    }
}
