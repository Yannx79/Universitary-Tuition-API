<?php

namespace App\Filters;

class CourseFilter extends QueryFilters
{
    /**
     * Filtrar por nombre.
     *
     * @param string|null $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function name($name = null)
    {
        if (!is_null($name)) {
            return $this->builder->where('name', 'like', "%$name%");
        }
    }

    /**
     * Filtrar por ID de docente.
     *
     * @param int|null $docentId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function docent($docentId = null)
    {
        if (!is_null($docentId)) {
            return $this->builder->where('docent_id', $docentId);
        }
    }
}
