<?php

namespace Basecom\Bundle\CronUiBundle\Entity;

use Basecom\Bundle\CronUiBundle\Validator\Constraint as BasecomAssert;
use Pim\Bundle\CustomEntityBundle\Entity\AbstractCustomEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This entity is used for the dynamic cronjobs which are created through the user interface.
 *
 * @author Jordan Kniest <j.kniest@basecom.de>
 */
class Cronjob extends AbstractCustomEntity
{
    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $code;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $command;

    /**
     * @var string
     * @Assert\NotBlank()
     * @BasecomAssert\CronExpression
     */
    protected $expression = '* * * * *';

    /** @var bool */
    protected $backgroundTask = true;

    /**
     * Get command.
     *
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * Set command.
     *
     * @param string $command
     */
    public function setCommand(string $command): void
    {
        $this->command = $command;
    }

    /**
     * Get expression.
     *
     * @return string
     */
    public function getExpression(): string
    {
        return $this->expression;
    }

    /**
     * Set expression.
     *
     * @param string $expression
     */
    public function setExpression(string $expression): void
    {
        $this->expression = $expression;
    }

    /**
     * Get backgroundTask.
     *
     * @return bool
     */
    public function isBackgroundTask(): bool
    {
        return $this->backgroundTask;
    }

    /**
     * Set backgroundTask.
     *
     * @param bool $backgroundTask
     */
    public function setBackgroundTask(bool $backgroundTask): void
    {
        $this->backgroundTask = $backgroundTask;
    }

    /**
     * {@inheritdoc}
     */
    public static function getLabelProperty(): string
    {
        return 'code';
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomEntityName(): string
    {
        return 'cronjob';
    }
}
