<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name_project', 'description', 'file', 'user_id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id'); // Relación con el creador del proyecto
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'participants')->withPivot('assigned_by'); // Relación con los participantes, con el campo 'assigned_by'
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'participants')
            ->withPivot('assigned_by')
            ->withTimestamps();
    }
}
