<?php

namespace Edionme\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Edionme\EmailPermutator;

class EmailPermutatorCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('tool:permutate')
            ->setDescription('Generate emails based on given data.')
            ->addArgument(
                'domain',
                InputArgument::REQUIRED,
                'Domain'
            )
            ->addArgument(
                'first_name',
                InputArgument::OPTIONAL,
                'First name'
            )
            ->addArgument(
                'last_name',
                InputArgument::OPTIONAL,
                'Last name'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $firstName = $input->getArgument('first_name');
        $lastName = $input->getArgument('last_name');
        $domain = $input->getArgument('domain');

        $emailPermutator = new EmailPermutator($firstName, $lastName, $domain);
        $emailPermutator->permutate();
        $emails = $emailPermutator->emails();

        $output->writeln($emails);

        return 1;
    }
}
