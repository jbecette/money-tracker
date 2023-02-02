<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //Importación método Facade
use Carbon\Carbon;

class TransactionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_types')->insert(
            [
                [
                    'description' => 'Salary',
                    'bookkeeping' => 'income',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Passive income',
                    'bookkeeping' => 'income',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Investments',
                    'bookkeeping' => 'income',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Others',
                    'bookkeeping' => 'income',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Rent',
                    'bookkeeping' => 'expense',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Mortgage',
                    'bookkeeping' => 'expense',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Food',
                    'bookkeeping' => 'expense',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Clothing',
                    'bookkeeping' => 'expense',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Entertainment',
                    'bookkeeping' => 'expense',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Internet',
                    'bookkeeping' => 'expense',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Cell Phone',
                    'bookkeeping' => 'expense',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Health',
                    'bookkeeping' => 'expense',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'description' => 'Others',
                    'bookkeeping' => 'expense',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
