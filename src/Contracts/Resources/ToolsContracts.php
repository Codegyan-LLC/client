<?php

namespace Codegyan\Contracts\Resources;

/**
 * Interface CompilerContracts
 * Defines the contract for the compiler API client.
 */
interface ToolsContracts {
    
    /**
     * Converts an amount from one currency to another using the specified exchange rates.
     *
     * @param string $from_currency The currency to convert from.
     * @param string $to_currency The currency to convert to.
     * @param string $amount The amount to convert.
     * @return mixed The converted amount.
     */
    public function currencyConvert(string $from_currency, string $to_currency, string $amount);

    /**
     * Checks the availability of a domain using the specified domain name.
     *
     * @param string $domain The domain name to check availability for.
     * @return mixed The availability status of the domain.
     */
    public function domainAvailability(string $domain);
}
