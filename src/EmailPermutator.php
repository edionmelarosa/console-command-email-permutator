<?php

namespace Edionme;

class EmailPermutator
{
    private $firstName;
    private $lastName;
    private $domain;
    protected $emails = [];
    private $specialCharacters = [
        '-',
        '.',
        '_'
    ];

    public function __construct($firstName, $lastName, $domain)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->domain = $domain;
    }

    public function permutate()
    {
        if (empty($this->firstName) || empty($this->lastName)) {
            throw new \Exception('First name and Last name must be present', 1);
        }

        if (empty($this->domain)) {
            throw new \Exception('Domain must be present', 1);
        }

        $this->addSpecialCharactersBetweenNames()
            ->addFirstNameAndLastName()
            ->addByFirstCharacterCombination();

        return $this;
    }

    /**
     * 
     * @return array The generated emails
     */
    public function emails()
    {
        return $this->emails;
    }

    private function addSpecialCharactersBetweenNames()
    {
        $firstName = $this->firstName;
        $lastName = $this->lastName;

        foreach ($this->specialCharacters as $specialCharacter) {
            $this->pushEmail("{$firstName}{$specialCharacter}{$lastName}");
            $this->pushEmail("{$lastName}{$specialCharacter}{$firstName}");
            $this->pushEmail(substr($firstName, 0, 1) . "{$specialCharacter}{$lastName}");
            $this->pushEmail("{$firstName}{$specialCharacter}" . substr($lastName, 0, 1));
            $this->pushEmail(substr($firstName, 0, 1) . "{$specialCharacter}" . substr($lastName, 0, 1));
        }

        return $this;
    }

    private function addFirstNameAndLastName()
    {
        $this->pushEmail("{$this->firstName}{$this->lastName}");
        $this->pushEmail("{$this->lastName}{$this->firstName}");

        return $this;
    }

    private function addByFirstCharacterCombination()
    {
        $this->pushEmail(substr($this->firstName, 0, 1) . "{$this->lastName}");
        $this->pushEmail(substr($this->lastName, 0, 1) . "{$this->firstName}");

        return $this;
    }


    /**
     * 
     * @param string The string to be added to email
     * 
     * @return void
     */
    public function pushEmail($string)
    {
        $email = "$string@{$this->domain}";

        if (!in_array($email, $this->emails)) {
            array_push($this->emails, $email);
        }
    }
}
