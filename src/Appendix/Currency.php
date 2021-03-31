<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Appendix;

final class Currency
{
    public static function getCurrencies(): array
    {
        return [
            ["US Dollar", "USD", 1, 0.01],
            ["Euro", "EUR", 1, 0.01],
            ["Japanese Yen", "JPY", 100, 1],
            ["Hong Kong Dollar", "HKD", 10, 0.01],
            ["British Pound", "GBP", 1, 0.01],
            ["Malaysian Ringgit", "MYR", 1, 0.01],
            ["Russian Ruble", "RUB", 100, 0.01],
            ["South African Rand", "ZAR", 10, 0.01],
            ["South Korean Won", "KRW", 1000, 1],
            ["UAE Dirham", "AED", 1, 0.01],
            ["Saudi Riyal", "SAR", 1, 0.01],
            ["Hungarian Forint", "HUF", 100, 1],
            ["Polish Zloty", "PLN", 1, 0.01],
            ["anish Krone", "DKK", 10, 0.01],
            ["Swedish Krona", "SEK", 10, 0.01],
            ["Norwegian Krone", "NOK", 10, 0.01],
            ["Turkish Lira", "TRY", 10, 0.01],
            ["Mexican Peso", "MXN", 10, 0.01],
            ["Thai Baht", "THB", 10, 0.01],
            ["Australian Dollar", "AUD", 1, 0.01],
            ["Canadian Dollar", "CAD", 1, 0.01],
            ["New Zealand Dollar", "NZD", 1, 0.01],
            ["Singapore Dollar", "SGD", 1, 0.01],
            ["Swiss Franc", "CHF", 1, 0.01],
            ["Chinese Yuan", "CNY", 10, 0.01],
            ["Algerian Dinar", "DZD", 100, 0.01],
            ["Argentine Peso", "ARS", 10, 0.01],
            ["Bangladeshi Taka", "BDT", 100, 0.01],
            ["Bolivian Boliviano", "BOB", 10, 0.01],
            ["Brazilian Real", "BRL", 1, 0.01],
            ["Chilean Peso", "CLP", 1000, 1],
            ["Colombian Peso", "COP", 1000, 1],
            ["Costa Rican Colon", "CRC", 1000, 1],
            ["Czech Koruna", "CZK", 10, 0.01],
            ["Egyptian Pound", "EGP", 10, 0.01],
            ["Guatemalan Quetzal", "GTQ", 10, 0.01],
            ["Honduran Lempira", "HNL", 10, 0.01],
            ["Icelandic Krona", "ISK", 100, 1],
            ["Indian Rupee", "INR", 100, 0.01],
            ["Indonesian Rupiah", "IDR", 10000, 1],
            ["Israeli New Shekel", "ILS", 1, 0.01],
            ["Kenyan Shilling", "KES", 100, 0.01],
            ["Macanese Pataca", "MOP", 10, 0.01],
            ["New Taiwan Dollar", "TWD", 10, 1],
            ["Nicaraguan Cordoba", "NIO", 10, 0.01],
            ["Nigerian Naira", "NGN", 100, 0.01],
            ["Pakistani Rupee", "PKR", 100, 0.01],
            ["Paraguayan Guarani", "PYG", 10000, 1],
            ["Peruvian Nuevo Sol", "PEN", 1, 0.01],
            ["Philippine Peso", "PHP", 100, 0.01],
            ["Qatari Riyal", "QAR", 1, 0.01],
            ["Romanian Leu", "RON", 1, 0.01],
            ["Uruguayan Peso", "UYU", 10, 0.01],
            ["Venezuelan Bolivar", "VEF", 100000, 1],
            ["Vietnamese Dong", "VND", 10000, 1],
        ];
    }
}
