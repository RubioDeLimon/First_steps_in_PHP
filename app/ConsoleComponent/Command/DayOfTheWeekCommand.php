<?php

namespace ConsoleComponent\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class DayOfTheWeekCommand extends Command{

    protected function initialize(InputInterface $input, OutputInterface $output){
            echo "Initialized!\n\r";
    }

    protected function configure(){
        $this->setName('date:dayoftheweek')
            ->setDescription("Return the day of the week of a given date")
            ->addArgument('date', InputArgument::REQUIRED, 'The date to evaluate.');
    }
    
    protected function interact(InputInterface $input, OutputInterface $output){
        $date = $input->getArgument('date');
        if(!self::validateDate($date)){
            $output->writeln("Invalid date");
            die;
        }
    }

    public static function validateDate($date, $format = 'd-m-Y'){
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $date = $input->getArgument('date');
        $output->writeln("The day of the week is: " . date("l", strtotime($date)) . "\n\r");
    }
}



