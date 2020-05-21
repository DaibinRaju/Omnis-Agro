<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Solution;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('solution');
            $table->timestamps();
        });
        
        Solution::create([
            "name" => "Bacterial Spot",
            "solution" => "Apply sulfur sprays or copper-based fungicides weekly at first sign of
            disease to prevent its spread. These organic fungicides will not kill leaf spot,
            but prevent the spores from germinating.
            Safely treat most fungal and bacterial diseases with SERENADE Garden."
        ]);

        Solution::create([
            "name" => "Early Blight",
            "solution" =>"Remove all affected leaves and burn them or place them in the garbage.
            Mulch around the base of the plant with straw, wood chips or other natural
            mulch to prevent fungal spores in the soil from splashing on the plant.
            If blight has already spread to more than just a few plant leaves,
            apply Daconil® Fungicide Ready-To-Use, which kills fungal spores and keeps
            blight from causing further damage."
        ]);
        Solution::create([
            "name" => "Healthy",
            "solution" =>"Your plant is healthy."
        ]);
            Solution::create([
            "name" => "Late blight",
            "solution" =>"Plant resistant cultivars when available.
            Remove volunteers from the garden prior to planting and space plants far
            enough apart to allow for plenty of air circulation.
            Water in the early morning hours, or use soaker hoses, to give plants time to
            dry out during the day — avoid overhead irrigation.
            Destroy all tomato and potato debris after harvest (see Fall Garden Cleanup).

            If symptoms are observed, treat plants with one of the following fungicides:
            Apply a copper based fungicide (2 oz/ gallon of water) every 7 days or less,
            following heavy rain or when the amount of disease is increasing rapidly. If
            possible, time applications so that at least 12 hours of dry weather follows
            application.

            Used as a foliar spray, Organocide® Plant Doctor will work its way through the
            entire plant to prevent fungal problems from occurring and attack existing many
            problems. Mix 2 tsp/ gallon of water and spray at transplant or when direct
            seeded crops are at 2-4 true leaf, then at 1-2 week intervals as required to
            control disease.
            
            Safely treat fungal problems with SERENADE Garden. This broad spectrum bio-
            fungicide uses a patented strain of Bacillus subtilis and is approved for organic
            use. Best of all, SERENADE is completely non-toxic to honey bees and
            beneficial insects.
            
            Monterey® All Natural Disease Control is a ready-to-use blend of naturally
            occurring ingredients that control most plant foliar diseases. All stages of the
            disease is controlled, but applying before infestation gives the best results."
        ]);
            Solution::create([
            "name" => "Leaf Mold",
            "solution" =>"Remove and destroy all affected plant parts.
            For plants growing under cover, increase ventilation and, if possible, the
            space between plants.
            Try to avoid wetting the leaves when watering plants, especially when
            watering in the evening.
            Copper-based fungicides(Copper Oxychloride 50 WP fungicide) can be used
            to control diseases on tomatoes."
        ]);
            Solution::create([
            "name" => "Septoria leaf spot",
            "solution" =>"There are a few options for treating Septoria leaf spot when it appears; these
            include:
            Removing infected leaves. Remove infected leaves immediately, and be sure
            to wash your hands thoroughly before working with uninfected plants.
            
            Consider organic fungicide options. ...
            1. Ridomil gold Fungicide Syngenta
            2. Blitox
            3. Kavach Fungicide Syngenta
            
            Consider chemical fungicides....
            1. Aliette
            2. NATIVO"
        ]);
            Solution::create([
            "name" => "Spider mites",
            "solution" =>"Apply a pesticide specific to mites called a miticide. Ideally, you should start
            treating for two-spotted mites before your plants are seriously damaged. Apply the
            miticide for control of two-spotted mites every 7 days or so.
            1. Bio Miticide
            2. Oberon
            3. Trikaal Trizophos 40% EC"
        ]);
            Solution::create([
            "name" => "Tomato target spot",
            "solution" =>"A timely fungicide application prior to infection is the best way to control the
            disease.
            DuPontTM Fontelis® fungicide provides excellent control of target spot in
            tomatoes and other fruiting vegetables, as well as other fungal diseases
            including Alternaria blights and leaf spot, early blight and Septoria leaf spot."
        ]);
            Solution::create([
            "name" => "Mosaic virus",
            "solution" =>"Once plants are infected, there are no controls. Remove all the infected plants
            and destroy them. Also, be sure to disinfect your gardening tools.
            Plant resistant plants when available in your garden. ...
            Mosaic viruses are mostly spread by insects, especially aphids and leafhoppers. ...
            Control your weeds. ...
            To avoid tobacco mosaic virus, soak seeds in a 10 percent bleach solution before
            planting and avoid handling tobacco near plants."
        ]);
            Solution::create([
            "name" => "Yello curl leaf virus",
            "solution" =>"Treatments that are commonly used for this disease include insecticides, hybrid
            seeds, and growing tomatoes under greenhouse conditions.
            Neonicotinoid insecticide, such as dinotefuran (Venom), imidacloprid
            (AdmirePro, Alias, Nuprid, Widow, and others) or thiamethoxam (Platinum), as
            a soil application or through the drip irrigation system at transplanting of tomatoes"
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solutions');
    }
}
