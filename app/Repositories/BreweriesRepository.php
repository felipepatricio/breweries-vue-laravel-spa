<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 05/12/18
 * Time: 17:10
 */

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BreweriesRepository
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openbrewerydb.org/'
        ]);
    }

    public function all()
    {
        try {
            $response = $this->client->request('GET', 'breweries');
        } catch (GuzzleException $error) {
            echo 'Error: ', $error->getMessage();
        }

        return json_decode(
            $response->getBody()
                ->getContents()
        );
    }

    public function findForId($id)
    {
        try {
            $response = $this->client->request('GET', "breweries/$id");
        } catch (GuzzleException $error) {
            echo 'Error: ', $error->getMessage();
        }

        return json_decode(
            $response->getBody()
                ->getContents()
        );
    }
}
