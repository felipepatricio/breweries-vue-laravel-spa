<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 05/12/18
 * Time: 16:15
 */

namespace App\Http\Controllers;

use App\Repositories\BreweriesRepository;

class BreweriesController extends Controller {
    protected $breweriesRepository;

    public function __construct(BreweriesRepository $breweriesRepository)
    {
        $this->breweriesRepository = $breweriesRepository;
    }

    public function getAllBreweries()
    {
        $breweries = $this->breweriesRepository->all();

        return $breweries;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getBreweryForId($id)
    {
        $brewery = $this->breweriesRepository->findForId($id);
        dd($brewery);

        return $brewery;
    }
}
