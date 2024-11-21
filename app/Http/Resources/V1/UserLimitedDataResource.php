<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserLimitedDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $timestamp = "2024-11-21T15:32:23.000000Z";
    
        // Convert to Carbon instance
        $date = Carbon::parse($timestamp);

        // Raw format
        $rawFormat = $date->toDateTimeString(); // '2024-11-21 15:32:23'

        // Human-readable format
        $humanFormat = $date->diffForHumans(); // 'in 2 hours' or '2 hours ago'

        $customFormat = $date->format('d M Y, h:i A'); // '21 Nov 2024, 03:32 PM'

        return [
            "name"  => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "age"   => $this->age,
            "created_at"=> [
                'raw'   => $rawFormat,
                'human' => $humanFormat,
                'custom'=>$customFormat
            ]
        ];
    }
}
