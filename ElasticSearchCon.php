<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;

class ElasticSearchCon extends Controller
{
    public function insert(){
       
        foreach ($this->sample_data() as $key => $data) {
            $client = ClientBuilder::create()->build();
            $params = [ 
                'index' => 'properties',
                'id' => $data['id'],
                'body' => $data 
            ]; 
            $response = $client->index($params);
        }

        return response()->json($response);
    }

    public function delete_index(){
        $client = ClientBuilder::create()->build();
       
        $deleteParams = [
            'index' => 'properties'
        ];
        $response = $client->indices()->delete($deleteParams);

        return response()->json($response);
    }

    public function get(){
        $client = ClientBuilder::create()->build();

        $params = [
            'index' => 'properties',
            'id' => 16
        ];
        
        $response = $client->get($params);
        return response()->json($response);
    }// Get data by id

    public function delete(){
        $client = ClientBuilder::create()->build();

        $params = [
            'index' => 'properties',
            'id' => '16'
        ];
        
        $response = $client->delete($params);
        return response()->json($response);
    }
   
    public function update(){
        $client = ClientBuilder::create()->build();
       
        $params = [
            'index' => 'properties',
            'id' => '17',
            'body' => [
                'doc' => [
                    'room_type' => 'Entire place!!!!!!!!!!!!!!!!!',
                ]
            ]
        ];

        return $client->update($params);
    }

    public function search(){
        $client = ClientBuilder::create()->build();
        $q = 1;
        $match_query = [
            'index' => 'properties',
            'body'  => [
                'sort' => [
                    ['id' => ['order' => 'asc']]// desc
                ]
            ]
        ];
        

        // $bool = [
            // 'index' => 'my_index',
            // 'body'  => [
            //     'query' => [
            //         'bool' => [
            //             'must' => [
            //                 [ 'match' => [ 'testField' => 'abc' ] ],
            //                 [ 'match' => [ 'testField2' => 'xyz' ] ],
            //             ]
            //         ]
            //     ]
            // ]
        // ];
        // $filter_and_should = [
            //     'index' => 'my_index',
            //     'body'  => [
            //         'query' => [
            //             'bool' => [
            //                 'filter' => [
            //                     'term' => [ 'testField' => 'abc' ]
            //                 ],
            //                 'should' => [
            //                     'match' => [ 'testField' => 'xyz' ]
            //                 ]
            //             ]
            //         ]
            //     ]
        // ];
        // $test_search = [
            //     'index' => 'properties',
            //     'body'  => [
            //         'query' => [
            //             'bool' => [
            //                 'should' => [
            //                     'match' => [ 'title' => 'Transient' ]
            //                 ]
            //             ]
            //         ]
            //     ]
        // ];

        $results = $client->search($match_query);

        return response()->json($results);
    }

    public function sample_data(){
        $sd = [
           [
                'id' => 16,
                'title' => 'Dad\'s Big Transient House',
                'room_type' => 'Entire place',
                'price' => 4500,
                'guest_count' => 10,
                'overall_ratings' => 3.8,
                'total_review' => 2,
           ],
           [
                'id' => 17,
                'title' => 'Condotel at Trees Residences',
                'room_type' => 'Entire place',
                'price' => 1500,
                'guest_count' => 4,
                'overall_ratings' => NULL,
                'total_review' => 0,
           ],
           [
                'id' => 18,
                'title' => 'Beach view Staycation at Azure Urban Resort Residences',
                'room_type' => 'Entire place',
                'price' => 2500,
                'guest_count' => 4,
                'overall_ratings' => NULL,
                'total_review' => 0,
           ],
           [
                'id' => 19,
                'title' => '1BR UNIT POOL VIEW STAYCATION AT AZURE URBAN RESORT RESIDENCES',
                'room_type' => 'Entire place',
                'price' => 4000,
                'guest_count' => 4,
                'overall_ratings' => NULL,
                'total_review' => 0,
           ],
           [
                'id' => 20,
                'title' => '1BR UNIT W/ CITY VIEW STAYCATION AT AZURE URBAN RESORT RESIDENCES',
                'room_type' => 'Entire place',
                'price' => 4000,
                'guest_count' => 4,
                'overall_ratings' => NULL,
                'total_review' => 0,
           ],
           [
                'id' => 21,
                'title' => '2BR unit w/ Lake View at Azure Urban Resort Residences',
                'room_type' => 'Entire place',
                'price' => 6000,
                'guest_count' => 6,
                'overall_ratings' => NULL,
                'total_review' => 0,
           ],
           [
                'id' => 22,
                'title' => '2br unit beach view staycation at Azure Urban Resort Residences',
                'room_type' => 'Entire place',
                'price' => 6000,
                'guest_count' => 6,
                'overall_ratings' => NULL,
                'total_review' => 0,
           ],
           [
                'id' => 28,
                'title' => 'Endless summer at PICO DE LORO Hamilo Coast',
                'room_type' => 'Entire place',
                'price' => 5500,
                'guest_count' => 6,
                'overall_ratings' => NULL,
                'total_review' => 0,
           ],
        ];

        return $sd;
    }
}
