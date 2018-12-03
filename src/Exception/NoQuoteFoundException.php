<?php

namespace PagaMasTarde\ModuleUtils\Exception;

/**
 * Class NoQuoteFoundException
 *
 * @package PagaMasTarde\ModuleUtils\Exception
 */
class NoQuoteFoundException extends AbstractException
{
    /**
     * ERROR_MESSAGE
     */
    const ERROR_MESSAGE = 'No quote found';

    /**
     * ERROR_CODE
     */
    const ERROR_CODE = 429;

    /**
     * NoQuoteFoundException constructor.
     */
    public function __construct()
    {
        $this->code = self::ERROR_CODE;
        $this->message = self::ERROR_MESSAGE;

        return parent::__construct($this->getMessage(), $this->getCode());
    }
}
