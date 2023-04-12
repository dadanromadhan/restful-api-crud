<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('numberToWord', function ($num) {

            $num  = (string) ((int) $num);

            if ((int) ($num) && ctype_digit($num)) {
                $words  = array();

                $num    = str_replace(array(',', ' '), '', trim($num));

                $list1  = array(
                    'Nol', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas', 'Dua Belas', 'Tiga Belas', 'Empat Belas', 'Lima Belas', 'Enam Belas', 'Tujuh Belas',
                    'Delapan Belas', 'Sembilan Belas',
                );

                $list2  = array(
                    '', 'Sepuluh', 'Dua Puluh', 'Tiga Puluh', 'Empat Puluh', 'Lima PUluh', 'Enam Puluh',
                    'Tujuh PUluh', 'Delapan Puluh', 'Sembilan Puluh', 'Seratus'
                );

                $list3  = array(
                    '', 'Seribu', 'Juta', 'Milyar', 'Triliun',
                    'Kuadriliun', 'Kuintiliun'
                );

                $num_length = strlen($num);
                $levels = (int) (($num_length + 2) / 3);
                $max_length = $levels * 3;
                $num    = substr('00' . $num, -$max_length);
                $num_levels = str_split($num, 3);

                foreach ($num_levels as $num_part) {
                    $levels--;
                    $hundreds   = (int) ($num_part / 100);
                    $hundreds   = ($hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ($hundreds == 1 ? '' : 's') . ' ' : '');
                    $tens       = (int) ($num_part % 100);
                    $singles    = '';

                    if ($tens < 20) {
                        $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '');
                    } else {
                        $tens = (int) ($tens / 10);
                        $tens = ' ' . $list2[$tens] . ' ';
                        $singles = (int) ($num_part % 10);
                        $singles = ' ' . $list1[$singles] . ' ';
                    }
                    $words[] = $hundreds . $tens . $singles . (($levels && (int) ($num_part)) ? ' ' . $list3[$levels] . ' ' : '');
                }
                $commas = count($words);
                if ($commas > 1) {
                    $commas = $commas - 1;
                }

                $words  = implode(', ', $words);

                $words  = trim(str_replace(' ,', ',', ucwords($words)), ', ');
                if ($commas) {
                    $words  = str_replace(',', ' and', $words);
                }
            } else if (!((int) $num)) {
                $words = 'Zero';
            } else {
                $words = '';
            }

            return $words;
        });
    }
}
