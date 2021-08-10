<?php

namespace App\Commands;

use Phalgorithm\Permutation;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Perm extends Command
{
    protected function configure()
    {
        $this->setName('perm')
            ->setDescription('Run perm alg')
            ->addArgument('collection', InputArgument::IS_ARRAY, 'Items');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $collection = $input->getArgument('collection');

        foreach (Permutation::perm($collection) as $item) {
            $output->writeln(implode(',', $item));
        }

        return 0;
    }
}
