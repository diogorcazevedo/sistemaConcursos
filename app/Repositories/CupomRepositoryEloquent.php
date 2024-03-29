<?php

namespace IS\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use IS\Repositories\CupomRepository;
use IS\Models\Cupom;

/**
 * Class CupomRepositoryEloquent
 * @package namespace IS\Repositories;
 */
class CupomRepositoryEloquent extends BaseRepository implements CupomRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cupom::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
