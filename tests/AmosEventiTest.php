<?php

namespace elitedivision\amos\eventi;

use elitedivision\amos\eventi\models\Eventi;
use PHPUnit\Framework\TestCase;

class AmosEventiTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var \yii2masonry\yii2masonry
     */
    protected $instance;

    /**
     * @inheritdoc
     */
    protected function _before()
    {
        $this->instance = new AmosEventi();
    }

    /**
     * @inheritdoc
     */
    protected function _after()
    {
        $this->instance = null;
    }

    // tests
    public function testMe()
    {
        $expected = 2.332 + 0.001;
        $equal = 2.333 == $expected ? true : false;

        //$this->assertTrue($equal, "Mi aspetto 2.333 ma ottengo: " . $expected);

        //Più cifreeeeee
        $expected = 2.11332 + 0.00001;
        $equal = 2.11333 == $expected ? true : false;

        $this->assertTrue($equal, "Mi aspetto 2.11333 ma ottengo: " . $expected);
    }

    public function testModuleName() {
        $this->assertEquals('eventi', AmosEventi::getModuleName(), 'Verify Module Name');
    }

    public function testCreateEvent() {
        $elencoEventi = [];

        for($i = 0; $i <= 12000; $i++) {
            $elencoEventi[] = $event = new Eventi();

            $event->setAttributes([
                'titolo' => 'Titolo',
                'descrizione' => 'Descrizione',
                'data_inizio' => 'Data inizio',
                'data_fine' => 'Data fine',
                'ora_inizio' => 'Ora inizio',
                'ora_fine' => 'Ora fine',
            ], false);

            $event->save(false);

            $this->assertNotEmpty($event->id);

            $this->assertNotEmpty($event->titolo);
        }

        $this->assertCount(12001, $elencoEventi);

        foreach($elencoEventi as $evento) {
            print_r($evento->titolo);
        }

        $this->assertEquals('damian.gomez', get_current_user(), 'Sono www-data?');
    }
}
