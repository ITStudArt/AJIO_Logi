<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Logs;
use Faker\Factory;

class AppFixtures extends Fixture
{
    /**
     * @var Factory
     */
    private $faker;
    public function __construct(){
        $this->faker = Factory::create();
    }

    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager): void
    {
        $resultMessagesTypes = ["SUCCESS","FAILURE","ERROR","WARNING","ABANDONED"];
        $resultMessagesProcess = ["LOGIN","LOGOUT","NEW_PATIENT","NEW_THERAPIST","NEW_EXERCISE","DELETE_PATIENT","DELETE_THERAPIST","DELETE_EXERCISE","MODIFY_SCHEDULE"];
        $resultMessagesTypesLenght = sizeof($resultMessagesTypes);
        $resultMessagesProcessLenght = sizeof($resultMessagesProcess);
        for($i = 0;$i<100;$i++) {
            $start = $this->faker->dateTimeBetween('-40 days', 'now');
            $end = $this->faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s').' +2 days');
            $oneLog = new Logs();
            $oneLog->setProcessedBy($this->faker->userName);
            $oneLog->setProcessedOn($this->faker->userName);
            $oneLog->setProcess($resultMessagesProcess[rand(0,$resultMessagesProcessLenght-1)]);
            $oneLog->setDescription($this->faker->realText(50));
            $oneLog->setStartDate($start);
            $oneLog->setEndTime($end);
            $oneLog->setResultMessage($resultMessagesTypes[rand(0,$resultMessagesTypesLenght-1)]);
            $manager->persist($oneLog);
        }
        //

        $manager->flush();
    }
}
