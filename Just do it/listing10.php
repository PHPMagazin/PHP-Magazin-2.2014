<?php
namespace Application\View\Helper;

[...]

class Date extends AbstractHelper
{
    public function __invoke($dateString, $mode = 'medium')
    {
        switch ($mode) {
            [...]

            case 'timeonly':
                $dateType = IntlDateFormatter::NONE;
                $timeType = IntlDateFormatter::MEDIUM;
                break;

            [...]            
        }
        
        [...]            
    }
}

