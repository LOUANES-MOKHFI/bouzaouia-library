<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wilayas = array(
            array('id' => '1','code_postal' => '1','name' => 'أدرار', 'price' => '500'),
            array('id' => '2','code_postal' => '2','name' => 'الشلف', 'price' => '500'),
            array('id' => '3','code_postal' => '3','name' => 'الأغواط', 'price' => '500'),
            array('id' => '4','code_postal' => '4','name' => 'أم البواقي', 'price' => '500'),
            array('id' => '5','code_postal' => '5','name' => 'باتنة', 'price' => '500'),
            array('id' => '6','code_postal' => '6','name' => 'بجاية', 'price' => '500'),
            array('id' => '7','code_postal' => '7','name' => 'بسكرة', 'price' => '500'),
            array('id' => '8','code_postal' => '8','name' => 'بشار', 'price' => '500'),
            array('id' => '9','code_postal' => '9','name' => 'البليدة', 'price' => '500'),
            array('id' => '10','code_postal' => '10','name' => 'البويرة', 'price' => '500'),
            array('id' => '11','code_postal' => '11','name' => 'تمنراست', 'price' => '500'),
            array('id' => '12','code_postal' => '12','name' => 'تبسة', 'price' => '500'),
            array('id' => '13','code_postal' => '13','name' => 'تلمسان', 'price' => '500'),
            array('id' => '14','code_postal' => '14','name' => 'تيارت', 'price' => '500'),
            array('id' => '15','code_postal' => '15','name' => 'تيزي وزو', 'price' => '500'),
            array('id' => '16','code_postal' => '16','name' => 'الجزائر', 'price' => '500'),
            array('id' => '17','code_postal' => '17','name' => 'الجلفة', 'price' => '500'),
            array('id' => '18','code_postal' => '18','name' => 'جيجل', 'price' => '500'),
            array('id' => '19','code_postal' => '19','name' => 'سطيف', 'price' => '500'),
            array('id' => '20','code_postal' => '20','name' => 'سعيدة', 'price' => '500'),
            array('id' => '21','code_postal' => '21','name' => 'سكيكدة', 'price' => '500'),
            array('id' => '22','code_postal' => '22','name' => 'سيدي بلعباس', 'price' => '500'),
            array('id' => '23','code_postal' => '23','name' => 'عنابة', 'price' => '500'),
            array('id' => '24','code_postal' => '24','name' => 'قالمة', 'price' => '500'),
            array('id' => '25','code_postal' => '25','name' => 'قسنطينة', 'price' => '500'),
            array('id' => '26','code_postal' => '26','name' => 'المدية', 'price' => '500'),
            array('id' => '27','code_postal' => '27','name' => 'مستغانم', 'price' => '500'),
            array('id' => '28','code_postal' => '28','name' => 'المسيلة', 'price' => '500'),
            array('id' => '29','code_postal' => '29','name' => 'معسكر', 'price' => '500'),
            array('id' => '30','code_postal' => '30','name' => 'ورقلة', 'price' => '500'),
            array('id' => '31','code_postal' => '31','name' => 'وهران', 'price' => '500'),
            array('id' => '32','code_postal' => '32','name' => 'البيض', 'price' => '500'),
            array('id' => '33','code_postal' => '33','name' => 'إليزي', 'price' => '500'),
            array('id' => '34','code_postal' => '34','name' => 'برج بوعريريج', 'price' => '500'),
            array('id' => '35','code_postal' => '35','name' => 'بومرداس', 'price' => '500'),
            array('id' => '36','code_postal' => '36','name' => 'الطارف', 'price' => '500'),
            array('id' => '37','code_postal' => '37','name' => 'تندوف', 'price' => '500'),
            array('id' => '38','code_postal' => '38','name' => 'تيسمسيلت', 'price' => '500'),
            array('id' => '39','code_postal' => '39','name' => 'الوادي', 'price' => '500'),
            array('id' => '40','code_postal' => '40','name' => 'خنشلة', 'price' => '500'),
            array('id' => '41','code_postal' => '41','name' => 'سوق أهراس', 'price' => '500'),
            array('id' => '42','code_postal' => '42','name' => 'تيبازة', 'price' => '500'),
            array('id' => '43','code_postal' => '43','name' => 'ميلة', 'price' => '500'),
            array('id' => '44','code_postal' => '44','name' => 'عين الدفلى', 'price' => '500'),
            array('id' => '45','code_postal' => '45','name' => 'النعامة', 'price' => '500'),
            array('id' => '46','code_postal' => '46','name' => 'عين تموشنت', 'price' => '500'),
            array('id' => '47','code_postal' => '47','name' => 'غرداية', 'price' => '500'),
            array('id' => '48','code_postal' => '48','name' => 'غليزان', 'price' => '500'),
            array('id' => '49','code_postal' => '49','name' => 'المغير', 'price' => '500'),
            array('id' => '50','code_postal' => '50','name' => 'المنيعة', 'price' => '500'),
            array('id' => '51','code_postal' => '51','name' => 'أولاد جلال', 'price' => '500'),
            array('id' => '52','code_postal' => '52','name' => 'برج باجي مختار', 'price' => '500'),
            array('id' => '53','code_postal' => '53','name' => 'بني عباس', 'price' => '500'),
            array('id' => '54','code_postal' => '54','name' => 'تيميمون', 'price' => '500'),
            array('id' => '55','code_postal' => '55','name' => 'تقرت', 'price' => '500'),
            array('id' => '56','code_postal' => '56','name' => 'جانت', 'price' => '500'),
            array('id' => '57','code_postal' => '57','name' => 'عين صالح','price' => '500'),
            array('id' => '58','code_postal' => '58','name' => 'عين قزام', 'price' => '500'),
          );
          DB::table('states')->insert($wilayas);
    }
}


