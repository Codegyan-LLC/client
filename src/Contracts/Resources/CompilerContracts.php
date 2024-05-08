<?php

namespace Codegyan\Contracts\Resources; 

/**
 * Interface CompilerContracts
 * Defines the contract for the compiler API client.
 */
interface CompilerContracts {
    
    /**
     * Compiles code using the Codegyan compiler API.
     *
     * @param string $lang The programming language of the code.
     * @param string $code The code to compile.
     * @return mixed The compiled result.
     */
    public function compile(string $lang, string $code);
}
