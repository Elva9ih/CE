<?php

namespace Dcs\Catalogue\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        DB::table('cat_types_categories')->truncate();
        if (DB::table('cat_types_categories')->count() == 0) {
            DB::table('cat_types_categories')->insert([
                'libelle_fr' => 'Equipements',
                'libelle_ar' => 'المعدات',
            ]);
            DB::table('cat_types_categories')->insert([
                'libelle_fr' => 'Services',
                'libelle_ar' => 'الخدمات',
            ]);
            DB::table('cat_types_categories')->insert([
                'libelle_fr' => 'Travaux',
                'libelle_ar' => 'الأعمال',
            ]);
        }

//        DB::table('cat_natures_categories_items')->truncate();
        if (DB::table('cat_natures_categories_items')->count() == 0) {
            DB::table('cat_natures_categories_items')->insert([
                'libelle_fr' => 'Booléen',
                'libelle_ar' => 'قيمة منطقية',
            ]);
            DB::table('cat_natures_categories_items')->insert([
                'libelle_fr' => 'Numérique',
                'libelle_ar' => 'رقمي',
            ]);
            DB::table('cat_natures_categories_items')->insert([
                'libelle_fr' => 'Texte',
                'libelle_ar' => 'نص',
            ]);
            DB::table('cat_natures_categories_items')->insert([
                'libelle_fr' => 'Date',
                'libelle_ar' => 'تاريخ',
            ]);
            DB::table('cat_natures_categories_items')->insert([
                'libelle_fr' => 'Select simple',
                'libelle_ar' => 'اختيار مبسط',
            ]);
            DB::table('cat_natures_categories_items')->insert([
                'libelle_fr' => 'Table',
                'libelle_ar' => 'جدول',
            ]);
        }
    }
}
