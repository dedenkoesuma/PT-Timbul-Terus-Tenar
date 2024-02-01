<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use EloquentFilter\Filterable;

class ProductFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function name($value)
    {
        $this->where('title', 'like', "%$value%");
    }
    public function category($category)
    {
        return $this->where('category', $category);
    }

    public function series($series)
    {
        return $this->where('series', $series);
    }

    public function brand($brand)
    {
        return $this->where('brand', $brand);
    }

    public function type($type)
    {
        return $this->where('type', $type);
    }
    public function __construct($query)
    {
        parent::__construct($query);
    }
    
}
