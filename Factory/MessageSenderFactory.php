<?php

require_once "MessageSenderFactoryInterface.php";
require_once "FileMessageSender.php";
require_once "ConsoleMessageSender.php";
//require_once "./Exception/UnknownSenderMethodException.php";

class MessageSenderFactory implements MessageSenderFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function make(SenderType $type): MessageSenderInterface
    {
        $factoryMethod = 'make' . $type->value . 'Sender';

        if (!method_exists($this, $factoryMethod)) {
            throw new UnknownSenderMethodException();
        }

        return $this->{$factoryMethod}();
    }

    /**
     * @return FileMessageSender
     */
    public function makeFileSender(): FileMessageSender
    {
        return new FileMessageSender();
    }

    /**
     * @return ConsoleMessageSender
     */
    public function makeConsoleSender(): ConsoleMessageSender
    {
        return new ConsoleMessageSender();
    }
}