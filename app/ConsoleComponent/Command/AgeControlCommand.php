<?php 

namespace ConsoleComponent\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class AgeControlCommand extends Command{

    protected function configure() {
        $this->setName('add:user')->setDescription('Add new user to data base')
             ->addArgument('name', InputArgument::REQUIRED, 'The name of the new users.')
             ->addArgument('birthdate', InputArgument::REQUIRED, 'The birthdate of the user.');


    }
    
    protected function execute(InputInterface $input, OutputInterface $output) {

        $name = $input->getArgument('name');
        $birthdate = $input->getArgument('birthdate');
        if(!self::validateDate($birthdate)){
            $output->writeln("Invalid date");
            die;
        }

        $legalAge = self::LegalAgeDetected($birthdate);

        
        self::InsertData($name, $birthdate, $legalAge);
    }

    public static function LegalAgeDetected($birthdate){
        $d = \DateTime::createFromFormat('Y-m-d', $birthdate);
        $age = date("Y") - $d->format("Y");

        if((date("m") - $d->format("m")) < 0){
            $age = $age - 1;
        }else if((date("m") - $d->format("m")) == 0){
            if((date("d") - $d->format("d")) < 0){
                $age = $age - 1;
            }
        }

        if($age >= 18){
            return True;
        }else{
            return False;
        }

    }

    public static function ValidateDate($birthdate, $format = 'Y-m-d'){
        $d = \DateTime::createFromFormat($format, $birthdate);
        return $d && $d->format($format) == $birthdate;
    }

    public static function InsertData($name, $birthdate, $legalAge){
        $mysql = mysqli_connect("localhost:3306", 'jorge', 'password', 'test_legal_age');
        self::PingDataBase($mysql);
        $sql = "INSERT INTO Personas (Name, Birthdate, Legal age) VALUES ($name, $birthdate, $legalAge)";
        mysqli_query($mysql, $sql);
            print("Done! \n");
        
    }

    function PingDataBase($mysql){
        if (!$mysql) {
            die("Connection failed: " . mysqli_connect_error() . "\n");
      }
    }
}
