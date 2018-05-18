<?php
namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

class MasterComposer
{

    public function compose(View $view)
    {
        $view->with('idc', '8d4e3c7bd08118bb031dbde8a7f787283c5f94da');
    }

}