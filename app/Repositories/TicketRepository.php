<?php

namespace App\Repositories;

use App\Models\Ticket;
use Illuminate\Support\Str;


/**
 * Class ThemeRepository
 * @package App\Repositories
 * @version November 11, 2020, 8:08 am UTC
 */

class TicketRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description'
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

    public function code(): string
    {

        $unique = Str::random(5);

        $check = Ticket::where('code', $unique)->first();

        if ($check) {
            return $this->reference();
        }

        return $unique;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ticket::class;
    }
}
