<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis\Command\Redis;

/**
 * @group commands
 * @group realm-key
 */
class DUMP_Test extends PredisCommandTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getExpectedCommand()
    {
        return 'Predis\Command\Redis\DUMP';
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedId()
    {
        return 'DUMP';
    }

    /**
     * @group disconnected
     */
    public function testFilterArguments()
    {
        $arguments = array('key');
        $expected = array('key');

        $command = $this->getCommand();
        $command->setArguments($arguments);

        $this->assertSame($expected, $command->getArguments());
    }

    /**
     * @group disconnected
     */
    public function testParseResponse()
    {
        $raw = "\x00\xC0\n\x06\x00\xF8r?\xC5\xFB\xFB_(";
        $expected = "\x00\xC0\n\x06\x00\xF8r?\xC5\xFB\xFB_(";

        $command = $this->getCommand();

        $this->assertSame($expected, $command->parseResponse($raw));
    }
}
