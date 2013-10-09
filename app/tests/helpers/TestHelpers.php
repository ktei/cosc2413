<?php

trait TestHelpers {

    public function createTestUser() {
        return new \User(array(
            'email' => 'ktei2008@gmail.com',
            'password' => 'password',
            'name' => 'Rui Cheng',
            'biz_name' => 'Ryarc',
            'prices' => json_decode($this->createSamplePrices())
        ));
    }


    private function createSamplePrices() {
        $faker = \Faker\Factory::create();
        $prices = array();
        for ($i = 0; $i < 10; $i++) {
            $prices[] = array('pcode' => "p-{$i}", 'price' => $faker->randomNumber(2));
        }
        return json_encode($prices);
    }
}