<?php

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->string('slug')->after('name');
        });


        $categories = Category::all();
        $subcategories = Subcategory::all();

        foreach ($categories as $category)
        {
            $category->slug = Str::slug($category->name, '-');
            $category->save();
        }

        foreach ($subcategories as $subcategory)
        {
            $subcategory->slug = Str::slug($subcategory->name, '-');
            $subcategory->save();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
