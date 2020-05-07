<?php

namespace Tests\Unit;

use Edionme\Console\Command\EmailPermutatorCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Tester\CommandTester;

class EmailPermutatorCommandTest extends TestCase
{
    /**
     * @var
     */
    private $commandTester;

    protected $commandName = 'tool:permutate';
    
    protected function setUp() : void
    {
        $application = new Application();
        $application->add(new EmailPermutatorCommand());

        $command = $application->find($this->commandName);
        $this->commandTester = new CommandTester($command);
    }

    protected function tearDown() : void
    {
        $this->commandTester = null;
    }

    /** @test */
    public function test_should_return_exemption_when_not_enough_arguments_is_passed()
    {
        $this->expectException(RuntimeException::class);

        $this->commandTester->execute([
            'first_name' => 'edionme',
            'last_name'  => 'larosa',
        ]);
    }

    /** @test */
    public function test_should_display_emails_when_execution_is_successful()
    {
        $this->commandTester->execute([
            'first_name' => 'foo',
            'last_name'  => 'bar',
            'domain'     => 'mail.com'
        ]);

        $result = $this->commandTester->getDisplay();

        $this->assertStringContainsString('foobar@mail.com', $result);
        $this->assertStringContainsString('foo.bar@mail.com', $result);
    }
}
