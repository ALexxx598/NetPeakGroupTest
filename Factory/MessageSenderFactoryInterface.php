<?php

interface MessageSenderFactoryInterface
{
    /**
     * @param SenderType $type
     * @return MessageSenderInterface
     * @throws UnknownSenderMethodException
     */
    public function make(SenderType $type): MessageSenderInterface;
}