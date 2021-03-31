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

        \DB::table('currencies')->insert(array(
            0 =>
                array(
                    'name' => 'Afghani',
                    'iso' => 'AFN',
                ),
            1 =>
                array(
                    'name' => 'Euro',
                    'iso' => 'EUR',
                ),
            2 =>
                array(
                    'name' => 'Lek',
                    'iso' => 'ALL',
                ),
            3 =>
                array(
                    'name' => 'Algerian Dinar',
                    'iso' => 'DZD',
                ),
            4 =>
                array(
                    'name' => 'US Dollar',
                    'iso' => 'USD',
                ),
            5 =>
                array(
                    'name' => 'Kwanza',
                    'iso' => 'AOA',
                ),
            6 =>
                array(
                    'name' => 'East Caribbean Dollar',
                    'iso' => 'XCD',
                ),
            7 =>
                array(
                    'name' => 'Argentine Peso',
                    'iso' => 'ARS',
                ),
            8 =>
                array(
                    'name' => 'Armenian Dram',
                    'iso' => 'AMD',
                ),
            9 =>
                array(
                    'name' => 'Aruban Florin',
                    'iso' => 'AWG',
                ),
            10 =>
                array(
                    'name' => 'Azerbaijan Manat',
                    'iso' => 'AZN',
                ),
            11 =>
                array(
                    'name' => 'Bahamian Dollar',
                    'iso' => 'BSD',
                ),
            12 =>
                array(
                    'name' => 'Bahraini Dinar',
                    'iso' => 'BHD',
                ),
            13 =>
                array(
                    'name' => 'Taka',
                    'iso' => 'BDT',
                ),
            14 =>
                array(
                    'name' => 'Barbados Dollar',
                    'iso' => 'BBD',
                ),
            15 =>
                array(
                    'name' => 'Belarusian Ruble',
                    'iso' => 'BYN',
                ),
            16 =>
                array(
                    'name' => 'Belize Dollar',
                    'iso' => 'BZD',
                ),
            17 =>
                array(
                    'name' => 'CFA Franc BCEAO',
                    'iso' => 'XOF',
                ),
            18 =>
                array(
                    'name' => 'Bermudian Dollar',
                    'iso' => 'BMD',
                ),
            19 =>
                array(
                    'name' => 'Ngultrum',
                    'iso' => 'BTN',
                ),
            20 =>
                array(
                    'name' => 'Boliviano',
                    'iso' => 'BOB',
                ),
            21 =>
                array(
                    'name' => 'Mvdol',
                    'iso' => 'BOV',
                ),
            22 =>
                array(
                    'name' => 'Convertible Mark',
                    'iso' => 'BAM',
                ),
            23 =>
                array(
                    'name' => 'Pula',
                    'iso' => 'BWP',
                ),
            24 =>
                array(
                    'name' => 'Brazilian Real',
                    'iso' => 'BRL',
                ),
            25 =>
                array(
                    'name' => 'Brunei Dollar',
                    'iso' => 'BND',
                ),
            26 =>
                array(
                    'name' => 'Bulgarian Lev',
                    'iso' => 'BGN',
                ),
            27 =>
                array(
                    'name' => 'Burundi Franc',
                    'iso' => 'BIF',
                ),
            28 =>
                array(
                    'name' => 'Cabo Verde Escudo',
                    'iso' => 'CVE',
                ),
            29 =>
                array(
                    'name' => 'Riel',
                    'iso' => 'KHR',
                ),
            30 =>
                array(
                    'name' => 'CFA Franc BEAC',
                    'iso' => 'XAF',
                ),
            31 =>
                array(
                    'name' => 'Canadian Dollar',
                    'iso' => 'CAD',
                ),
            32 =>
                array(
                    'name' => 'Cayman Islands Dollar',
                    'iso' => 'KYD',
                ),
            33 =>
                array(
                    'name' => 'Chilean Peso',
                    'iso' => 'CLP',
                ),
            34 =>
                array(
                    'name' => 'Unidad de Fomento',
                    'iso' => 'CLF',
                ),
            35 =>
                array(
                    'name' => 'Yuan Renminbi',
                    'iso' => 'CNY',
                ),
            36 =>
                array(
                    'name' => 'Colombian Peso',
                    'iso' => 'COP',
                ),
            37 =>
                array(
                    'name' => 'Unidad de Valor Real',
                    'iso' => 'COU',
                ),
            38 =>
                array(
                    'name' => 'Comorian Franc',
                    'iso' => 'KMF',
                ),
            39 =>
                array(
                    'name' => 'Congolese Franc',
                    'iso' => 'CDF',
                ),
            40 =>
                array(
                    'name' => 'New Zealand Dollar',
                    'iso' => 'NZD',
                ),
            41 =>
                array(
                    'name' => 'Costa Rican Colon',
                    'iso' => 'CRC',
                ),
            42 =>
                array(
                    'name' => 'Kuna',
                    'iso' => 'HRK',
                ),
            43 =>
                array(
                    'name' => 'Cuban Peso',
                    'iso' => 'CUP',
                ),
            44 =>
                array(
                    'name' => 'Peso Convertible',
                    'iso' => 'CUC',
                ),
            45 =>
                array(
                    'name' => 'Netherlands Antillean Guilder',
                    'iso' => 'ANG',
                ),
            46 =>
                array(
                    'name' => 'Czech Koruna',
                    'iso' => 'CZK',
                ),
            47 =>
                array(
                    'name' => 'Djibouti Franc',
                    'iso' => 'DJF',
                ),
            48 =>
                array(
                    'name' => 'Dominican Peso',
                    'iso' => 'DOP',
                ),
            49 =>
                array(
                    'name' => 'Egyptian Pound',
                    'iso' => 'EGP',
                ),
            50 =>
                array(
                    'name' => 'El Salvador Colon',
                    'iso' => 'SVC',
                ),
            51 =>
                array(
                    'name' => 'Nakfa',
                    'iso' => 'ERN',
                ),
            52 =>
                array(
                    'name' => 'Ethiopian Birr',
                    'iso' => 'ETB',
                ),
            53 =>
                array(
                    'name' => 'Falkland Islands Pound',
                    'iso' => 'FKP',
                ),
            54 =>
                array(
                    'name' => 'Fiji Dollar',
                    'iso' => 'FJD',
                ),
            55 =>
                array(
                    'name' => 'Dalasi',
                    'iso' => 'GMD',
                ),
            56 =>
                array(
                    'name' => 'Lari',
                    'iso' => 'GEL',
                ),
            57 =>
                array(
                    'name' => 'Ghana Cedi',
                    'iso' => 'GHS',
                ),
            58 =>
                array(
                    'name' => 'Gibraltar Pound',
                    'iso' => 'GIP',
                ),
            59 =>
                array(
                    'name' => 'Danish Krone',
                    'iso' => 'DKK',
                ),
            60 =>
                array(
                    'name' => 'Quetzal',
                    'iso' => 'GTQ',
                ),
            61 =>
                array(
                    'name' => 'Guinean Franc',
                    'iso' => 'GNF',
                ),
            62 =>
                array(
                    'name' => 'Guyana Dollar',
                    'iso' => 'GYD',
                ),
            63 =>
                array(
                    'name' => 'Gourde',
                    'iso' => 'HTG',
                ),
            64 =>
                array(
                    'name' => 'Lempira',
                    'iso' => 'HNL',
                ),
            65 =>
                array(
                    'name' => 'Hong Kong Dollar',
                    'iso' => 'HKD',
                ),
            66 =>
                array(
                    'name' => 'Forint',
                    'iso' => 'HUF',
                ),
            67 =>
                array(
                    'name' => 'Iceland Krona',
                    'iso' => 'ISK',
                ),
            68 =>
                array(
                    'name' => 'Indian Rupee',
                    'iso' => 'INR',
                ),
            69 =>
                array(
                    'name' => 'Rupiah',
                    'iso' => 'IDR',
                ),
            70 =>
                array(
                    'name' => 'SDR (Special Drawing Right)',
                    'iso' => 'XDR',
                ),
            71 =>
                array(
                    'name' => 'Iranian Rial',
                    'iso' => 'IRR',
                ),
            72 =>
                array(
                    'name' => 'Iraqi Dinar',
                    'iso' => 'IQD',
                ),
            73 =>
                array(
                    'name' => 'New Israeli Sheqel',
                    'iso' => 'ILS',
                ),
            74 =>
                array(
                    'name' => 'Jamaican Dollar',
                    'iso' => 'JMD',
                ),
            75 =>
                array(
                    'name' => 'Yen',
                    'iso' => 'JPY',
                ),
            76 =>
                array(
                    'name' => 'Pound Sterling',
                    'iso' => 'GBP',
                ),
            77 =>
                array(
                    'name' => 'Jordanian Dinar',
                    'iso' => 'JOD',
                ),
            78 =>
                array(
                    'name' => 'Tenge',
                    'iso' => 'KZT',
                ),
            79 =>
                array(
                    'name' => 'Kenyan Shilling',
                    'iso' => 'KES',
                ),
            80 =>
                array(
                    'name' => 'Australian Dollar',
                    'iso' => 'AUD',
                ),
            81 =>
                array(
                    'name' => 'North Korean Won',
                    'iso' => 'KPW',
                ),
            82 =>
                array(
                    'name' => 'Won',
                    'iso' => 'KRW',
                ),
            83 =>
                array(
                    'name' => 'Kuwaiti Dinar',
                    'iso' => 'KWD',
                ),
            84 =>
                array(
                    'name' => 'Som',
                    'iso' => 'KGS',
                ),
            85 =>
                array(
                    'name' => 'Lao Kip',
                    'iso' => 'LAK',
                ),
            86 =>
                array(
                    'name' => 'Lebanese Pound',
                    'iso' => 'LBP',
                ),
            87 =>
                array(
                    'name' => 'Loti',
                    'iso' => 'LSL',
                ),
            88 =>
                array(
                    'name' => 'Rand',
                    'iso' => 'ZAR',
                ),
            89 =>
                array(
                    'name' => 'Liberian Dollar',
                    'iso' => 'LRD',
                ),
            90 =>
                array(
                    'name' => 'Libyan Dinar',
                    'iso' => 'LYD',
                ),
            91 =>
                array(
                    'name' => 'Pataca',
                    'iso' => 'MOP',
                ),
            92 =>
                array(
                    'name' => 'Denar',
                    'iso' => 'MKD',
                ),
            93 =>
                array(
                    'name' => 'Malagasy Ariary',
                    'iso' => 'MGA',
                ),
            94 =>
                array(
                    'name' => 'Malawi Kwacha',
                    'iso' => 'MWK',
                ),
            95 =>
                array(
                    'name' => 'Malaysian Ringgit',
                    'iso' => 'MYR',
                ),
            96 =>
                array(
                    'name' => 'Rufiyaa',
                    'iso' => 'MVR',
                ),
            97 =>
                array(
                    'name' => 'Ouguiya',
                    'iso' => 'MRO',
                ),
            98 =>
                array(
                    'name' => 'Mauritius Rupee',
                    'iso' => 'MUR',
                ),
            99 =>
                array(

                    'name' => 'ADB Unit of Account',
                    'iso' => 'XUA',
                ),
            100 =>
                array(

                    'name' => 'Mexican Peso',
                    'iso' => 'MXN',
                ),
            101 =>
                array(

                    'name' => 'Mexican Unidad de Inversion (UDI)',
                    'iso' => 'MXV',
                ),
            102 =>
                array(

                    'name' => 'Moldovan Leu',
                    'iso' => 'MDL',
                ),
            103 =>
                array(

                    'name' => 'Tugrik',
                    'iso' => 'MNT',
                ),
            104 =>
                array(

                    'name' => 'Mozambique Metical',
                    'iso' => 'MZN',
                ),
            105 =>
                array(

                    'name' => 'Kyat',
                    'iso' => 'MMK',
                ),
            106 =>
                array(

                    'name' => 'Namibia Dollar',
                    'iso' => 'NAD',
                ),
            107 =>
                array(

                    'name' => 'Nepalese Rupee',
                    'iso' => 'NPR',
                ),
            108 =>
                array(

                    'name' => 'CFP Franc',
                    'iso' => 'XPF',
                ),
            109 =>
                array(

                    'name' => 'Cordoba Oro',
                    'iso' => 'NIO',
                ),
            110 =>
                array(

                    'name' => 'Naira',
                    'iso' => 'NGN',
                ),
            111 =>
                array(

                    'name' => 'Rial Omani',
                    'iso' => 'OMR',
                ),
            112 =>
                array(

                    'name' => 'Pakistan Rupee',
                    'iso' => 'PKR',
                ),
            113 =>
                array(

                    'name' => 'Balboa',
                    'iso' => 'PAB',
                ),
            114 =>
                array(

                    'name' => 'Kina',
                    'iso' => 'PGK',
                ),
            115 =>
                array(

                    'name' => 'Guarani',
                    'iso' => 'PYG',
                ),
            116 =>
                array(

                    'name' => 'Sol',
                    'iso' => 'PEN',
                ),
            117 =>
                array(

                    'name' => 'Philippine Peso',
                    'iso' => 'PHP',
                ),
            118 =>
                array(

                    'name' => 'Zloty',
                    'iso' => 'PLN',
                ),
            119 =>
                array(

                    'name' => 'Qatari Rial',
                    'iso' => 'QAR',
                ),
            120 =>
                array(

                    'name' => 'Romanian Leu',
                    'iso' => 'RON',
                ),
            121 =>
                array(

                    'name' => 'Russian Ruble',
                    'iso' => 'RUB',
                ),
            122 =>
                array(

                    'name' => 'Rwanda Franc',
                    'iso' => 'RWF',
                ),
            123 =>
                array(

                    'name' => 'Saint Helena Pound',
                    'iso' => 'SHP',
                ),
            124 =>
                array(

                    'name' => 'Tala',
                    'iso' => 'WST',
                ),
            125 =>
                array(

                    'name' => 'Dobra',
                    'iso' => 'STD',
                ),
            126 =>
                array(

                    'name' => 'Saudi Riyal',
                    'iso' => 'SAR',
                ),
            127 =>
                array(

                    'name' => 'Serbian Dinar',
                    'iso' => 'RSD',
                ),
            128 =>
                array(

                    'name' => 'Seychelles Rupee',
                    'iso' => 'SCR',
                ),
            129 =>
                array(

                    'name' => 'Leone',
                    'iso' => 'SLL',
                ),
            130 =>
                array(

                    'name' => 'Singapore Dollar',
                    'iso' => 'SGD',
                ),
            131 =>
                array(

                    'name' => 'Sucre',
                    'iso' => 'XSU',
                ),
            132 =>
                array(

                    'name' => 'Solomon Islands Dollar',
                    'iso' => 'SBD',
                ),
            133 =>
                array(

                    'name' => 'Somali Shilling',
                    'iso' => 'SOS',
                ),
            134 =>
                array(

                    'name' => 'South Sudanese Pound',
                    'iso' => 'SSP',
                ),
            135 =>
                array(

                    'name' => 'Sri Lanka Rupee',
                    'iso' => 'LKR',
                ),
            136 =>
                array(

                    'name' => 'Sudanese Pound',
                    'iso' => 'SDG',
                ),
            137 =>
                array(

                    'name' => 'Surinam Dollar',
                    'iso' => 'SRD',
                ),
            138 =>
                array(

                    'name' => 'Norwegian Krone',
                    'iso' => 'NOK',
                ),
            139 =>
                array(

                    'name' => 'Lilangeni',
                    'iso' => 'SZL',
                ),
            140 =>
                array(

                    'name' => 'Swedish Krona',
                    'iso' => 'SEK',
                ),
            141 =>
                array(

                    'name' => 'Swiss Franc',
                    'iso' => 'CHF',
                ),
            142 =>
                array(

                    'name' => 'WIR Euro',
                    'iso' => 'CHE',
                ),
            143 =>
                array(

                    'name' => 'WIR Franc',
                    'iso' => 'CHW',
                ),
            144 =>
                array(

                    'name' => 'Syrian Pound',
                    'iso' => 'SYP',
                ),
            145 =>
                array(

                    'name' => 'New Taiwan Dollar',
                    'iso' => 'TWD',
                ),
            146 =>
                array(

                    'name' => 'Somoni',
                    'iso' => 'TJS',
                ),
            147 =>
                array(

                    'name' => 'Tanzanian Shilling',
                    'iso' => 'TZS',
                ),
            148 =>
                array(

                    'name' => 'Baht',
                    'iso' => 'THB',
                ),
            149 =>
                array(

                    'name' => 'Pa’anga',
                    'iso' => 'TOP',
                ),
            150 =>
                array(

                    'name' => 'Trinidad and Tobago Dollar',
                    'iso' => 'TTD',
                ),
            151 =>
                array(

                    'name' => 'Tunisian Dinar',
                    'iso' => 'TND',
                ),
            152 =>
                array(

                    'name' => 'Turkish Lira',
                    'iso' => 'TRY',
                ),
            153 =>
                array(

                    'name' => 'Turkmenistan New Manat',
                    'iso' => 'TMT',
                ),
            154 =>
                array(

                    'name' => 'Uganda Shilling',
                    'iso' => 'UGX',
                ),
            155 =>
                array(

                    'name' => 'Hryvnia',
                    'iso' => 'UAH',
                ),
            156 =>
                array(

                    'name' => 'UAE Dirham',
                    'iso' => 'AED',
                ),
            157 =>
                array(

                    'name' => 'US Dollar (Next day)',
                    'iso' => 'USN',
                ),
            158 =>
                array(

                    'name' => 'Peso Uruguayo',
                    'iso' => 'UYU',
                ),
            159 =>
                array(

                    'name' => 'Uruguay Peso en Unidades Indexadas (URUIURUI)',
                    'iso' => 'UYI',
                ),
            160 =>
                array(

                    'name' => 'Uzbekistan Sum',
                    'iso' => 'UZS',
                ),
            161 =>
                array(

                    'name' => 'Vatu',
                    'iso' => 'VUV',
                ),
            162 =>
                array(

                    'name' => 'Bolívar',
                    'iso' => 'VEF',
                ),
            163 =>
                array(

                    'name' => 'Dong',
                    'iso' => 'VND',
                ),
            164 =>
                array(

                    'name' => 'Moroccan Dirham',
                    'iso' => 'MAD',
                ),
            165 =>
                array(

                    'name' => 'Yemeni Rial',
                    'iso' => 'YER',
                ),
            166 =>
                array(

                    'name' => 'Zambian Kwacha',
                    'iso' => 'ZMW',
                ),
            167 =>
                array(

                    'name' => 'Zimbabwe Dollar',
                    'iso' => 'ZWL',
                ),
            168 =>
                array(

                    'name' => 'Bond Markets Unit European Composite Unit (EURCO)',
                    'iso' => 'XBA',
                ),
            169 =>
                array(

                    'name' => 'Bond Markets Unit European Monetary Unit (E.M.U.-6)',
                    'iso' => 'XBB',
                ),
            170 =>
                array(

                    'name' => 'Bond Markets Unit European Unit of Account 9 (E.U.A.-9)',
                    'iso' => 'XBC',
                ),
            171 =>
                array(

                    'name' => 'Bond Markets Unit European Unit of Account 17 (E.U.A.-17)',
                    'iso' => 'XBD',
                ),
            172 =>
                array(

                    'name' => 'Codes specifically reserved for testing purposes',
                    'iso' => 'XTS',
                ),
            173 =>
                array(

                    'name' => 'The codes assigned for transactions where no currency is involved',
                    'iso' => 'XXX',
                ),
            174 =>
                array(

                    'name' => 'Gold',
                    'iso' => 'XAU',
                ),
            175 =>
                array(

                    'name' => 'Palladium',
                    'iso' => 'XPD',
                ),
            176 =>
                array(

                    'name' => 'Platinum',
                    'iso' => 'XPT',
                ),
            177 =>
                array(

                    'name' => 'Silver',
                    'iso' => 'XAG',
                ),
        ));


    }
}
