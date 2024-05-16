<?php

require_once "SenderType.php";
require_once "HolidayType.php";
require_once "ActivityAdvisor.php";
require_once "./Factory/MessageSenderFactory.php";
require_once "./BorderApi/BorderApi.php";
require_once "ScriptRequest.php";
require_once "Exception/ExceptionHandler.php";

try {
    $request = ScriptRequest::make($argv);

    $boredApi = new BorderApi();
    $senderFactory = new MessageSenderFactory();
    $advisor = new ActivityAdvisor(borderApi: $boredApi, messageSenderFactory: $senderFactory);

    $advisor->advise($request->getParticipants(), $request->getHolidayType(), $request->getSenderType());
} catch (Exception $exception) {
    ExceptionHandler::handle($exception);
}
exit();

