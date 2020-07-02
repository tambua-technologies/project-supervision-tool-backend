<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Parental\HasParent;

class Actor extends Agency
{
    use SoftDeletes, HasParent;

}
