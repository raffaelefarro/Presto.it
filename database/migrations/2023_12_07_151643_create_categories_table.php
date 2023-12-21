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
            $table->string('icon_class');
            $table->timestamps();
        });

        $categories = [
            'ui.Abbigliamento', 'ui.Sport', 'ui.Giardinaggio', 'ui.Motori', 'ui.Videogames', 'ui.Elettrodomestici', 'ui.Telefonia', 'ui.Film', 'ui.Arredamento', 'ui.Musica',
        ];

        $categories_icons = [
            'fa-solid fa-shirt', 'fa-solid fa-dumbbell', 'fa-solid fa-tractor', 'fa-solid fa-car', 'fa-solid fa-gamepad', 'fa-solid fa-blender', 'fa-solid fa-phone', 'fa-solid fa-video', 'fa-solid fa-house', '<i fa-solid fa-record-vinyl',
        ];

        foreach ($categories as $key => $category){
            Category::create([
                'name' => $category,
                'icon_class' => $categories_icons[$key],
            ]);
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
