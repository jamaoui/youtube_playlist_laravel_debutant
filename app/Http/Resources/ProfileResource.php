<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $values = parent::toArray($request);

        $values['id'] = $this->id;
        if(isset($values['image'])) {
            $values['image'] = url('storage/'.$values['image']);
        }
        $values['created'] = date_format(date_create($values['created_at']),'d-m-Y');
        
        unset($values['created_at'],$values['bio'],$values['id']);

        return $values;
    }

    public static function collection($resource)
    {
        $values = parent::collection($resource)->additional([
            'count' => $resource->count()
        ]);
        return $values;
    }
}
