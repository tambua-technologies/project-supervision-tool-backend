<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version November 12, 2020, 6:57 am UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'first_name',
        'last_name',
        'middle_name',
        'phone',
        'email',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }


    public function create($input)
    {
        $user = parent::create($input);
        $user->agencies()->attach([$input['agency_id']]);
        $user->assignRole('admin',);
        return $user->fresh(['agencies']);

    }

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return User::class;
    }
}
