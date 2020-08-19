<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('districts')->delete();
        
        \DB::table('districts')->insert(array (
            0 => 
            array (
                'id' => 'TZ0206',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Arusha',
                'region_id' => 'TZ02',
                'name' => 'Arusha',
            ),
            1 => 
            array (
                'id' => 'TZ0203',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Arusha',
                'region_id' => 'TZ02',
                'name' => 'Arusha Urban',
            ),
            2 => 
            array (
                'id' => 'TZ0204',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Arusha',
                'region_id' => 'TZ02',
                'name' => 'Karatu',
            ),
            3 => 
            array (
                'id' => 'TZ0207',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Arusha',
                'region_id' => 'TZ02',
                'name' => 'Longido',
            ),
            4 => 
            array (
                'id' => 'TZ0202',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Arusha',
                'region_id' => 'TZ02',
                'name' => 'Meru',
            ),
            5 => 
            array (
                'id' => 'TZ0201',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Arusha',
                'region_id' => 'TZ02',
                'name' => 'Monduli',
            ),
            6 => 
            array (
                'id' => 'TZ0205',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Arusha',
                'region_id' => 'TZ02',
                'name' => 'Ngorongoro',
            ),
            7 => 
            array (
                'id' => 'TZ0702',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Dar-es-salaam',
                'region_id' => 'TZ07',
                'name' => 'Ilala',
            ),
            8 => 
            array (
                'id' => 'TZ0701',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Dar-es-salaam',
                'region_id' => 'TZ07',
                'name' => 'Kinondoni',
            ),
            9 => 
            array (
                'id' => 'TZ0703',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Dar-es-salaam',
                'region_id' => 'TZ07',
                'name' => 'Temeke',
            ),
            10 => 
            array (
                'id' => 'TZ0106',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Dodoma',
                'region_id' => 'TZ01',
                'name' => 'Bahi',
            ),
            11 => 
            array (
                'id' => 'TZ0104',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Dodoma',
                'region_id' => 'TZ01',
                'name' => 'Chamwino',
            ),
            12 => 
            array (
                'id' => 'TZ0107',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Dodoma',
                'region_id' => 'TZ01',
                'name' => 'Chemba',
            ),
            13 => 
            array (
                'id' => 'TZ0105',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Dodoma',
                'region_id' => 'TZ01',
                'name' => 'Dodoma Urban',
            ),
            14 => 
            array (
                'id' => 'TZ0101',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Dodoma',
                'region_id' => 'TZ01',
                'name' => 'Kondoa',
            ),
            15 => 
            array (
                'id' => 'TZ0103',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Dodoma',
                'region_id' => 'TZ01',
                'name' => 'Kongwa',
            ),
            16 => 
            array (
                'id' => 'TZ0102',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Dodoma',
                'region_id' => 'TZ01',
                'name' => 'Mpwapwa',
            ),
            17 => 
            array (
                'id' => 'TZ2504',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Geita',
                'region_id' => 'TZ25',
                'name' => 'Bukombe',
            ),
            18 => 
            array (
                'id' => 'TZ2505',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Geita',
                'region_id' => 'TZ25',
                'name' => 'Chato',
            ),
            19 => 
            array (
                'id' => 'TZ2501',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Geita',
                'region_id' => 'TZ25',
                'name' => 'Geita',
            ),
            20 => 
            array (
                'id' => 'TZ2503',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Geita',
                'region_id' => 'TZ25',
                'name' => 'Mbogwe',
            ),
            21 => 
            array (
                'id' => 'TZ2502',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Geita',
                'region_id' => 'TZ25',
                'name' => 'Nyang\'hwale',
            ),
            22 => 
            array (
                'id' => 'TZ1101',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Iringa',
                'region_id' => 'TZ11',
                'name' => 'Iringa',
            ),
            23 => 
            array (
                'id' => 'TZ5402',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kaskazini Pemba',
                'region_id' => 'TZ54',
                'name' => 'Micheweni',
            ),
            24 => 
            array (
                'id' => 'TZ5401',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kaskazini Pemba',
                'region_id' => 'TZ54',
                'name' => 'Wete',
            ),
            25 => 
            array (
                'id' => 'TZ5101',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kaskazini Unguja',
                'region_id' => 'TZ51',
                'name' => 'Kaskazini A',
            ),
            26 => 
            array (
                'id' => 'TZ5102',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kaskazini Unguja',
                'region_id' => 'TZ51',
                'name' => 'Kaskazini B',
            ),
            27 => 
            array (
                'id' => 'TZ2303',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Katavi',
                'region_id' => 'TZ23',
                'name' => 'Mlele',
            ),
            28 => 
            array (
                'id' => 'TZ2302',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Katavi',
                'region_id' => 'TZ23',
                'name' => 'Mpanda',
            ),
            29 => 
            array (
                'id' => 'TZ0803',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Lindi',
                'region_id' => 'TZ08',
                'name' => 'Nachingwea',
            ),
            30 => 
            array (
                'id' => 'TZ0805',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Lindi',
                'region_id' => 'TZ08',
                'name' => 'Ruangwa',
            ),
            31 => 
            array (
                'id' => 'TZ2101',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Manyara',
                'region_id' => 'TZ21',
                'name' => 'Babati',
            ),
            32 => 
            array (
                'id' => 'TZ0507',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Morogoro',
                'region_id' => 'TZ05',
                'name' => 'Gairo',
            ),
            33 => 
            array (
                'id' => 'TZ0503',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Morogoro',
                'region_id' => 'TZ05',
                'name' => 'Kilombero',
            ),
            34 => 
            array (
                'id' => 'TZ0501',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Morogoro',
                'region_id' => 'TZ05',
                'name' => 'Kilosa',
            ),
            35 => 
            array (
                'id' => 'TZ0502',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Morogoro',
                'region_id' => 'TZ05',
                'name' => 'Morogoro',
            ),
            36 => 
            array (
                'id' => 'TZ1502',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Rukwa',
                'region_id' => 'TZ15',
                'name' => 'Sumbawanga',
            ),
            37 => 
            array (
                'id' => 'TZ1504',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Rukwa',
                'region_id' => 'TZ15',
                'name' => 'Sumbawanga Urban',
            ),
            38 => 
            array (
                'id' => 'TZ1003',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Ruvuma',
                'region_id' => 'TZ10',
                'name' => 'Mbinga',
            ),
            39 => 
            array (
                'id' => 'TZ1005',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Ruvuma',
                'region_id' => 'TZ10',
                'name' => 'Namtumbo',
            ),
            40 => 
            array (
                'id' => 'TZ1006',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Ruvuma',
                'region_id' => 'TZ10',
                'name' => 'Nyasa',
            ),
            41 => 
            array (
                'id' => 'TZ1002',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Ruvuma',
                'region_id' => 'TZ10',
                'name' => 'Songea',
            ),
            42 => 
            array (
                'id' => 'TZ1103',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Iringa',
                'region_id' => 'TZ11',
                'name' => 'Iringa Urban',
            ),
            43 => 
            array (
                'id' => 'TZ1104',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Iringa',
                'region_id' => 'TZ11',
                'name' => 'Kilolo',
            ),
            44 => 
            array (
                'id' => 'TZ0306',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kilimanjaro',
                'region_id' => 'TZ03',
                'name' => 'Moshi Urban',
            ),
            45 => 
            array (
                'id' => 'TZ0302',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kilimanjaro',
                'region_id' => 'TZ03',
                'name' => 'Mwanga',
            ),
            46 => 
            array (
                'id' => 'TZ1207',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mbeya',
                'region_id' => 'TZ12',
                'name' => 'Mbarali',
            ),
            47 => 
            array (
                'id' => 'TZ1202',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mbeya',
                'region_id' => 'TZ12',
                'name' => 'Mbeya',
            ),
            48 => 
            array (
                'id' => 'TZ1208',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mbeya',
                'region_id' => 'TZ12',
                'name' => 'Mbeya Urban',
            ),
            49 => 
            array (
                'id' => 'TZ1204',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mbeya',
                'region_id' => 'TZ12',
                'name' => 'Rungwe',
            ),
            50 => 
            array (
                'id' => 'TZ5301',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mjini Magharibi',
                'region_id' => 'TZ53',
                'name' => 'Magharibi',
            ),
            51 => 
            array (
                'id' => 'TZ5302',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mjini Magharibi',
                'region_id' => 'TZ53',
                'name' => 'Mjini',
            ),
            52 => 
            array (
                'id' => 'TZ1105',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Iringa',
                'region_id' => 'TZ11',
                'name' => 'Mafinga Township Authority',
            ),
            53 => 
            array (
                'id' => 'TZ1102',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Iringa',
                'region_id' => 'TZ11',
                'name' => 'Mufindi',
            ),
            54 => 
            array (
                'id' => 'TZ1804',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kagera',
                'region_id' => 'TZ18',
                'name' => 'Biharamulo',
            ),
            55 => 
            array (
                'id' => 'TZ1802',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kagera',
                'region_id' => 'TZ18',
                'name' => 'Bukoba',
            ),
            56 => 
            array (
                'id' => 'TZ1806',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kagera',
                'region_id' => 'TZ18',
                'name' => 'Bukoba Urban',
            ),
            57 => 
            array (
                'id' => 'TZ1801',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kagera',
                'region_id' => 'TZ18',
                'name' => 'Karagwe',
            ),
            58 => 
            array (
                'id' => 'TZ1808',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kagera',
                'region_id' => 'TZ18',
                'name' => 'Kyerwa',
            ),
            59 => 
            array (
                'id' => 'TZ1807',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kagera',
                'region_id' => 'TZ18',
                'name' => 'Missenyi',
            ),
            60 => 
            array (
                'id' => 'TZ1803',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kagera',
                'region_id' => 'TZ18',
                'name' => 'Muleba',
            ),
            61 => 
            array (
                'id' => 'TZ1805',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kagera',
                'region_id' => 'TZ18',
                'name' => 'Ngara',
            ),
            62 => 
            array (
                'id' => 'TZ2301',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Katavi',
                'region_id' => 'TZ23',
                'name' => 'Mpanda Urban',
            ),
            63 => 
            array (
                'id' => 'TZ1606',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kigoma',
                'region_id' => 'TZ16',
                'name' => 'Buhigwe',
            ),
            64 => 
            array (
                'id' => 'TZ1607',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kigoma',
                'region_id' => 'TZ16',
                'name' => 'Kakonko',
            ),
            65 => 
            array (
                'id' => 'TZ1602',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kigoma',
                'region_id' => 'TZ16',
                'name' => 'Kasulu',
            ),
            66 => 
            array (
                'id' => 'TZ1608',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kigoma',
                'region_id' => 'TZ16',
                'name' => 'Kasulu Township Authority',
            ),
            67 => 
            array (
                'id' => 'TZ1601',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kigoma',
                'region_id' => 'TZ16',
                'name' => 'Kibondo',
            ),
            68 => 
            array (
                'id' => 'TZ1603',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kigoma',
                'region_id' => 'TZ16',
                'name' => 'Kigoma',
            ),
            69 => 
            array (
                'id' => 'TZ1604',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kigoma',
                'region_id' => 'TZ16',
                'name' => 'Kigoma  Urban',
            ),
            70 => 
            array (
                'id' => 'TZ1605',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kigoma',
                'region_id' => 'TZ16',
                'name' => 'Uvinza',
            ),
            71 => 
            array (
                'id' => 'TZ0305',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kilimanjaro',
                'region_id' => 'TZ03',
                'name' => 'Hai',
            ),
            72 => 
            array (
                'id' => 'TZ0304',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kilimanjaro',
                'region_id' => 'TZ03',
                'name' => 'Moshi',
            ),
            73 => 
            array (
                'id' => 'TZ0301',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kilimanjaro',
                'region_id' => 'TZ03',
                'name' => 'Rombo',
            ),
            74 => 
            array (
                'id' => 'TZ0303',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kilimanjaro',
                'region_id' => 'TZ03',
                'name' => 'Same',
            ),
            75 => 
            array (
                'id' => 'TZ0307',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kilimanjaro',
                'region_id' => 'TZ03',
                'name' => 'Siha',
            ),
            76 => 
            array (
                'id' => 'TZ5501',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kusini Pemba',
                'region_id' => 'TZ55',
                'name' => 'Chake Chake',
            ),
            77 => 
            array (
                'id' => 'TZ5502',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kusini Pemba',
                'region_id' => 'TZ55',
                'name' => 'Mkoani',
            ),
            78 => 
            array (
                'id' => 'TZ5201',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kusini Unguja',
                'region_id' => 'TZ52',
                'name' => 'Kati',
            ),
            79 => 
            array (
                'id' => 'TZ5202',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Kusini Unguja',
                'region_id' => 'TZ52',
                'name' => 'Kusini',
            ),
            80 => 
            array (
                'id' => 'TZ0801',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Lindi',
                'region_id' => 'TZ08',
                'name' => 'Kilwa',
            ),
            81 => 
            array (
                'id' => 'TZ0802',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Lindi',
                'region_id' => 'TZ08',
                'name' => 'Lindi',
            ),
            82 => 
            array (
                'id' => 'TZ0806',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Lindi',
                'region_id' => 'TZ08',
                'name' => 'Lindi Urban',
            ),
            83 => 
            array (
                'id' => 'TZ0804',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Lindi',
                'region_id' => 'TZ08',
                'name' => 'Liwale',
            ),
            84 => 
            array (
                'id' => 'TZ2106',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Manyara',
                'region_id' => 'TZ21',
                'name' => 'Babati Urban',
            ),
            85 => 
            array (
                'id' => 'TZ2102',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Manyara',
                'region_id' => 'TZ21',
                'name' => 'Hanang',
            ),
            86 => 
            array (
                'id' => 'TZ2105',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Manyara',
                'region_id' => 'TZ21',
                'name' => 'Kiteto',
            ),
            87 => 
            array (
                'id' => 'TZ2103',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Manyara',
                'region_id' => 'TZ21',
                'name' => 'Mbulu',
            ),
            88 => 
            array (
                'id' => 'TZ2104',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Manyara',
                'region_id' => 'TZ21',
                'name' => 'Simanjiro',
            ),
            89 => 
            array (
                'id' => 'TZ2004',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mara',
                'region_id' => 'TZ20',
                'name' => 'Bunda',
            ),
            90 => 
            array (
                'id' => 'TZ2007',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mara',
                'region_id' => 'TZ20',
                'name' => 'Butiam',
            ),
            91 => 
            array (
                'id' => 'TZ2003',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mara',
                'region_id' => 'TZ20',
                'name' => 'Musoma',
            ),
            92 => 
            array (
                'id' => 'TZ2005',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mara',
                'region_id' => 'TZ20',
                'name' => 'Musoma Urban',
            ),
            93 => 
            array (
                'id' => 'TZ2006',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mara',
                'region_id' => 'TZ20',
                'name' => 'Rorya',
            ),
            94 => 
            array (
                'id' => 'TZ2002',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mara',
                'region_id' => 'TZ20',
                'name' => 'Serengeti',
            ),
            95 => 
            array (
                'id' => 'TZ2001',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mara',
                'region_id' => 'TZ20',
                'name' => 'Tarime',
            ),
            96 => 
            array (
                'id' => 'TZ1201',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mbeya',
                'region_id' => 'TZ12',
                'name' => 'Chunya',
            ),
            97 => 
            array (
                'id' => 'TZ1203',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mbeya',
                'region_id' => 'TZ12',
                'name' => 'Kyela',
            ),
            98 => 
            array (
                'id' => 'TZ0505',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Morogoro',
                'region_id' => 'TZ05',
                'name' => 'Morogoro Urban',
            ),
            99 => 
            array (
                'id' => 'TZ0506',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Morogoro',
                'region_id' => 'TZ05',
                'name' => 'Mvomero',
            ),
            100 => 
            array (
                'id' => 'TZ0504',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Morogoro',
                'region_id' => 'TZ05',
                'name' => 'Ulanga',
            ),
            101 => 
            array (
                'id' => 'TZ0903',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mtwara',
                'region_id' => 'TZ09',
                'name' => 'Masasi',
            ),
            102 => 
            array (
                'id' => 'TZ0907',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mtwara',
                'region_id' => 'TZ09',
                'name' => 'Masasi  Township Authority',
            ),
            103 => 
            array (
                'id' => 'TZ0901',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mtwara',
                'region_id' => 'TZ09',
                'name' => 'Mtwara',
            ),
            104 => 
            array (
                'id' => 'TZ0902',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mtwara',
                'region_id' => 'TZ09',
                'name' => 'Newala',
            ),
            105 => 
            array (
                'id' => 'TZ0904',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mtwara',
                'region_id' => 'TZ09',
                'name' => 'Tandahimba',
            ),
            106 => 
            array (
                'id' => 'TZ1906',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mwanza',
                'region_id' => 'TZ19',
                'name' => 'Ilemela',
            ),
            107 => 
            array (
                'id' => 'TZ1904',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mwanza',
                'region_id' => 'TZ19',
                'name' => 'Kwimba',
            ),
            108 => 
            array (
                'id' => 'TZ1902',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mwanza',
                'region_id' => 'TZ19',
                'name' => 'Magu',
            ),
            109 => 
            array (
                'id' => 'TZ1907',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mwanza',
                'region_id' => 'TZ19',
                'name' => 'Misungwi',
            ),
            110 => 
            array (
                'id' => 'TZ1903',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mwanza',
                'region_id' => 'TZ19',
                'name' => 'Nyamagana',
            ),
            111 => 
            array (
                'id' => 'TZ1905',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mwanza',
                'region_id' => 'TZ19',
                'name' => 'Sengerema',
            ),
            112 => 
            array (
                'id' => 'TZ1901',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mwanza',
                'region_id' => 'TZ19',
                'name' => 'Ukerewe',
            ),
            113 => 
            array (
                'id' => 'TZ2205',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Njombe',
                'region_id' => 'TZ22',
                'name' => 'Ludewa',
            ),
            114 => 
            array (
                'id' => 'TZ2206',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Njombe',
                'region_id' => 'TZ22',
                'name' => 'Makambako Township Authority',
            ),
            115 => 
            array (
                'id' => 'TZ2203',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Njombe',
                'region_id' => 'TZ22',
                'name' => 'Makete',
            ),
            116 => 
            array (
                'id' => 'TZ2204',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Njombe',
                'region_id' => 'TZ22',
                'name' => 'Njombe',
            ),
            117 => 
            array (
                'id' => 'TZ2201',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Njombe',
                'region_id' => 'TZ22',
                'name' => 'Njombe Urban',
            ),
            118 => 
            array (
                'id' => 'TZ2202',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Njombe',
                'region_id' => 'TZ22',
                'name' => 'Wanging\'ombe',
            ),
            119 => 
            array (
                'id' => 'TZ0601',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Pwani',
                'region_id' => 'TZ06',
                'name' => 'Bagamoyo',
            ),
            120 => 
            array (
                'id' => 'TZ0602',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Pwani',
                'region_id' => 'TZ06',
                'name' => 'Kibaha',
            ),
            121 => 
            array (
                'id' => 'TZ0607',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Pwani',
                'region_id' => 'TZ06',
                'name' => 'Kibaha Urban',
            ),
            122 => 
            array (
                'id' => 'TZ0603',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Pwani',
                'region_id' => 'TZ06',
                'name' => 'Kisarawe',
            ),
            123 => 
            array (
                'id' => 'TZ0606',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Pwani',
                'region_id' => 'TZ06',
                'name' => 'Mafia',
            ),
            124 => 
            array (
                'id' => 'TZ0604',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Pwani',
                'region_id' => 'TZ06',
                'name' => 'Mkuranga',
            ),
            125 => 
            array (
                'id' => 'TZ0605',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Pwani',
                'region_id' => 'TZ06',
                'name' => 'Rufiji',
            ),
            126 => 
            array (
                'id' => 'TZ1501',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Rukwa',
                'region_id' => 'TZ15',
                'name' => 'Kalambo',
            ),
            127 => 
            array (
                'id' => 'TZ1503',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Rukwa',
                'region_id' => 'TZ15',
                'name' => 'Nkasi',
            ),
            128 => 
            array (
                'id' => 'TZ0905',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mtwara',
                'region_id' => 'TZ09',
                'name' => 'Mtwara Urban',
            ),
            129 => 
            array (
                'id' => 'TZ0906',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Mtwara',
                'region_id' => 'TZ09',
                'name' => 'Nanyumbu',
            ),
            130 => 
            array (
                'id' => 'TZ1004',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Ruvuma',
                'region_id' => 'TZ10',
                'name' => 'Songea Urban',
            ),
            131 => 
            array (
                'id' => 'TZ1001',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Ruvuma',
                'region_id' => 'TZ10',
                'name' => 'Tunduru',
            ),
            132 => 
            array (
                'id' => 'TZ1704',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Shinyanga',
                'region_id' => 'TZ17',
                'name' => 'Kahama',
            ),
            133 => 
            array (
                'id' => 'TZ1705',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Shinyanga',
                'region_id' => 'TZ17',
                'name' => 'Kahama Township Authority',
            ),
            134 => 
            array (
                'id' => 'TZ1702',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Shinyanga',
                'region_id' => 'TZ17',
                'name' => 'Kishapu',
            ),
            135 => 
            array (
                'id' => 'TZ1703',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Shinyanga',
                'region_id' => 'TZ17',
                'name' => 'Shinyanga',
            ),
            136 => 
            array (
                'id' => 'TZ1701',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Shinyanga',
                'region_id' => 'TZ17',
                'name' => 'Shinyanga Urban',
            ),
            137 => 
            array (
                'id' => 'TZ2401',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Simiyu',
                'region_id' => 'TZ24',
                'name' => 'Bariadi',
            ),
            138 => 
            array (
                'id' => 'TZ2405',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Simiyu',
                'region_id' => 'TZ24',
                'name' => 'Busega',
            ),
            139 => 
            array (
                'id' => 'TZ2402',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Simiyu',
                'region_id' => 'TZ24',
                'name' => 'Itilima',
            ),
            140 => 
            array (
                'id' => 'TZ2404',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Simiyu',
                'region_id' => 'TZ24',
                'name' => 'Maswa',
            ),
            141 => 
            array (
                'id' => 'TZ2403',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Simiyu',
                'region_id' => 'TZ24',
                'name' => 'Meatu',
            ),
            142 => 
            array (
                'id' => 'TZ1305',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Singida',
                'region_id' => 'TZ13',
                'name' => 'Ikungi',
            ),
            143 => 
            array (
                'id' => 'TZ1301',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Singida',
                'region_id' => 'TZ13',
                'name' => 'Iramba',
            ),
            144 => 
            array (
                'id' => 'TZ1303',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Singida',
                'region_id' => 'TZ13',
                'name' => 'Manyoni',
            ),
            145 => 
            array (
                'id' => 'TZ1306',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Singida',
                'region_id' => 'TZ13',
                'name' => 'Mkalama',
            ),
            146 => 
            array (
                'id' => 'TZ1302',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Singida',
                'region_id' => 'TZ13',
                'name' => 'Singida',
            ),
            147 => 
            array (
                'id' => 'TZ1304',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Singida',
                'region_id' => 'TZ13',
                'name' => 'Singida Urban',
            ),
            148 => 
            array (
                'id' => 'TZ2605',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Songwe',
                'region_id' => 'TZ26',
                'name' => 'Ileje',
            ),
            149 => 
            array (
                'id' => 'TZ2606',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Songwe',
                'region_id' => 'TZ26',
                'name' => 'Mbozi',
            ),
            150 => 
            array (
                'id' => 'TZ2609',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Songwe',
                'region_id' => 'TZ26',
                'name' => 'Momba',
            ),
            151 => 
            array (
                'id' => 'TZ2601',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Songwe',
                'region_id' => 'TZ26',
                'name' => 'Songwe',
            ),
            152 => 
            array (
                'id' => 'TZ0402',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tanga',
                'region_id' => 'TZ04',
                'name' => 'Korogwe',
            ),
            153 => 
            array (
                'id' => 'TZ0409',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tanga',
                'region_id' => 'TZ04',
                'name' => 'Korogwe Township Authority',
            ),
            154 => 
            array (
                'id' => 'TZ0401',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tanga',
                'region_id' => 'TZ04',
                'name' => 'Lushoto',
            ),
            155 => 
            array (
                'id' => 'TZ0408',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tanga',
                'region_id' => 'TZ04',
                'name' => 'Mkinga',
            ),
            156 => 
            array (
                'id' => 'TZ0403',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tanga',
                'region_id' => 'TZ04',
                'name' => 'Muheza',
            ),
            157 => 
            array (
                'id' => 'TZ0405',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tanga',
                'region_id' => 'TZ04',
                'name' => 'Pangani',
            ),
            158 => 
            array (
                'id' => 'TZ0404',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tanga',
                'region_id' => 'TZ04',
                'name' => 'Tanga Urban',
            ),
            159 => 
            array (
                'id' => 'TZ2610',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Songwe',
                'region_id' => 'TZ26',
                'name' => 'Tunduma',
            ),
            160 => 
            array (
                'id' => 'TZ1402',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tabora',
                'region_id' => 'TZ14',
                'name' => 'Igunga',
            ),
            161 => 
            array (
                'id' => 'TZ1407',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tabora',
                'region_id' => 'TZ14',
                'name' => 'Kaliua',
            ),
            162 => 
            array (
                'id' => 'TZ1401',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tabora',
                'region_id' => 'TZ14',
                'name' => 'Nzega',
            ),
            163 => 
            array (
                'id' => 'TZ1405',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tabora',
                'region_id' => 'TZ14',
                'name' => 'Sikonge',
            ),
            164 => 
            array (
                'id' => 'TZ1406',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tabora',
                'region_id' => 'TZ14',
                'name' => 'Tabora Urban',
            ),
            165 => 
            array (
                'id' => 'TZ1404',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tabora',
                'region_id' => 'TZ14',
                'name' => 'Urambo',
            ),
            166 => 
            array (
                'id' => 'TZ1403',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tabora',
                'region_id' => 'TZ14',
                'name' => 'Uyui',
            ),
            167 => 
            array (
                'id' => 'TZ0406',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tanga',
                'region_id' => 'TZ04',
                'name' => 'Handeni',
            ),
            168 => 
            array (
                'id' => 'TZ0410',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tanga',
                'region_id' => 'TZ04',
                'name' => 'Handeni Mji',
            ),
            169 => 
            array (
                'id' => 'TZ0407',
                'adm0_en' => 'United Republic of Tanzania',
                'adm0_sw' => 'Jamhuri ya Muungano wa Tanzania',
                'adm0_pcode' => 'TZ',
                'adm1_en' => 'Tanga',
                'region_id' => 'TZ04',
                'name' => 'Kilindi',
            ),
        ));
        
        
    }
}