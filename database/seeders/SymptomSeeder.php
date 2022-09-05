<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Symptom;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Symptom::insert([
        [
        	'user_id' => 1,
            'code' => 1,
            'symptom' => ucfirst(strtolower('demam')),
            'weight' => 3,
            'information' => 'ini demam'
        ],
    	[
        	'user_id' => 1,
            'code' => 2,
            'symptom' => ucfirst(strtolower('mudah kelelahan')),
            'weight' => 3,
            'information' => 'ini mudah kelelahan'
        ],
    	[
        	'user_id' => 1,
            'code' => 3,
            'symptom' => ucfirst(strtolower('batuk kering')),
            'weight' => 5,
            'information' => 'ini batuk kering'
        ],
    	[
        	'user_id' => 1,
            'code' => 4,
            'symptom' => ucfirst(strtolower('kesulitan bernafas')),
            'weight' => 5,
            'information' => 'ini kesulitan bernafas'
        ],
    	[
        	'user_id' => 1,
            'code' => 5,
            'symptom' => ucfirst(strtolower('hidung tersumbat')),
            'weight' => 1,
            'information' => 'ini hidung tersumbat'
        ],
    	[
        	'user_id' => 1,
            'code' => 6,
            'symptom' => ucfirst(strtolower('tenggorokan sakit')),
            'weight' => 3,
            'information' => 'ini tenggorokan sakit'
        ],
    	[
        	'user_id' => 1,
            'code' => 7,
            'symptom' => ucfirst(strtolower('diare')),
            'weight' => 1,
            'information' => 'ini diare'
        ],
    	[
        	'user_id' => 1,
            'code' => 8,
            'symptom' => ucfirst(strtolower('pilek')),
            'weight' => 1,
            'information' => 'ini pilek'
        ],
    	[
        	'user_id' => 1,
            'code' => 9,
            'symptom' => ucfirst(strtolower('hilangnya indra perasa')),
            'weight' => 5,
            'information' => 'ini hilangnya indra perasa'
        ],
    	[
        	'user_id' => 1,
            'code' => 10,
            'symptom' => ucfirst(strtolower('mudah kelelahan')),
            'weight' => 3,
            'information' => 'ini mudah kelelahan'
        ],
    	[
        	'user_id' => 1,
            'code' => 11,
            'symptom' => ucfirst(strtolower('hilangnya indra penciuman')),
            'weight' => 5,
            'information' => 'ini hilangnya indra penciuman'
        ]]);
    }
}
