<?php

namespace YoannRenard;

use Psr\Log\AbstractLogger;

class InlineLogger extends AbstractLogger
{
    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        echo sprintf('[%s] %s.%s: %s', (new \DateTimeImmutable())->format('Y-m-d H:i:s'), 'php', strtoupper($level), $message);
        echo 'cli' == PHP_SAPI ? PHP_EOL : '<br/>';
    }
}
