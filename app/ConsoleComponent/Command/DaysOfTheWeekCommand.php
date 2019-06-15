<?php

namespace ConsoleComponent\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DaysOfTheWeekCommand extends Command{
    
    protected function configure(){
        $this->setName('date:daysoftheweek')
            ->setDescription('Returns the days of the week of a list of dates')
            ->addArgument('dates', InputArgument::REQUIRED, 'The dates to evaluate.');
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $command = $this->getApplication()->find('date:dayoftheweek');
        $dates = explode(",", $input->getArgument('dates'));

        foreach($dates as $date){
            $arguments = array(
                'command' => 'date:dayoftheweek',
                'date' =>$date,);
            $dayOfTheWeekInput = new ArrayInput($arguments);
            $command->run($dayOfTheWeekInput, $output);
        }
    }
}