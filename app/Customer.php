<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function format(){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'identification_number' => $this->identification_number,
            'year_of_birth' => $this->year_of_birth,
            'company' => $this->company->name,
        ];
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
