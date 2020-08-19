<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('regions')->delete();
        
        \DB::table('regions')->insert(array (
            0 => 
            array (
                'id' => 'TZ02',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Arusha',
            ),
            1 => 
            array (
                'id' => 'TZ07',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Dar-es-salaam',
            ),
            2 => 
            array (
                'id' => 'TZ01',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Dodoma',
            ),
            3 => 
            array (
                'id' => 'TZ25',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Geita',
            ),
            4 => 
            array (
                'id' => 'TZ11',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Iringa',
            ),
            5 => 
            array (
                'id' => 'TZ18',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Kagera',
            ),
            6 => 
            array (
                'id' => 'TZ54',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Kaskazini Pemba',
            ),
            7 => 
            array (
                'id' => 'TZ51',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Kaskazini Unguja',
            ),
            8 => 
            array (
                'id' => 'TZ23',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Katavi',
            ),
            9 => 
            array (
                'id' => 'TZ16',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Kigoma',
            ),
            10 => 
            array (
                'id' => 'TZ03',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Kilimanjaro',
            ),
            11 => 
            array (
                'id' => 'TZ55',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Kusini Pemba',
            ),
            12 => 
            array (
                'id' => 'TZ52',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Kusini Unguja',
            ),
            13 => 
            array (
                'id' => 'TZ08',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Lindi',
            ),
            14 => 
            array (
                'id' => 'TZ21',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Manyara',
            ),
            15 => 
            array (
                'id' => 'TZ20',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Mara',
            ),
            16 => 
            array (
                'id' => 'TZ12',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Mbeya',
            ),
            17 => 
            array (
                'id' => 'TZ53',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Mjini Magharibi',
            ),
            18 => 
            array (
                'id' => 'TZ05',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Morogoro',
            ),
            19 => 
            array (
                'id' => 'TZ09',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Mtwara',
            ),
            20 => 
            array (
                'id' => 'TZ19',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Mwanza',
            ),
            21 => 
            array (
                'id' => 'TZ22',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Njombe',
            ),
            22 => 
            array (
                'id' => 'TZ06',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Pwani',
            ),
            23 => 
            array (
                'id' => 'TZ15',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Rukwa',
            ),
            24 => 
            array (
                'id' => 'TZ10',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Ruvuma',
            ),
            25 => 
            array (
                'id' => 'TZ17',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Shinyanga',
            ),
            26 => 
            array (
                'id' => 'TZ24',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Simiyu',
            ),
            27 => 
            array (
                'id' => 'TZ13',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Singida',
            ),
            28 => 
            array (
                'id' => 'TZ26',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Songwe',
            ),
            29 => 
            array (
                'id' => 'TZ14',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Tabora',
            ),
            30 => 
            array (
                'id' => 'TZ04',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'name' => 'Tanga',
            ),
        ));
        
        
    }
}