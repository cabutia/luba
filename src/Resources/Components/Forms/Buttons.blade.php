<?php
    $buttonsAlign = '';
    if (isset($align) && !empty($align)) {
        $buttonsAlign = "text-". $align;
    }
?>

<div class="form-group {{ $buttonsAlign }} mt-3 mb-0">
    {{ $slot }}
</div>
