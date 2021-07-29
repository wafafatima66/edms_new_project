<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDocPermissions extends Model
{
    protected $table = 'users_doc_permissions';

    protected $fillable = [
        'application_type_id','document_type_id','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
