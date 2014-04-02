<?php

namespace Recurr\Test\Transformer;

use Recurr\Rule;

class ArrayTransformerByDayTest extends ArrayTransformerBase
{
    public function testByDayWeekly()
    {
        $rule = new Rule(
            'FREQ=WEEKLY;COUNT=10;INTERVAL=2;BYDAY=MO,WE,FR',
            new \DateTime('1997-09-02 16:00:00')
        );

        $computed = $this->transformer->transform($rule);

        $this->assertEquals(10, count($computed));
        $this->assertEquals(new \DateTime('1997-09-03 16:00:00'), $computed[0]);
        $this->assertEquals(new \DateTime('1997-09-05 16:00:00'), $computed[1]);
        $this->assertEquals(new \DateTime('1997-09-15 16:00:00'), $computed[2]);
        $this->assertEquals(new \DateTime('1997-09-17 16:00:00'), $computed[3]);
        $this->assertEquals(new \DateTime('1997-09-19 16:00:00'), $computed[4]);
        $this->assertEquals(new \DateTime('1997-09-29 16:00:00'), $computed[5]);
        $this->assertEquals(new \DateTime('1997-10-01 16:00:00'), $computed[6]);
        $this->assertEquals(new \DateTime('1997-10-03 16:00:00'), $computed[7]);
        $this->assertEquals(new \DateTime('1997-10-13 16:00:00'), $computed[8]);
        $this->assertEquals(new \DateTime('1997-10-15 16:00:00'), $computed[9]);
    }

    public function testByDayMonthly()
    {
        $rule = new Rule(
            'FREQ=MONTHLY;COUNT=10;BYDAY=WE,TH',
            new \DateTime('2014-01-14 16:00:00')
        );

        $computed = $this->transformer->transform($rule);

        $this->assertEquals(10, count($computed));
        $this->assertEquals(new \DateTime('2014-01-15 16:00:00'), $computed[0]);
        $this->assertEquals(new \DateTime('2014-01-16 16:00:00'), $computed[1]);
        $this->assertEquals(new \DateTime('2014-01-22 16:00:00'), $computed[2]);
        $this->assertEquals(new \DateTime('2014-01-23 16:00:00'), $computed[3]);
        $this->assertEquals(new \DateTime('2014-01-29 16:00:00'), $computed[4]);
        $this->assertEquals(new \DateTime('2014-01-30 16:00:00'), $computed[5]);
        $this->assertEquals(new \DateTime('2014-02-05 16:00:00'), $computed[6]);
        $this->assertEquals(new \DateTime('2014-02-06 16:00:00'), $computed[7]);
        $this->assertEquals(new \DateTime('2014-02-12 16:00:00'), $computed[8]);
        $this->assertEquals(new \DateTime('2014-02-13 16:00:00'), $computed[9]);
    }

    public function testByDayYearly()
    {
        $rule = new Rule(
            'FREQ=YEARLY;COUNT=3;BYDAY=20MO',
            new \DateTime('1997-05-19 16:00:00')
        );

        $computed = $this->transformer->transform($rule);

        $this->assertEquals(3, count($computed));
        $this->assertEquals(new \DateTime('1997-05-19 16:00:00'), $computed[0]);
        $this->assertEquals(new \DateTime('1998-05-18 16:00:00'), $computed[1]);
        $this->assertEquals(new \DateTime('1999-05-17 16:00:00'), $computed[2]);
    }
}
