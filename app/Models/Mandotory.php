<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mandotory extends Model
{
    use HasFactory;

    protected $table = 'mandotories';
    protected $fillable = [
        'incorporationCertificate',
        'tinCertificate',
        'businessLicense',
        'organizationProfile',
        'membership',
        'infoRelevant',
        'reasons'
    ];
}
