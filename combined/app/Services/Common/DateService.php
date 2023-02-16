<?php

namespace App\Services\Common;

use Carbon\Carbon;
use DateTimeZone;
use Exception;
use App\Logging\Writer;

class DateService
{
    public const DATE_FORMAT = 'Y-m-d H:i:s';
    public const SHORT_FORMAT = 'Ymd';
    public const DEFAULT_TIMEZONE = 'UTC';

    public function getLocalDate($date): Carbon
    {
        if (!$date) {
            return null;
        }
        $origin_tz = new DateTimeZone(self::DEFAULT_TIMEZONE);
        $date = Carbon::createFromFormat(self::DATE_FORMAT, $date, $origin_tz);
        $tz = $this->getTimezone();
        $date->setTimezone($tz);
        return $date;
    }

    public function parseDate($value)
    {
        if (empty($value)) {
            return null;
        }

        try {
            $origin_tz = new DateTimeZone(self::DEFAULT_TIMEZONE);
            $date = Carbon::parse($value, $origin_tz);
        } catch (Exception $th) {
            Writer::unknownError(__METHOD__, $th->getMessage());
            throw $th;
        }
        return isset($date) && $date->isValid() ? $date : null;
    }

    public function getDate($date_value, $dateField = null)
    {
        if (is_iterable($date_value) && count($date_value) > 0) {
            $dates = [];
            foreach ($date_value as $item) {
                $value = \data_get($item, $dateField, null);

                if (empty($value) === false) {
                    // type casting the value because is an SimpleXmlElement object
                    $date = $this->parseDate((string) $value);

                    if ($date instanceof Carbon) {
                        $dates[] = $date;
                    }
                }
            }
            return count($dates) > 0 ? max($dates) : null;
        } elseif (is_object($date_value)) {
            $parsed_date = \data_get($date_value, $dateField, null);
            return $parsed_date ? $this->parseDate((string) $parsed_date) : null;
        } elseif (is_string($date_value)) {
            return $this->parseDate($date_value);
        } else {
            return null;
        }
    }

    public function getTimezone()
    {
        $tz = config('app.timezone', self::DEFAULT_TIMEZONE);
        return new DateTimeZone($tz);
    }
}
