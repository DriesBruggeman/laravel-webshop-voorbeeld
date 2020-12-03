<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Gamer Legend RTX',
            'refNumber' => 'S9IVZB06',
            'brand' => 'Alternate',
            'description' => 'Met de Alternate Gamer Legend RTX 2080 SUPER beleef je de ultieme gaming-ervaring. Zet de instellingen van je games gerust op het hoogste niveau, want deze krachtpatser kent geen zwaktes. Deze pc past het best bij de hardcore gamer die de competitie volledig wil wegblazen en niet terugdeinst van een goeie portie overkill. Je kan zelfs vlot gamen op hogere resoluties, in virtual reality of met real-time ray-tracing. Als je zin hebt om nóg een stap verder te gaan, kan je ook aan de slag om de unlocked processor te overclocken. Streamers, YouTubers en andere content creators hoeven ook niets te vrezen, want dit systeem is nergens bang voor!

De Alternate Gamer Legend RTX 2080 SUPER bestaat uitsluitend uit kwalitatieve componenten van topmerken. Hij wordt zorgvuldig geassembleerd door een team gamende professionals met jaren ervaring in het bouwen van pc\'s. De Intel® Core™ i9-9900K is een extreem krachtige unlocked processor met 8 kernen, die kan worden overclocked en wordt gekoeld door een NZXT Kraken X52. De onwaarschijnlijke rekenkracht van de processor en de NVIDIA GeForce RTX 2080 Super grafische kaart met 8 GB geheugen zorgen ervoor dat je met de Alternate Gamer Legend RTX 2080 SUPER vlot de laatste games kan spelen. Dankzij het 32 GB DDR4-werkgeheugen wordt ook multitasken kinderspel. Verder start het Windows 10 besturingssysteem snel op dankzij de 500 GB SSD en heb je voldoende ruimte om je multimedia- en installatiebestanden op te slaan op de 4 TB harde schijf. Alle onderdelen zijn ingebouwd in de stijlvolle NZXT H510i behuizing met een zijpaneel van getint getemperd glas.',
            'stock' => 10,
            'price' => 2699.00,
            'mainImage' => 'images/desktop1.jpg',
            'deliverableFrom' => '2020-05-14',
            'category_id' => 2,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'HP Laptop 15s-eq0013nb, 15.6" laptop',
            'brand' => 'HP',
            'refNumber' => 'PL6HZB88',
            'description' => 'De HP 15s-eq0013nb combineert een lange batterijduur met een dun ontwerp met smalle randen, zodat je overal productief blijft en optimaal van entertainment kunt genieten. Je foto\'s, video\'s en projecten komen beter tot hun recht op een scherm met randen van slechts 6,5 mm. Kom je drukste dagen goed door met de prestaties van een betrouwbare processor en een overvloed aan opslagruimte. Dankzij de lange batterijduur en de HP Fast Charge-technologie kun je de hele dag werken, series kijken en online zijn.',
            'stock' => 10,
            'price' => 529.00,
            'mainImage' => 'images/laptop1.jpg',
            'discount' => 5.00,
            'deliverableFrom' => '2020-05-21',
            'category_id' => 1,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'OnePlus OnePlus 8 5G EU',
            'refNumber' => 'OCBVOO',
            'brand' => 'OnePlus',
            'description' => 'Top telefoon',
            'stock' => 30,
            'price' => 699.00,
            'mainImage' => 'images/op8.jpg',
            'discount' => 0,
            'deliverableFrom' => '2020-05-14',
            'category_id' => 3,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'JBL CLUB 950NC headset',
            'refNumber' => 'EZKJFT',
            'brand' => 'JBL',
            'description' => 'Waan je op de eerste rij bij een concert. De elegante, zwarte JBL CLUB 950NC-hoofdtelefoon, geïnspireerd door professionals uit de muziekindustrie, maakt het eenvoudig om de wereld achter je te laten dankzij de legendarische JBL Pro Sound en Hi-Res audio. Met maar liefst 55 uur Bluetooth-speeltijd en compleet met Adaptive Noise Cancelling, comfortabele over-ear-schelpen en een opvouwbaar, draagbaar ontwerp. EQ-personalisatie en basversterking met één druk op de knop zorgen ervoor dat elke kristalheldere noot klinkt alsof hij speciaal voor jou wordt gespeeld.',
            'stock' => 10,
            'price' => 249.00,
            'mainImage' => 'images/koptelefoon1.jpg',
            'discount' => 0,
            'deliverableFrom' => '2020-05-14',
            'category_id' => 5,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'Canon EOS 2000D KIT',
            'refNumber' => 'MJ#CF5',
            'brand' => 'Canon',
            'description' => 'Zet je eerste stap op het gebied van DSLR-fotografie en vertel je verhalen met de EOS 2000D en de compacte EF-S 18-55mm IS II-zoomlens. Deze gebruiksvriendelijke en intuïtieve camera is geschikt voor beginnende fotografen. De Photo Companion-app biedt tips en tutorials over hoe je het beste haalt uit je camerafuncties, waaronder prachtige foto\'s en Full HD-video\'s van bioscoopkwaliteit boordevol details, kleuren en diepte, plus uitstekende resultaten bij weinig licht met een 24,1 Megapixel sensor en allround zoomlens. Delen op social media en opnamen maken op afstand is eenvoudig als je de Canon Camera Connect-app gebruikt, je hoeft alleen verbinding te maken via Wi-Fi of NFC.',
            'stock' => 0,
            'price' => 359.00,
            'mainImage' => 'images/camera1.jpg',
            'discount' => 0.00,
            'deliverableFrom' => '2020-08-12',
            'category_id' => 4,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'ALTERNATE Pluto gaming pc',
            'refNumber' => 'S5IVZB2R',
            'brand' => 'Alternate',
            'description' => 'Neem een duik in de magische wereld van online games met het ALTERNATE Pluto pc-systeem. Deze pc is speciaal ontworpen en gebouwd met de casual gamer in gedachten. Hij loodst je moeiteloos door jouw favoriete battle royale-game en laat je bouwen wat je wil in menig city-builder. Ook op gebied van multimedia komt hij tegemoet aan alle basis eisen.

De Intel® Core™ i5-9400F is een krachtige processor uit de Coffee Lake-R serie met voldoende rekenkracht. In combinatie met een NVIDIA GeForce GTX 1650 is de Alternate Pluto in staat de nieuwste games prachtig weer te geven op de monitor. Met 8 GB DDR4-geheugen kan je vlot multitasken terwijl je snel kan opstarten met de 240 GB M.2 SSD. De overige data kan je kwijt op de harde schijf met een capaciteit van maar liefst 2 TB.',
            'stock' => 2,
            'price' => 899.00,
            'mainImage' => 'images/desktop2.jpg',
            'discount' => 0,
            'deliverableFrom' => '2020-05-14',
            'category_id' => 2,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'MSI GF75 Thin 9SC-038BE, 17.3" laptop',
            'refNumber' => 'PL8MZB3M',
            'brand' => 'MSI',
            'description' => '',
            'stock' => 10,
            'price' => 1249.00,
            'mainImage' => 'images/laptop2.jpg',
            'discount' => 4.00,
            'deliverableFrom' => '2020-05-14',
            'category_id' => 1,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'Apple iPhone 11 Pro',
            'refNumber' => '9AO1AASV',
            'brand' => 'Apple',
            'description' => 'Op de iPhone 11 Pro 64 GB in middernachtgroen maak je levensechte en supervloeiende video’s met meer detail. Dankzij de enorme rekenkracht kun je 4K‑video opnemen met uitgebreid dynamisch bereik en videobeeldstabilisatie, allemaal met 60 bps. Je hebt ook meer creatieve vrijheid, want je krijgt vier keer meer in beeld en je kunt gebruikmaken van veelzijdige nieuwe bewerkingstools. Het Super Retina XDR-display heeft niet één, maar twee nieuwe helderheidspieken, en weet ook wanneer die moeten worden gebruikt. Het levert maximaal 800 nits als je in de zon staat en tot 1200 nits voor content met extreem dynamisch bereik. Alsof je een Pro Display XDR op je iPhone hebt.

De iPhone 11 Pro bevat het eerste triple camerasysteem dat geavanceerde technologie combineert met de kenmerkende eenvoud van iPhone. Krijg tot vier keer meer in beeld. Maak prachtige foto\'s bij weinig licht en maak video\'s in de hoogste kwaliteit op een smartphone en bewerkt ze op dezelfde manier als je foto\'s. Op iPhone 11 Pro kun je vanuit de telelens­camera helemaal uitzoomen tot de ultragroothoek­camera. Dat is in totaal maar liefst 4x optische zoom. Met de bredere beeldhoek kun je zien wat er buiten beeld gebeurt, waarna je maar hoeft te tikken om het vast te leggen. En het enige dat tussen jou en je onderwerp komt, is een nieuwe professionele camera-interface. Zo zit je altijd helemaal in het moment. Of het nu gaat om een diner bij kaarslicht of een maan­­overgoten strand, dankzij de nieuwe automatische Nachtmodus en de A13 Bionic-chip maak je nu bij weinig licht foto’s die op iPhone nooit eerder mogelijk waren. Je kunt ook zelf met de regelaars experimenteren, voor nog meer detail en minder ruis.

Omdat de drie camera’s samen­werken, kun je nóg meer aan je portretten toevoegen. Met het high‑key mono-effect in iOS 13 maak je zwart-witfoto’s van studiokwaliteit. En met Portret­belichting bepaal je zelf welke lichtintensiteit het beste bij je onderwerp past, net zoals je in een studio zou doen. Hoe mooi is dat? Slimme HDR van de volgende generatie maakt gebruik van geavanceerde algoritmen om de details in licht en schaduw te verfijnen. En aan de hand van machine learning worden de gezichten op de foto nu herkend en opnieuw belicht als dat nodig is. Kortom, iPhone 11 Pro kan details in zowel het onderwerp als de achtergrond automatisch aanpassen.',
            'stock' => 10,
            'price' => 1159.00,
            'mainImage' => 'images/iphone11.jpg',
            'discount' => 0.00,
            'deliverableFrom' => '2020-05-17',
            'category_id' => 3,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'Edifier R980T pc-luidspreker',
            'refNumber' => 'KVZF9D',
            'brand' => 'Edifier',
            'description' => 'Met zijn compacte formaat is de R980T een efficiënte 2.0 oplossing voor op bureaus en boekenplanken. Dit 2-weg systeem produceert maar liefst 24W RMS vermogen met de 4 inch bas driver en 0.5 inch tweeter. Dankzij de 100% MDF houten behuizing met basreflex-poort geven ze een diep en vol geluid weer. De twee stereo RCA ingangen bieden de mogelijkheid om meerdere audiobronnen aan te sluiten. De volume en bas knop zijn op de achterzijde van de actieve luidspreker geplaatst.',
            'stock' => 3,
            'price' => 69.90,
            'mainImage' => 'images/speakers1.jpg',
            'discount' => 0.00,
            'deliverableFrom' => '2020-05-14',
            'category_id' => 5,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'Logitech HD Webcam C310',
            'refNumber' => 'UA#L1C00',
            'brand' => 'logitech',
            'description' => 'Logitech HD Webcam C310. Voor HD-bellen met beeld en onlineactiviteiten. Je kan genieten van videogesprekken in HD 720p met de meeste bekende IM\'s en Logitech Vid HD: de gratis, snelle en gemakkelijke manier om je familie en vrienden face-to-face te zien. Stuur je familie en vrienden een foto wanneer je geen tijd hebt om te praten of een video op te nemen. 5MP-foto\'s (softwarematig) zorgen voor onvergetelijke herinneringen. Weinig licht of slechte achtergrondverlichting, en achtergrondruis hoeven je videogesprek niet te bederven dankzij Logitech RightLight 2- en Logitech RightSound-technologie. Daarna kan je met één klik je nieuwste video uploaden naar Facebook of YouTube. En je videogesprekken worden nu nog leuker met Video Effects.

Bijzonderheden:
- HD 720p-videogesprekken in de meeste populaire IM-toepassingen en Logitech Vid HD
- 5-megapixel foto\'s (softwarematig)
- Logitech RightLight 2- en RightSound-technologie
- Met 1 klik uploaden naar Facebook en YouTube
- Logitech Video Effects',
            'stock' => 0,
            'price' => 59.90,
            'mainImage' => 'images/webcam1.jpg',
            'category_id' => 4,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
