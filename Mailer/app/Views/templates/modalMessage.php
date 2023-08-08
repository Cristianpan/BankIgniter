<?php
$response = session()->get('response');
if (isset($response)) :
?>
    <div class="modal <?= $response['type'] ?>">
        <?= $response['message'] ?>
    </div>
<?php endif ?>