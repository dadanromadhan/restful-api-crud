@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Swap Variable') }}</div>

                <div class="card-body">
                    <?php
                    echo "Sebelum Swap:<br>";
                    $a = 1;
                    $b = 2;
                    echo "a = $a<br>";
                    echo "b = $b<br><br>";

                    echo "Setelah Swap:<br>";

                    $a = $a + $b;
                    $b = $a - $b;
                    $a = $a - $b;

                    echo "a = $a<br>";
                    echo "b = $b";
                    ?>
                    <h4> swap menggunakan xor </h4>
                    <?php
                    function swap(&$a, &$b)
                    {
                        if ($a !== $b) {
                            $a ^= $b;
                            $b ^= $a;
                            $a ^= $b;
                        }
                    }

                    $a = 'Nilai 1';
                    $b = 'Nilai 2';

                    echo 'Sebelum swap:';
                    echo '<br>a = ' . $a;
                    echo '<br>b = ' . $b;

                    swap($a, $b);

                    echo '<br><br>Setelah swap:';
                    echo '<br>a = ' . $a;
                    echo '<br>b = ' . $b;

                    ?>
                    <div class="box">
                        <div class="formContainer text-center">
                            <h3>Encrypt your message using bitwise XOR</h3>
                            <form id="frm" class="formElem form-inline">
                                <div class="form-group">
                                    <label class="sr-only" for="message">Message</label>
                                    <input id="message" class="form-control" placeholder="Message" type="text" size="75">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="key">Key</label>
                                    <input id="key" class="form-control" placeholder="Key" type="text" size="20">
                                </div>
                            </form>
                            <button type="button" class="submitButton btn btn-primary" onClick="submit()">Go</button>
                        </div>
                    </div>
                    <div id="encrypted" class="text-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection