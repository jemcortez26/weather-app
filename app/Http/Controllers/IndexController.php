<?php

namespace App\Http\Controllers;

use App\Libraries\TextConstantLib;

/**
 * Class IndexController
 * @package App\Http\Controllers
 * @author Jesumar B. Cortez <jesumarcortez@gmail.com>
 * @since 01/30/2023
 */
class IndexController
{

    /**
     * Returns view object of index page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewIndex(): object
    {
        return view(TextConstantLib::INDEX);
    }
}
