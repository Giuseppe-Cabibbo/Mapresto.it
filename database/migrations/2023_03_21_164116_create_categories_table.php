<?php


use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        
        $categories = ['Motori', 'Informatica', 'Elettrodomestici', 'Libri', 'Videogame', 'Sport', 'Immobili', 'Telefoni'];

        foreach ($categories as $category_id){
            Category::create(['name'=> $category_id]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
