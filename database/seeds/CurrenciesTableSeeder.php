<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('currencies')->delete();
        
        \DB::table('currencies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Afghani',
                'iso' => 'AFN',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Euro',
                'iso' => 'EUR',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Lek',
                'iso' => 'ALL',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Algerian Dinar',
                'iso' => 'DZD',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'US Dollar',
                'iso' => 'USD',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Kwanza',
                'iso' => 'AOA',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'East Caribbean Dollar',
                'iso' => 'XCD',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Argentine Peso',
                'iso' => 'ARS',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Armenian Dram',
                'iso' => 'AMD',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Aruban Florin',
                'iso' => 'AWG',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Azerbaijan Manat',
                'iso' => 'AZN',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Bahamian Dollar',
                'iso' => 'BSD',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Bahraini Dinar',
                'iso' => 'BHD',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Taka',
                'iso' => 'BDT',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Barbados Dollar',
                'iso' => 'BBD',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Belarusian Ruble',
                'iso' => 'BYN',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Belize Dollar',
                'iso' => 'BZD',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'CFA Franc BCEAO',
                'iso' => 'XOF',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Bermudian Dollar',
                'iso' => 'BMD',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Ngultrum',
                'iso' => 'BTN',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Boliviano',
                'iso' => 'BOB',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Mvdol',
                'iso' => 'BOV',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Convertible Mark',
                'iso' => 'BAM',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Pula',
                'iso' => 'BWP',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Brazilian Real',
                'iso' => 'BRL',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Brunei Dollar',
                'iso' => 'BND',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Bulgarian Lev',
                'iso' => 'BGN',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Burundi Franc',
                'iso' => 'BIF',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Cabo Verde Escudo',
                'iso' => 'CVE',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Riel',
                'iso' => 'KHR',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'CFA Franc BEAC',
                'iso' => 'XAF',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Canadian Dollar',
                'iso' => 'CAD',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Cayman Islands Dollar',
                'iso' => 'KYD',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Chilean Peso',
                'iso' => 'CLP',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Unidad de Fomento',
                'iso' => 'CLF',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Yuan Renminbi',
                'iso' => 'CNY',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Colombian Peso',
                'iso' => 'COP',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Unidad de Valor Real',
                'iso' => 'COU',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Comorian Franc',
                'iso' => 'KMF',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Congolese Franc',
                'iso' => 'CDF',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'New Zealand Dollar',
                'iso' => 'NZD',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Costa Rican Colon',
                'iso' => 'CRC',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Kuna',
                'iso' => 'HRK',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Cuban Peso',
                'iso' => 'CUP',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Peso Convertible',
                'iso' => 'CUC',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Netherlands Antillean Guilder',
                'iso' => 'ANG',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Czech Koruna',
                'iso' => 'CZK',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Djibouti Franc',
                'iso' => 'DJF',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Dominican Peso',
                'iso' => 'DOP',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Egyptian Pound',
                'iso' => 'EGP',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'El Salvador Colon',
                'iso' => 'SVC',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Nakfa',
                'iso' => 'ERN',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Ethiopian Birr',
                'iso' => 'ETB',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Falkland Islands Pound',
                'iso' => 'FKP',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Fiji Dollar',
                'iso' => 'FJD',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Dalasi',
                'iso' => 'GMD',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Lari',
                'iso' => 'GEL',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Ghana Cedi',
                'iso' => 'GHS',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Gibraltar Pound',
                'iso' => 'GIP',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Danish Krone',
                'iso' => 'DKK',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Quetzal',
                'iso' => 'GTQ',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Guinean Franc',
                'iso' => 'GNF',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Guyana Dollar',
                'iso' => 'GYD',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Gourde',
                'iso' => 'HTG',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Lempira',
                'iso' => 'HNL',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Hong Kong Dollar',
                'iso' => 'HKD',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Forint',
                'iso' => 'HUF',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Iceland Krona',
                'iso' => 'ISK',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Indian Rupee',
                'iso' => 'INR',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Rupiah',
                'iso' => 'IDR',
            ),
            70 => 
            array (
                'id' => 71,
            'name' => 'SDR (Special Drawing Right)',
                'iso' => 'XDR',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Iranian Rial',
                'iso' => 'IRR',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Iraqi Dinar',
                'iso' => 'IQD',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'New Israeli Sheqel',
                'iso' => 'ILS',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Jamaican Dollar',
                'iso' => 'JMD',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Yen',
                'iso' => 'JPY',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Pound Sterling',
                'iso' => 'GBP',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Jordanian Dinar',
                'iso' => 'JOD',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Tenge',
                'iso' => 'KZT',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Kenyan Shilling',
                'iso' => 'KES',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Australian Dollar',
                'iso' => 'AUD',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'North Korean Won',
                'iso' => 'KPW',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Won',
                'iso' => 'KRW',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Kuwaiti Dinar',
                'iso' => 'KWD',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Som',
                'iso' => 'KGS',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Lao Kip',
                'iso' => 'LAK',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Lebanese Pound',
                'iso' => 'LBP',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Loti',
                'iso' => 'LSL',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Rand',
                'iso' => 'ZAR',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Liberian Dollar',
                'iso' => 'LRD',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Libyan Dinar',
                'iso' => 'LYD',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Pataca',
                'iso' => 'MOP',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Denar',
                'iso' => 'MKD',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Malagasy Ariary',
                'iso' => 'MGA',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Malawi Kwacha',
                'iso' => 'MWK',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Malaysian Ringgit',
                'iso' => 'MYR',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Rufiyaa',
                'iso' => 'MVR',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Ouguiya',
                'iso' => 'MRO',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Mauritius Rupee',
                'iso' => 'MUR',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'ADB Unit of Account',
                'iso' => 'XUA',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Mexican Peso',
                'iso' => 'MXN',
            ),
            101 => 
            array (
                'id' => 102,
            'name' => 'Mexican Unidad de Inversion (UDI)',
                'iso' => 'MXV',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Moldovan Leu',
                'iso' => 'MDL',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Tugrik',
                'iso' => 'MNT',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Mozambique Metical',
                'iso' => 'MZN',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Kyat',
                'iso' => 'MMK',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Namibia Dollar',
                'iso' => 'NAD',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Nepalese Rupee',
                'iso' => 'NPR',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'CFP Franc',
                'iso' => 'XPF',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Cordoba Oro',
                'iso' => 'NIO',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Naira',
                'iso' => 'NGN',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Rial Omani',
                'iso' => 'OMR',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Pakistan Rupee',
                'iso' => 'PKR',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Balboa',
                'iso' => 'PAB',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'Kina',
                'iso' => 'PGK',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Guarani',
                'iso' => 'PYG',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Sol',
                'iso' => 'PEN',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Philippine Peso',
                'iso' => 'PHP',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Zloty',
                'iso' => 'PLN',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Qatari Rial',
                'iso' => 'QAR',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Romanian Leu',
                'iso' => 'RON',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Russian Ruble',
                'iso' => 'RUB',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Rwanda Franc',
                'iso' => 'RWF',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'Saint Helena Pound',
                'iso' => 'SHP',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Tala',
                'iso' => 'WST',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Dobra',
                'iso' => 'STD',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Saudi Riyal',
                'iso' => 'SAR',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Serbian Dinar',
                'iso' => 'RSD',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Seychelles Rupee',
                'iso' => 'SCR',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Leone',
                'iso' => 'SLL',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Singapore Dollar',
                'iso' => 'SGD',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Sucre',
                'iso' => 'XSU',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Solomon Islands Dollar',
                'iso' => 'SBD',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Somali Shilling',
                'iso' => 'SOS',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'South Sudanese Pound',
                'iso' => 'SSP',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'Sri Lanka Rupee',
                'iso' => 'LKR',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'Sudanese Pound',
                'iso' => 'SDG',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'Surinam Dollar',
                'iso' => 'SRD',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'Norwegian Krone',
                'iso' => 'NOK',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'Lilangeni',
                'iso' => 'SZL',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'Swedish Krona',
                'iso' => 'SEK',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Swiss Franc',
                'iso' => 'CHF',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'WIR Euro',
                'iso' => 'CHE',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'WIR Franc',
                'iso' => 'CHW',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'Syrian Pound',
                'iso' => 'SYP',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'New Taiwan Dollar',
                'iso' => 'TWD',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Somoni',
                'iso' => 'TJS',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Tanzanian Shilling',
                'iso' => 'TZS',
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Baht',
                'iso' => 'THB',
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'Pa’anga',
                'iso' => 'TOP',
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'Trinidad and Tobago Dollar',
                'iso' => 'TTD',
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'Tunisian Dinar',
                'iso' => 'TND',
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'Turkish Lira',
                'iso' => 'TRY',
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'Turkmenistan New Manat',
                'iso' => 'TMT',
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'Uganda Shilling',
                'iso' => 'UGX',
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'Hryvnia',
                'iso' => 'UAH',
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'UAE Dirham',
                'iso' => 'AED',
            ),
            157 => 
            array (
                'id' => 158,
            'name' => 'US Dollar (Next day)',
                'iso' => 'USN',
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'Peso Uruguayo',
                'iso' => 'UYU',
            ),
            159 => 
            array (
                'id' => 160,
            'name' => 'Uruguay Peso en Unidades Indexadas (URUIURUI)',
                'iso' => 'UYI',
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'Uzbekistan Sum',
                'iso' => 'UZS',
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'Vatu',
                'iso' => 'VUV',
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'Bolívar',
                'iso' => 'VEF',
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'Dong',
                'iso' => 'VND',
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'Moroccan Dirham',
                'iso' => 'MAD',
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'Yemeni Rial',
                'iso' => 'YER',
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'Zambian Kwacha',
                'iso' => 'ZMW',
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'Zimbabwe Dollar',
                'iso' => 'ZWL',
            ),
            168 => 
            array (
                'id' => 169,
            'name' => 'Bond Markets Unit European Composite Unit (EURCO)',
                'iso' => 'XBA',
            ),
            169 => 
            array (
                'id' => 170,
            'name' => 'Bond Markets Unit European Monetary Unit (E.M.U.-6)',
                'iso' => 'XBB',
            ),
            170 => 
            array (
                'id' => 171,
            'name' => 'Bond Markets Unit European Unit of Account 9 (E.U.A.-9)',
                'iso' => 'XBC',
            ),
            171 => 
            array (
                'id' => 172,
            'name' => 'Bond Markets Unit European Unit of Account 17 (E.U.A.-17)',
                'iso' => 'XBD',
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'Codes specifically reserved for testing purposes',
                'iso' => 'XTS',
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'The codes assigned for transactions where no currency is involved',
                'iso' => 'XXX',
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'Gold',
                'iso' => 'XAU',
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'Palladium',
                'iso' => 'XPD',
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'Platinum',
                'iso' => 'XPT',
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'Silver',
                'iso' => 'XAG',
            ),
        ));
        
        
    }
}