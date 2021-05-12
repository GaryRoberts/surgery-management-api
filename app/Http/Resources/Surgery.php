<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Room;
use App\Models\Staff;
use App\Models\Patient;

class Surgery extends JsonResource
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
            'id' => $this->id,
            'requestedBy' => json_decode(Staff::find($this->requestedBy)),
            'room' => json_decode(Room::find($this->room)),
            'patient' => json_decode(Patient::find($this->patient)),
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'doctors' =>json_decode(Staff::findMany(json_decode($this->doctors))),    
        ];
    }
}
