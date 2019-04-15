<?php

namespace Sabium\Service\Validation;

use Symfony\Component\Validator\Validator\ValidatorInterface;

class ObjectValidator
{

    protected $validation;
    protected $error;

    public function __construct(ValidatorInterface $validation)
    {
        $this->validation = $validation;
    }

    public function validate($dadosPessoa) : bool
    {
        $violations = $this->validation->validate($dadosPessoa);

        if (count($violations) > 0) {
            foreach ($violations as $violation) {
                $this->error['errors'][] = [ 'message'=>$violation->getMessage()];
            }

            return false;
        }
        return true;
    }

    public function getErrors() : array
    {
        return $this->error;
    }
}
