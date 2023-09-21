<?php

namespace App\DataFixtures;

use App\Entity\AboutMeInfo;
use App\Entity\Article;
use App\Entity\Contact;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/** ObjectManager
 *
 * ObjectManager'a używamy do tego by wskazać Symfony co ma zrobić z BD.
 * Objectmanager ma podstawowe operacje:
 *  -> perists($arg) - przetrzymaj to co ci daję, ale jeszcze nic z nim nie rób. Po prostu nie zgób :)
 *  -> flush() - wyświj do BD wszystko co ci do tej pory przekazałem */
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $images = [
            0 => [
                    [
                        'title' => 'Bueutiful nature',
                        'path' => 'img1.jpg',
                        'alt' => 'Nature :)'
                    ],
                    [
                        'title' => 'Bueutiful nature',
                        'path' => 'img2.jpg',
                        'alt' => 'Nature :)'
                    ],
                    [
                        'title' => 'Bueutiful nature',
                        'path' => 'img3.jpg',
                        'alt' => 'Nature :)'
                    ],
                ],
            1 => [
                    [
                        'title' => 'Bueutiful nature',
                        'path' => 'img4.jpg',
                        'alt' => 'Nature :)'
                    ],
                    [
                        'title' => 'Bueutiful nature',
                        'path' => 'img5.jpg',
                        'alt' => 'Nature :)'
                    ],
                    [
                        'title' => 'Bueutiful nature',
                        'path' => 'img6.jpg',
                        'alt' => 'Nature :)'
                    ],
                ],
            2 => [
                    [
                        'title' => 'Bueutiful nature',
                        'path' => 'img7.png',
                        'alt' => 'Nature :)'
                    ],
                    [
                        'title' => 'Bueutiful nature',
                        'path' => 'img8.jpg',
                        'alt' => 'Nature :)'
                    ],
                    [
                        'title' => 'Bueutiful nature',
                        'path' => 'img9.jpg',
                        'alt' => 'Nature :)'
                    ],
                ]
        ];


        for ($i=0; $i < 3; $i++) {
            $article = new Article();
            $article->setTitle("This is my {$i} article!");
            $article->setContent(
                "Aromatic aroma con panna, crema so coffee robust coffee barista, café au lait trifecta that strong blue mountain cortado aftertaste. Aroma extraction french press, skinny sweet, blue mountain cup roast barista, beans, extra cappuccino mug crema strong. Americano caffeine white, con panna saucer sit, con panna eu, carajillo aftertaste kopi-luwak, body aftertaste cup single origin café au lait saucer. Macchiato java sweet arabica, turkish cup, eu flavour mug extraction white cortado saucer est white brewed instant, rich, barista breve cappuccino barista organic. Barista, beans extraction, barista mocha, roast steamed siphon cup sweet cortado, cinnamon froth milk ristretto cortado galão. Crema, milk extra brewed, lungo dripper, espresso flavour qui, variety, grinder caramelization sit, strong turkish espresso body, filter barista caramelization half and half strong. To go viennese cream to go, flavour, so mocha as, carajillo iced et a siphon froth. Aged, eu, cup, brewed aroma kopi-luwak, coffee, id viennese french press brewed grounds acerbic froth. Decaffeinated acerbic, spoon beans seasonal, french press café au lait mazagran roast chicory, pumpkin spice galão as fair trade, dark irish cup ristretto half and half whipped shop. Latte instant black extra aroma, instant, extra robusta variety skinny shop aged cup ristretto foam cortado. Bar galão skinny saucer est affogato sugar caffeine chicory sugar coffee, seasonal barista french press acerbic in chicory robust."
            );
            $article->setAddedAt(new \DateTime());

            /** Article's images */
            $image1 = new Image();
            $image1->setPath($images[$i][0]['path']);
            $image1->setTitle($images[$i][0]['title']);
            $image1->setAlt($images[$i][0]['alt']);
            $article->addImage($image1);
            $manager->persist($image1);

            $image2 = new Image();
            $image2->setPath($images[$i][1]['path']);
            $image2->setTitle($images[$i][1]['title']);
            $image2->setAlt($images[$i][1]['alt']);
            $article->addImage($image2);
            $manager->persist($image2);


            $image3 = new Image();
            $image3->setPath($images[$i][2]['path']);
            $image3->setTitle($images[$i][2]['title']);
            $image3->setAlt($images[$i][2]['alt']);
            $article->addImage($image3);
            $manager->persist($image3);

            $manager->persist($article);
        }

        $aboutMeData = [
            'imie' => 'Kamil',
            'nazwisko' => 'Ferens',
            'opis' => 'Jestem początkującym programistą.',
            'miasto' => 'Wrocław'
        ];
        foreach ($aboutMeData as $key => $value) {
            $info = new AboutMeInfo(key: $key , value: $value);
            $manager->persist($info);
        }

        $contactData = [
            'Miasto' => 'Wrocław',
            'Telefon' => '+48 123 456 789',
            'Email' => 'mr.kaam@gmail.com',
            'LinkedIn' => 'www.linkedin.com/kamilferens'
        ];
        foreach ($contactData as $key => $value) {
            $info = new Contact();
            $info->setKey($key);
            $info->setValue($value);
            $manager->persist($info);
        }

        $manager->flush();
    }
}