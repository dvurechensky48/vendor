<?php

namespace Orchid\CMS\Core\Models;

class Category extends TermTaxonomy
{
    /**
     * Used to set the post's type.
     */
    protected $taxonomy = 'category';
}
