<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Appendix;

/**
 * @psalm-suppress UnusedClass
 */
final class Timezone
{
    public static function getTimezones(): array
    {
        return [
            ["Africa/Accra", "UTC 00:00"],
            ["Africa/Cairo", "UTC 02:00"],
            ["Africa/Casablanca", "UTC 00:00"],
            ["Africa/Johannesburg", "UTC 02:00"],
            ["Africa/Lagos", "UTC 01:00"],
            ["Africa/Nairobi", "UTC 03:00"],
            ["Africa/Tunis", "UTC 01:00"],
            ["America/Anchorage", "UTC-09:00"],
            ["America/Argentina/Buenos_Aires", "UTC-03:00"],
            ["America/Argentina/Salta", "UTC-03:00"],
            ["America/Argentina/San_Luis", "UTC-03:00"],
            ["America/Asuncion", "UTC-04:00"],
            ["America/Atikokan", "UTC-05:00"],
            ["America/Belem", "UTC-03:00"],
            ["America/Blanc-Sablon", "UTC-04:00"],
            ["America/Bogota", "UTC-05:00"],
            ["America/Campo_Grande", "UTC-04:00"],
            ["America/Caracas", "UTC-04:30"],
            ["America/Chicago", "UTC-06:00"],
            ["America/Costa_Rica", "UTC-06:00"],
            ["America/Dawson", "UTC-08:00"],
            ["America/Dawson_Creek", "UTC-07:00"],
            ["America/Denver", "UTC-07:00"],
            ["America/Edmonton", "UTC-07:00"],
            ["America/El_Salvador", "UTC-06:00"],
            ["America/Guatemala", "UTC-06:00"],
            ["America/Guayaquil", "UTC-05:00"],
            ["America/Halifax", "UTC-04:00"],
            ["America/Hermosillo", "UTC-07:00"],
            ["America/Iqaluit", "UTC-05:00"],
            ["America/Jamaica", "UTC-05:00"],
            ["America/La_Paz", "UTC-04:00"],
            ["America/Lima", "UTC-05:00"],
            ["America/Los_Angeles", "UTC-08:00"],
            ["America/Managua", "UTC-06:00"],
            ["America/Mazatlan", "UTC-07:00"],
            ["America/Mexico_City", "UTC-06:00"],
            ["America/Montevideo", "UTC-03:00"],
            ["America/Nassau", "UTC-05:00"],
            ["America/New_York", "UTC-05:00"],
            ["America/Noronha", "UTC-02:00"],
            ["America/Panama", "UTC-05:00"],
            ["America/Phoenix", "UTC-07:00"],
            ["America/Port_of_Spain", "UTC-04:00"],
            ["America/Puerto_Rico", "UTC-04:00"],
            ["America/Rainy_River", "UTC-06:00"],
            ["America/Regina", "UTC-06:00"],
            ["America/Santiago", "UTC-04:00"],
            ["America/Santo_Domingo", "UTC-04:00"],
            ["America/Sao_Paulo", "UTC-03:00"],
            ["America/St_Johns", "UTC-03:30"],
            ["America/Tegucigalpa", "UTC-06:00"],
            ["America/Tijuana", "UTC-08:00"],
            ["America/Toronto", "UTC-05:00"],
            ["America/Vancouver", "UTC-08:00"],
            ["Asia/Amman", "UTC 02:00"],
            ["Asia/Baghdad", "UTC 03:00"],
            ["Asia/Bahrain", "UTC 03:00"],
            ["Asia/Bangkok", "UTC 07:00"],
            ["Asia/Beirut", "UTC 02:00"],
            ["Asia/Colombo", "UTC 05:30"],
            ["Asia/Dhaka", "UTC 06:00"],
            ["Asia/Dubai", "UTC 04:00"],
            ["Asia/Gaza", "UTC 02:00"],
            ["Asia/Ho_Chi_Minh", "UTC 07:00"],
            ["Asia/Hong_Kong", "UTC 08:00"],
            ["Asia/Irkutsk", "UTC 08:00"],
            ["Asia/Jakarta", "UTC 07:00"],
            ["Asia/Jayapura", "UTC 09:00"],
            ["Asia/Jerusalem", "UTC 02:00"],
            ["Asia/Kamchatka", "UTC 11:00"],
            ["Asia/Karachi", "UTC 05:00"],
            ["Asia/Kolkata", "UTC 05:30"],
            ["Asia/Krasnoyarsk", "UTC 07:00"],
            ["Asia/Kuala_Lumpur", "UTC 08:00"],
            ["Asia/Kuwait", "UTC 03:00"],
            ["Asia/Magadan", "UTC 11:00"],
            ["Asia/Makassar", "UTC 08:00"],
            ["Asia/Manila", "UTC 08:00"],
            ["Asia/Muscat", "UTC 04:00"],
            ["Asia/Nicosia", "UTC 02:00"],
            ["Asia/Omsk", "UTC 06:00"],
            ["Asia/Qatar", "UTC 03:00"],
            ["Asia/Riyadh", "UTC 03:00"],
            ["Asia/Seoul", "UTC 09:00"],
            ["Asia/Shanghai", "UTC 08:00"],
            ["Asia/Singapore", "UTC 08:00"],
            ["Asia/Taipei", "UTC 08:00"],
            ["Asia/Tokyo", "UTC 09:00"],
            ["Asia/Vladivostok", "UTC 10:00"],
            ["Asia/Yakutsk", "UTC 09:00"],
            ["Asia/Yekaterinburg", "UTC 05:00"],
            ["Atlantic/Azores", "UTC-01:00"],
            ["Atlantic/Canary", "UTC 00:00"],
            ["Atlantic/Reykjavik", "UTC 00:00"],
            ["Australia/Broken_Hill", "UTC 09:30"],
            ["Australia/Perth", "UTC 08:00"],
            ["Australia/Sydney", "UTC 10:00"],
            ["Etc/GMT", "UTC 00:00"],
            ["Etc/GMT 0", "UTC 00:00"],
            ["Etc/GMT 1", "UTC-01:00"],
            ["Etc/GMT 10", "UTC-10:00"],
            ["Etc/GMT 11", "UTC-11:00"],
            ["Etc/GMT 12", "UTC-12:00"],
            ["Etc/GMT 2", "UTC-02:00"],
            ["Etc/GMT 3", "UTC-03:00"],
            ["Etc/GMT 4", "UTC-04:00"],
            ["Etc/GMT 5", "UTC-05:00"],
            ["Etc/GMT 6", "UTC-06:00"],
            ["Etc/GMT 7", "UTC-07:00"],
            ["Etc/GMT 8", "UTC-08:00"],
            ["Etc/GMT 9", "UTC-09:00"],
            ["Etc/GMT-1", "UTC 01:00"],
            ["Etc/GMT-10", "UTC 10:00"],
            ["Etc/GMT-11", "UTC 11:00"],
            ["Etc/GMT-12", "UTC 12:00"],
            ["Etc/GMT-2", "UTC 02:00"],
            ["Etc/GMT-3", "UTC 03:00"],
            ["Etc/GMT-4", "UTC 04:00"],
            ["Etc/GMT-5", "UTC 05:00"],
            ["Etc/GMT-6", "UTC 06:00"],
            ["Etc/GMT-7", "UTC 07:00"],
            ["Etc/GMT-8", "UTC 08:00"],
            ["Etc/GMT-9", "UTC 09:00"],
            ["Europe/Amsterdam", "UTC 01:00"],
            ["Europe/Athens", "UTC 02:00"],
            ["Europe/Belgrade", "UTC 01:00"],
            ["Europe/Berlin", "UTC 01:00"],
            ["Europe/Bratislava", "UTC 01:00"],
            ["Europe/Brussels", "UTC 01:00"],
            ["Europe/Bucharest", "UTC 02:00"],
            ["Europe/Budapest", "UTC 01:00"],
            ["Europe/Copenhagen", "UTC 01:00"],
            ["Europe/Dublin", "UTC 00:00"],
            ["Europe/Helsinki", "UTC 02:00"],
            ["Europe/Istanbul", "UTC 02:00"],
            ["Europe/Kaliningrad", "UTC 02:00"],
            ["Europe/Kiev", "UTC 02:00"],
            ["Europe/Lisbon", "UTC 00:00"],
            ["Europe/Ljubljana", "UTC 01:00"],
            ["Europe/London", "UTC 00:00"],
            ["Europe/Luxembourg", "UTC 01:00"],
            ["Europe/Madrid", "UTC 01:00"],
            ["Europe/Malta", "UTC 01:00"],
            ["Europe/Moscow", "UTC 03:00"],
            ["Europe/Oslo", "UTC 01:00"],
            ["Europe/Paris", "UTC 01:00"],
            ["Europe/Prague", "UTC 01:00"],
            ["Europe/Riga", "UTC 02:00"],
            ["Europe/Rome", "UTC 01:00"],
            ["Europe/Samara", "UTC 03:00"],
            ["Europe/Sarajevo", "UTC 01:00"],
            ["Europe/Skopje", "UTC 01:00"],
            ["Europe/Sofia", "UTC 02:00"],
            ["Europe/Stockholm", "UTC 01:00"],
            ["Europe/Tallinn", "UTC 02:00"],
            ["Europe/Vienna", "UTC 01:00"],
            ["Europe/Vilnius", "UTC 02:00"],
            ["Europe/Warsaw", "UTC 01:00"],
            ["Europe/Zagreb", "UTC 01:00"],
            ["Europe/Zurich", "UTC 01:00"],
            ["Indian/Maldives", "UTC 05:00"],
            ["Indian/Mauritius", "UTC 04:00"],
            ["Pacific/Apia", "UTC-11:00"],
            ["Pacific/Auckland", "UTC 12:00"],
            ["Pacific/Easter", "UTC-06:00"],
            ["Pacific/Galapagos", "UTC-06:00"],
            ["Pacific/Honolulu", "UTC-10:00"],
            ["Pacific/Majuro", "UTC-12:00"],
            ["Pacific/Midway", "UTC-11:00"],
            ["Pacific/Niue", "UTC-11:00"],
            ["Pacific/Pago Pago", "UTC-11:00"],
            ["Pacific/Pago_Pago", "UTC-11:00"],
        ];
    }
}
