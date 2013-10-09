<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DataCreatorCommand extends Command {
    
    private $count = 0;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'data:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generates tab delimited spreadsheet data.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
        $this->count = $this->argument('count');
        $this->createProducts();
        $this->createUsers();
        
        $this->info("Created {$this->count} records.");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('count', InputArgument::REQUIRED, 'How many tuples do you want?')
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}
    
    private function createProducts() {
        $list = $this->makeProducts();
        $fp = fopen('data/' . FILE_PRODUCTS, 'w');
        foreach ($list as $row) {
            fputcsv($fp, $row, "\t");
        }
        fclose($fp);
    }
    
    private function createUsers() {
        $list = $this->makeUsers();
        $fp = fopen('data/' . FILE_USERS, 'w');
        foreach ($list as $row) {
            fputcsv($fp, $row, "\t");
        }
        fclose($fp);
    }
    
    private function makeUsers() {
        $faker = Faker\Factory::create();
        // Always assume user count equals product count
        /* Fields:
         * login email
         * unencrypted passwords [eek!]
         * name
         * business name
         * customised prices for each product
         * first line contains the general prices with blank or dummy customer fields
         */    
        $list = array();
        $list[] = $this->makeDummyUser();
        for ($i = 0; $i < $this->count; $i++) {
            $list[] = array(
                "{$faker->userName}{$i}@{$faker->safeEmailDomain}",
                'password',
                "{$faker->firstName} {$faker->lastName}",
                $faker->company,
                $this->makePrices($this->count)
            );
        }
        return $list;
    }
    
    private function makeDummyUser() {
        return array(
            'FOO',
            'FOO',
            'FOO',
            'FOO',
            $this->makePrices()
        );
    }
    
    private function makeProducts() {
        $faker = Faker\Factory::create();
        $list = array();
        /* Fields:
         * The product code
         * Links to a small and a large image
         * Copy for the products page (short) and the product page/facility (longer)
         */
        for ($i = 0; $i < $this->count; $i++) {
            $list[] = array(
                "p-{$i}",
                $faker->word,
                $faker->url,
            );
        }
        return $list;
    }
    
    private function makePrices() {
        $faker = Faker\Factory::create();
        $prices = array();
        for ($i = 0; $i < $this->count; $i++) {
            $prices[] = array('pcode' => "p-{$i}", 'price' => $faker->randomNumber(2));
        }
        return json_encode($prices); 
    }
}
