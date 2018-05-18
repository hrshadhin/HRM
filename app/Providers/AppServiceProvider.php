<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Area;
use App\Project;
use App\Flat;
use App\Customer;
use App\Rent;
use App\RentCollection;
use App\Expense;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.master', 'App\Http\Composers\MasterComposer');
        
        Area::deleted(
            function ($area) {
                $area->projects()->delete();
            }
        );

        Project::deleted(
            function ($project) {
                $project->flats()->delete();
                $project->expenses()->delete();
                $project->rents()->delete();
            }
        );

        Flat::deleted(
            function ($flat) {
                $flat->rents()->delete();
            }
        );

        Customer::deleted(
            function ($customer) {
                $customer->rents()->delete();
                $customer->collections()->delete();
            }
        );
        Rent::deleted(
            function ($rent) {
                $rent->collections()->delete();
            }
        );

        //        Project::restored(function($project) {
        //            $project->services()->withTrashed()->restore();
        //        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
